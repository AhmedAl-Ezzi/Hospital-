<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin_dashboard\Services\SingleServiceRepositoryInterface;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    private $SingleService;
    public function __construct(SingleServiceRepositoryInterface $SingleService)
    {
        $this->SingleService = $SingleService;
    }

    public function index()
    {
        return $this->SingleService->index();
    }

    public function store(Request $request)
    {
        return $this->SingleService->store($request);
    }

    public function show(Request $request)
    {
        return $this->SingleService->show($request);
    }

    public function update(Request $request)
    {
        return $this->SingleService->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->SingleService->destroy($request);
    }
}
