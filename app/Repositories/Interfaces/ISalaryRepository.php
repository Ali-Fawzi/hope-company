<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface ISalaryRepository
{
    public function index();

    public function update(Request $request);

    public function getUsersWithoutSalary(Request $request);

    public function store(Request $request);
}
