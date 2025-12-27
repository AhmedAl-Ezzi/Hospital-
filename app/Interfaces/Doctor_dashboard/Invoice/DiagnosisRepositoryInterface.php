<?php

namespace App\Interfaces\Doctor_dashboard\Invoice;

use Illuminate\Http\Request;

interface DiagnosisRepositoryInterface
{

    public function store($request);

    public function show($id);

    public function addReview($request);
}
