<?php
namespace App\Repositories;
use App\Models\Sales;
use App\Models\User;
use App\Repositories\Interfaces\ISalesRepository;

class SalesRepository implements ISalesRepository
{

    public function getTotalSalesProfitByMonth()
    {
        return Sales::selectRaw('SUM(profit) as total_profit, MONTH(date) as month')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
    }

    public function getTopSalespersonByProfit($startDate, $endDate)
    {
        return User::withSum(['sales' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }], 'profit')
            ->orderByDesc('sales_sum_profit')
            ->take(5)
            ->get();
    }

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
