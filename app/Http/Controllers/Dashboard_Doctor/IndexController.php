<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctor_dashboard\Index\IndexRepositoryInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $index;
    public function __construct(IndexRepositoryInterface $index)
    {
        $this->index = $index;
    }

    public function index()
    {
        return $this->index->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
