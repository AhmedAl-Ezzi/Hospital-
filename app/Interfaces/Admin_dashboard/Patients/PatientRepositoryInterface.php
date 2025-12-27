<?php
namespace App\Interfaces\Admin_dashboard\Patients;
use Illuminate\Http\Request;


interface PatientRepositoryInterface
{


    public function index();

    public function store(Request $request);

    public function update(Request $request);

    public function destroy(Request $request);

    public function show_patients($id);


}
