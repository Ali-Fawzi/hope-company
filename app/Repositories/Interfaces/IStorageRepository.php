<?php
namespace App\Repositories\Interfaces;

use App\Http\Requests\AddItemRequest;
use Illuminate\Http\Request;

interface IStorageRepository
{
    public function getMostProfitableItem($startDate, $endDate);
    public function index();

    public function update(Request $request);

    public function delete(Request $request);

    public function store(AddItemRequest $request);
}
