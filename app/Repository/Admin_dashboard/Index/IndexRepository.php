<?php

namespace App\Repository\Admin_dashboard\Index;

use App\Events\MyEvent;
use App\Interfaces\Admin_dashboard\Index\IndexRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Insurance;
use App\Models\Patient;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;

class IndexRepository implements IndexRepositoryInterface
{

    public function index()
    {
        $data['doctors']=Doctor::count();
        $data['patients']=Patient::count();
        $data['sections']=Section::count();

        return view('dashboard.admin.dashboard',$data);
    }
}
