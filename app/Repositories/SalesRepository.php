<?php
namespace App\Repositories;
use App\Models\Sales;
use App\Models\Storage;
use App\Models\SupervisorSalesperson;
use App\Models\User;
use App\Repositories\Interfaces\ISalesRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SalesRepository implements ISalesRepository
{

    /**
     * This method returns a collection of total sales profit by month.
     *
     * @return Collection The collection of total profit and month
     */
    public function getTotalSalesProfitByMonth(): Collection
    {
        return Sales::selectRaw('SUM(profit) as total_profit, MONTH(date) as month')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
    }

    /**
     * This method returns a collection of top five salespersons by profit in a given date range.
     *
     * @param string $startDate The start date of the range
     * @param string $endDate The end date of the range
     * @return Collection The collection of salespersons with their name and total profit
     */
    public function getTopSalespersonByProfit($startDate, $endDate): Collection
    {
        return User::withSum(['sales' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }], 'profit')
            ->orderByDesc('sales_sum_profit')
            ->take(5)
            ->get();
    }

    /**
     * This method returns a collection of top five supervisors by their team's total profit in a given date range.
     *
     * @param string $startDate The start date of the range
     * @param string $endDate The end date of the range
     * @return Collection The collection of supervisors with their name and team's total profit
     */
    public function getTopSupervisorByTeamProfit($startDate, $endDate)
    {
        return User::where('user_type', 'supervisor')
            ->with(['supervisedSalespersons' => function ($query) use ($startDate, $endDate) {
                $query->with(['sales' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                }]);
            }])
            ->take(5)
            ->get()
            ->map(function ($supervisor) {
                return [
                    'supervisor_name' => $supervisor->name,
                    'total_profit' => $supervisor->supervisedSalespersons->reduce(function ($carry, $salesperson) {
                        return $carry + $salesperson->sales->sum('profit');
                    }, 0),
                ];
            });
    }

    /**
     * Retrieve all sales with quantity, profit, date, user name, and item name.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function index(): Collection|array
    {
        return Sales::select('quantity', 'profit', 'date', 'users.name', 'storages.item_name')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->join('storages', 'storages.id', '=', 'sales.storage_id')
            ->get();
    }

    /**
     * Retrieve all salespersons with their user name, sales details, and storage item name for the authenticated supervisor.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function show(): Collection|array
    {
        return SupervisorSalesperson::with(['user:id,name', 'sales:id,user_id,storage_id,profit,quantity,date', 'sales.storage:id,item_name'])
            ->where('supervisor_id', Auth::user()->id)->get();
    }
    /**
     * Validate and store a new sale in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'item_name' => 'required|exists:storages,item_name',
            'quantity' => 'required|integer',
            'profit' => 'required|integer|min:0',
            'date' => 'required|date'
        ]);
        // Find the item in the storage table
        $item = Storage::firstWhere('item_name', $request->input('item_name'));

        // Check if the quantity is less than or equal to the item in stock
        if ($request->input('quantity') <= $item->item_in_stock)
        {
            // Update the item in stock
            $item->item_in_stock -= $request->input('quantity');
            $item->save();
            // Create a new sale record
            Sales::create([
                'storage_id'=> $item->id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->input('quantity'),
                'profit' => $request->input('profit'),
                'date' => $request->input('date'),
            ]);
            // Redirect back with a success message
            return Redirect::route('salesPerson.sales.create')->with('status', '.تم تسجيل المدخلات بنجاج');
        }
        // Redirect back with an error message
        return Redirect::route('salesPerson.sales.create')->with('status', '!حصل خطا عند التسجيل لم تتم العملية بنجاح');
    }

    /**
     * Delete a sale from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Find the sale by its id
        $sale = Sales::findOrFail($request->input('saleId'));

        // Perform any additional authorization checks here

        // Delete the sale record
        $sale->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('supervisor.sales.show',['sale'=>0])->with('status', 'record-deleted');
    }

    /**
     * Retrieve all sales with profit and date for the authenticated user.
     *
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getMySales(): Collection|array
    {
        return Sales::where('user_id',Auth::user()->id)->get(['profit','date']);
    }
}
