<?php

namespace App\Http\Controllers\WibSite;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Random\Engine\Secure;

class IndexController extends Controller
{

    public function index()
    {
                $sections= Section::all();
                $doctors = Doctor::latest()->take(4)->get();
        return view('welcome',compact('sections','doctors'));
    }

}
