<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ISalesRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SalesController extends Controller
{
    private ISalesRepository $sales;
    public function __construct(ISalesRepository $sales)
    {
        $this->sales = $sales;
    }
    public function index():View
    {
        return view('pages.manager.sales.sales',['salesRecords' =>$this->sales->index()]);
    }
    public function show():View
    {
        return view('pages.supervisor.sales.sales',['salesRecords' =>$this->sales->show()]);
    }

    public function create():View
    {
        return view('pages.salesPerson.sales.addSalesRecord');
    }
    public function destroy(Request $request):RedirectResponse
    {
        return $this->sales->destroy($request);
    }
    public function store(Request $request):RedirectResponse
    {
        return $this->sales->store($request);
    }
}
