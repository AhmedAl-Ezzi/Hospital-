<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctor_dashboard\Invoice\LaboratoriesRepositoryInterface;
use Illuminate\Http\Request;

class LaboratorieController extends Controller
{
   private $laboratorie;

    public function __construct(LaboratoriesRepositoryInterface $laboratorie)
    {
        $this->laboratorie = $laboratorie;
    }

    public function store(Request $request)
    {
        return $this->laboratorie->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->laboratorie->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->laboratorie->destroy($id);
    }
}
