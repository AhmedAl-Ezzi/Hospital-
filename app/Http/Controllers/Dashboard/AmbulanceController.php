<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmbulanceRequest;
use App\Interfaces\Admin_dashboard\Ambulances\AmbulanceRepositoryInterface;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    private $ambulance;

    public function __construct(AmbulanceRepositoryInterface $ambulance)
    {
        $this->ambulance = $ambulance;
    }

    public function index()
    {
        return $this->ambulance->index();
    }

    public function store(Request $request)
    {
        return $this->ambulance->store($request);
    }

    public function update(Request $request)
    {
        return $this->ambulance->update($request);
    }

    public function show(Request $request)
    {
        return $this->ambulance->show($request);
    }

    public function destroy(Request $request)
    {
        return $this->ambulance->destroy($request);
    }
}
