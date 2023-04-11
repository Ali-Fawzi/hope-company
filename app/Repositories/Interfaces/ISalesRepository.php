<?php
namespace App\Repositories\Interfaces;

interface ISalesRepository
{
    public function getTotalSalesProfitByMonth();
    public function getTopSalespersonByProfit($startDate, $endDate);
    public function getTopSupervisorByTeamProfit($startDate, $endDate);
}
