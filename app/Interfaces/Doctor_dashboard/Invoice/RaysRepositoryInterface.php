<?php

namespace App\Interfaces\Doctor_dashboard\Invoice;

use Illuminate\Http\Request;

interface RaysRepositoryInterface
{

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
