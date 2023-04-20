<?php
namespace App\Repositories;
use App\Models\Sales;
use App\Models\User;
use App\Repositories\Interfaces\ISalesRepository;

class SalesRepository implements ISalesRepository
{

    /**
     * This method returns a collection of total sales profit by month.
     *
     * @return Collection The collection of total profit and month
     */
    public function getTotalSalesProfitByMonth()
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
    public function getTopSalespersonByProfit($startDate, $endDate)
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
}
