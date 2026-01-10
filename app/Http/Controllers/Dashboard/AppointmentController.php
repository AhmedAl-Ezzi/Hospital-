<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin_dashboard\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointments;
    public function __construct(AppointmentRepositoryInterface $appointments)
    {
        $this->appointments = $appointments;
    }
    public function index()
    {
        return $this->appointments->index();
    }

    public function index2()
    {
        return $this->appointments->index2();
    }

    public function finsh()
    {
        return $this->appointments->finsh();
    }

    public function approval(Request $request, $id)
    {
        return $this->appointments->approval($request, $id);
    }

    public function destroy($id)
    {
        return $this->appointments->destroy($id);
    }
}
