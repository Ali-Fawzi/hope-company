<?php

namespace App\Repositories;
use App\Http\Requests\AddItemRequest;
use App\Models\Storage;
use App\Repositories\Interfaces\IStorageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;

class StorageRepository implements IStorageRepository
{

    /**
     * This method returns a collection of the most profitable items in a given date range.
     *
     * @param string $startDate The start date of the range
     * @param string $endDate The end date of the range
     * @return Collection The collection of items with their name, price, stock, and total profit
     */
    public function getMostProfitableItem($startDate, $endDate)
    {
        return Storage::withSum(['sales' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }], 'profit')
            ->orderByDesc('sales_sum_profit')
            ->take(5)
            ->get();
    }

    /**
     * This method returns a collection of all items ordered by their price in descending order.
     *
     * @return Collection The collection of items with their name, price, and stock
     */
    public function index(): Collection
    {
        return Storage::orderBy('item_price','desc')->get();
    }

    /**
     * This method updates an item by its ID with a new name, price, or stock.
     *
     * @param Request $request The request object containing the item ID and the new value
     * @return JsonResponse A JSON response indicating the success of the update
     */
    public function update(Request $request): JsonResponse
    {
        $item = Storage::find($request->input('pk'));
        switch ($request->input('name'))
        {
            case 'item_name':
                $item->item_name = $request->input('value');
                break;
            case 'item_price':
                $item->item_price = $request->input('value');
                break;
            case 'item_in_stock':
                $item->item_in_stock = $request->input('value');
                break;
        }
        $item->save();
        return response()->json(['success' => true]);
    }

    /**
     * This method deletes an item by its ID.
     *
     * @param Request $request The request object containing the item ID
     * @return RedirectResponse A redirect response to the storage page with a status message
     * @throws ModelNotFoundException If the item ID is not found in the database
     */
    public function delete(Request $request):RedirectResponse
    {
        $itemId = $request->input('itemId');
        $item = Storage::findOrFail($itemId);

        // Perform any additional authorization checks here

        $item->delete();

        // Redirect back to the previous page with a success message
        return Redirect::route('manager.storage.index')->with('status', 'item-deleted');
    }

    /**
     * This method creates and stores a new item using a validated request.
     *
     * @param AddItemRequest $request The request object containing the item name, price, and stock
     * @return RedirectResponse A redirect response to the storage page with a status message
     */
    public function store(AddItemRequest $request): RedirectResponse
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Create and store the new item...
        $item = Storage::create([
            'item_name' => $validated['item_name'],
            'item_price' => $validated['item_price'],
            'item_in_stock' => $validated['item_in_stock'],
        ]);

        // Redirect to the  storage page...
        return Redirect::route('manager.storage.index')->with('status', 'item-added');
    }
}
