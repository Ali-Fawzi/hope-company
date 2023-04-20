<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemRequest;
use App\Repositories\Interfaces\IStorageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    private IStorageRepository $storage;

    public function __construct(IStorageRepository $storage)
    {
        $this->storage = $storage;
    }

    public function index():View
    {
        return view('pages.manager.storage.storage',['items'=>$this->storage->index()]);
    }
    public function update(Request $request):JsonResponse
    {
        return $this->storage->update($request);
    }
    public function destroy(Request $request):RedirectResponse
    {
        return $this->storage->delete($request);
    }
    public function create():View
    {
        return view('pages.manager.storage.addItem');
    }
    public function store(AddItemRequest $request):RedirectResponse
    {
        return $this->storage->store($request);
    }
}
