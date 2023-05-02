<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ISalesRepository;
use App\Repositories\Interfaces\IStorageRepository;
use App\Repositories\Interfaces\IUsersRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    private ISalesRepository $sale;
    private IStorageRepository $storage;

    private IUsersRepository $user;
    public function __construct(ISalesRepository $sale, IStorageRepository $storage, IUsersRepository $user)
    {
        $this->sale = $sale;
        $this->storage = $storage;
        $this->user = $user;
    }

    /**
     * @return View
     * will return the required data for the manager dashboard.
     */
    public function index():View
    {
        return view('pages.manager.dashboard',
        [
            'totalSalesProfitByMonth'=> $this->sale->getTotalSalesProfitByMonth(),
            'topSalespersonByProfit' => $this->sale->getTopSalespersonByProfit(),
            'topSupervisorByTeamProfit'=> $this->sale->getTopSupervisorByTeamProfit(),
            'mostProfitableItem'=> $this->storage->getMostProfitableItem()
        ]);
    }
    public function groups():View
    {
        return view('pages.manager.users.groups',['groups'=>$this->user->getGroups()]);
    }
    public function unset(Request $request):RedirectResponse
    {
        return $this->user->unset($request);
    }
    public function setSalesPersonToSupervisor(Request $request)
    {
        return $this->user->setSalesPersonToSupervisor($request);
    }
    public function addSalesPerson():View
    {
        return view('pages.manager.users.addSalesPerson',['unsupervisedSalesPersons'=>$this->user->getUnsupervisedSalesPersons()]);
    }

}
