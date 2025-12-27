<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin_dashboard\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patients;
    public function __construct(PatientRepositoryInterface $patients)
    {
        $this->patients = $patients;
    }

    public function index()
    {
        return $this->patients->index();
    }

    public function store(Request $request)
    {
        return $this->patients->store($request);
    }

    public function update(Request $request)
    {
        return $this->patients->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->patients->destroy($request);
    }

    public function show_patients($id)
    {
        return $this->patients->show_patients($id);
    }
}
