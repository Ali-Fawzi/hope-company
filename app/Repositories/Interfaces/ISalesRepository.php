<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;


interface ISalesRepository
{
    public function getTotalSalesProfitByMonth();
    public function getTopSalespersonByProfit();
    public function getTopSupervisorByTeamProfit();

    public function index();

    public function show();
    public function store(Request $request);

    public function destroy(Request $request);

    public function getMySales();
}
