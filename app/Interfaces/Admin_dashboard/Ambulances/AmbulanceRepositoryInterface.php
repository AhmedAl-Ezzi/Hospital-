<?php

namespace App\Interfaces\Admin_dashboard\Ambulances;

use App\Http\Requests\StoreAmbulanceRequest;
use Illuminate\Http\Request;

interface AmbulanceRepositoryInterface
{

    // get All Sections
    public function index();

    // store Sections
    public function store(Request $request);

    // Update Sections
    public function update(Request $request);

    // Show Sections
    public function show($request);

    // destroy Sections
    public function destroy($request);

}
