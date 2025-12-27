<?php

namespace App\Http\Controllers\Dashboard_Patient;

use App\Http\Controllers\Controller;
use App\Interfaces\Patient_dashboard\PatientInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patients;
    public function __construct(PatientInvoicesRepositoryInterface $patients)
    {
        $this->patients = $patients;
    }

    public function invoices()
    {
        return $this->patients->invoices();
    }

    public function laboratories()
    {
        return $this->patients->laboratories();
    }

    // public function viewLaboratories($id)
    // {
    //     return $this->patients->viewLaboratories($id);
    // }

    public function rays()
    {
        return $this->patients->rays();
    }

    // public function viewRays($id)
    // {
    //     return $this->patients->viewRays($id);
    // }

    public function payments()
    {
        return $this->patients->payments();
    }
}
