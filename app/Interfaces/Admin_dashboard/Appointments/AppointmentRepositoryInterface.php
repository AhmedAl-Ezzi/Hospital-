<?php

namespace App\Interfaces\Admin_dashboard\Appointments;

use Illuminate\Http\Request;

interface AppointmentRepositoryInterface
{

    public function index();
    public function index2();
    public function finsh();
    public function approval(Request $request, $id);
    public function destroy($id);
}
