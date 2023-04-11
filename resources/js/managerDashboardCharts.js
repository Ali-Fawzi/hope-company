function createChartConfig(type, labels, data, title, titleText)
{
    return{
    type: type,
    data: {
        labels: labels,
        datasets: [{
            label:title,
            data: data,
            backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: titleText
            }
        }
    }}
}

const totalSalesProfitByMonthData = JSON.parse(document.getElementById('totalSalesProfitByMonth').getAttribute('data-totalSalesProfitByMonth'));
const month = totalSalesProfitByMonthData.map(function (e) {
    return e.month;
});
const total_profit = totalSalesProfitByMonthData.map(function (e) {
    return e.total_profit;
});
const totalSalesProfitByMonthChart = new Chart(document.getElementById('totalSalesProfitByMonth').getContext('2d'),
                        createChartConfig('bar', month, total_profit,"وارد المبيعات الشهري",
                            "الوارد حلال شهر"));


const topSalespersonByProfitData = JSON.parse(document.getElementById('topSalespersonByProfit').getAttribute('data-topSalespersonByProfit'));
const salesPersonName = topSalespersonByProfitData.map(function (e) {
    return e.name;
});
const sales_sum_profit = topSalespersonByProfitData.map(function (e) {
    return e.sales_sum_profit;
});
const topSalespersonByProfitChart = new Chart(document.getElementById('topSalespersonByProfit').getContext('2d'),
    createChartConfig('pie', salesPersonName, sales_sum_profit,"وارد المبيعات",
        "افضل مندوبي المبيعات نسبة الى تحقيق المبيعات"));

const topSupervisorByTeamProfitData = JSON.parse(document.getElementById('topSupervisorByTeamProfit').getAttribute('data-topSupervisorByTeamProfit'));
const supervisorName = topSupervisorByTeamProfitData.map(function (e) {
    return e.supervisor_name;
});
const totalTeamProfit = topSupervisorByTeamProfitData.map(function (e) {
    return e.total_profit;
});
const topSupervisorByTeamProfitChart = new Chart(document.getElementById('topSupervisorByTeamProfit').getContext('2d'),
    createChartConfig('doughnut', supervisorName, totalTeamProfit,"فريق ",
        "اسماء مشرفين افضل فرق مندوبي المبيعات"));

const mostProfitableItemData = JSON.parse(document.getElementById('mostProfitableItem').getAttribute('data-mostProfitableItem'));
const itemName = mostProfitableItemData.map(function (e) {
    return e.item_name;
});
const itemProfit = mostProfitableItemData.map(function (e) {
    return e.sales_sum_profit;
});
const mostProfitableItemChart = new Chart(document.getElementById('mostProfitableItem').getContext('2d'),
    createChartConfig('polarArea', itemName, itemProfit,"الايتم ",
        "افضل الايتمات مبيعا"));
