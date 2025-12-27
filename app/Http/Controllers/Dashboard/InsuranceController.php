<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin_dashboard\insurances\InsuranceRepositoryInterface;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

     private $insurances;
    public function __construct(InsuranceRepositoryInterface $insurances)
    {
        $this->insurances = $insurances;
    }


    public function index()
    {
        return $this->insurances->index();
    }


    public function store(Request $request)
    {
         return $this->insurances->store($request);
    }


    public function update(Request $request)
    {
        return $this->insurances->update($request);
    }

    public function show(Request $request)
    {
        return $this->insurances->show($request);
    }

    public function destroy(Request $request)
    {
        return $this->insurances->destroy($request);
    }

}
