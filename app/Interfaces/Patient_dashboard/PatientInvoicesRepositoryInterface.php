<?php

namespace App\Interfaces\Patient_dashboard;

interface PatientInvoicesRepositoryInterface
{

    public function invoices();

    public function laboratories();

    // public function viewLaboratories($id);

    public function rays();

    // public function viewRays($id);

    public function payments();

}
