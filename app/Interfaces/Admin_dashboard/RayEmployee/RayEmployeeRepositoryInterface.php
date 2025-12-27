<?php

namespace App\Interfaces\Admin_dashboard\RayEmployee;

interface RayEmployeeRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request,$id);

    public function destroy($id);

}
