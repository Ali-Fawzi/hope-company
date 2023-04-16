<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IReportsRepository
{
    public function index();

    public function destroy(Request $request);
}
