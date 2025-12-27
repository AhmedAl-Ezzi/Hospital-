<?php

namespace App\Interfaces\Doctor_dashboard\Invoice;

use Illuminate\Http\Request;

interface InvoicesRepositoryInterface
{

    public function index();

    public function completedInvoices();

    public function reviewInvoices();



}
