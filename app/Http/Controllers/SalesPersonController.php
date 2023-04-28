<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ISalesRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalesPersonController extends Controller
{
    private ISalesRepository $sales;
    public function __construct(ISalesRepository $sales)
    {
        $this->sales = $sales;
    }

    public function index():View
    {
        return view('pages.salesPerson.dashboard',['data'=>$this->sales->getMySales()]);
    }
}
