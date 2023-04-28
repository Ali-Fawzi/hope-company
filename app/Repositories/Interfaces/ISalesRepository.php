<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;


interface ISalesRepository
{
    public function getTotalSalesProfitByMonth();
    public function getTopSalespersonByProfit($startDate, $endDate);
    public function getTopSupervisorByTeamProfit($startDate, $endDate);

    public function index();

    public function show();
    public function store(Request $request);

    public function destroy(Request $request);

    public function getMySales();
}
