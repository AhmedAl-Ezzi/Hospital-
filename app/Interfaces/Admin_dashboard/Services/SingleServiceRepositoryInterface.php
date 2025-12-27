<?php
namespace App\Interfaces\Admin_dashboard\Services;
use Illuminate\Http\Request;


interface SingleServiceRepositoryInterface
{

    // get All Service
    public function index();

    // store Service
    public function store(Request $request);

    // show Service
    public function show(Request $request);
    // Update Service
    public function update(Request $request);

    // destroy Service
    public function destroy(Request $request);

}
