<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin_dashboard\Doctors\DoctorsRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctors;
    public function __construct(DoctorsRepositoryInterface $doctors)
    {
        $this->doctors = $doctors;
    }
    public function index()
    {
        return $this->doctors->index();
    }

    public function store(Request $request)
    {
        return $this->doctors->store($request);
    }

    public function update(Request $request)
    {
        return $this->doctors->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->doctors->destroy($request);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        return $this->doctors->update_password($request);
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        return $this->doctors->update_status($request);
    }
}
