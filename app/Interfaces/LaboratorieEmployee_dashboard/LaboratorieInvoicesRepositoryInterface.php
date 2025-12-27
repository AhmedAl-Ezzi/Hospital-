<?php

namespace App\Interfaces\LaboratorieEmployee_dashboard;

interface LaboratorieInvoicesRepositoryInterface
{
    public function index();

    public function completed_invoices();

    public function edit($id);

    public function update($request, $id);

    public function view_rays($id);
}
