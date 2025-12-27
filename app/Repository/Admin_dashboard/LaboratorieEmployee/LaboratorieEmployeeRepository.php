<?php

namespace App\Repository\Admin_dashboard\LaboratorieEmployee;

use App\Interfaces\Admin_dashboard\LaboratorieEmployee\LaboratorieEmployeeRepositoryInterface;
use App\Models\LaboratorieEmployee;
use App\Models\RayEmployee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class LaboratorieEmployeeRepository implements LaboratorieEmployeeRepositoryInterface
{

    public function index()
    {
        $laboratorie_employees = LaboratorieEmployee::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.laboratorie_employees.index', compact('laboratorie_employees'));
    }

    public function store($request)
    {
        try {

            $laboratorie_employee = new LaboratorieEmployee();
            $laboratorie_employee->name = $request->name;
            $laboratorie_employee->email = $request->email;
            $laboratorie_employee->password = Hash::make($request->password);
            $laboratorie_employee->save();
            flash()->success('تم اضافة البيانات بنجاح.');
            return back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }
        $ray_employee = LaboratorieEmployee::find($id);
        $ray_employee->update($input);
        flash()->addInfo('تم تعديل البيانات بنجاح.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            LaboratorieEmployee::destroy($id);
            flash()->addWarning('تم حذف البيانات بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
