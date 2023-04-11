<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/managerDashboardCharts.js'])
    @include('pages.manager.navbar')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-sky-900 text-center">
                        <section class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                            <div class="w-full md:w-2/4">
                                <canvas id="totalSalesProfitByMonth" data-totalSalesProfitByMonth="{{$totalSalesProfitByMonth}}"></canvas>
                            </div>
                            <div class="w-full md:w-2/4">
                                <canvas id="topSupervisorByTeamProfit" data-topSupervisorByTeamProfit="{{$topSupervisorByTeamProfit}}"></canvas>
                            </div>
                            <div class="w-full md:w-2/4">
                                <canvas id="topSalespersonByProfit" data-topSalespersonByProfit="{{$topSalespersonByProfit}}"></canvas>
                            </div>
                            <div class="w-full md:w-2/4">
                                <canvas id="mostProfitableItem" data-mostProfitableItem="{{$mostProfitableItem}}"></canvas>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
