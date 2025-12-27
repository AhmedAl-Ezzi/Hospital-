<?php

namespace App\Interfaces\Admin_dashboard\Doctors;

use Illuminate\Http\Request;

interface DoctorsRepositoryInterface
{

    // get All Sections
    public function index();

    // store Sections
    public function store($request);

    // Update Sections
    public function update(Request $request);

    // destroy Sections
    public function destroy($request);

    public function update_password(Request $request);

    public function update_status(Request $request);
}
