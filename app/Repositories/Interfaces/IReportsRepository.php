<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IReportsRepository
{
    public function index();
    public function destroy(Request $request);
    public function kickSalesPerson(Request $request);

    public function store(Request $request);
}
