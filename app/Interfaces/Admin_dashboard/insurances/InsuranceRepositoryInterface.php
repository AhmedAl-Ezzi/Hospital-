<?php
namespace App\Interfaces\Admin_dashboard\insurances;


interface InsuranceRepositoryInterface
{

    // get All Sections
    public function index();

    // store Sections
    public function store($request);

    // Update Sections
    public function update($request);

    // Show Sections
    public function show($request);

    // destroy Sections
    public function destroy($request);


}
