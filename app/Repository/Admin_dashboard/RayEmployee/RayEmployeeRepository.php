<?php

namespace App\Repository\Admin_dashboard\RayEmployee;

use App\Interfaces\Admin_dashboard\RayEmployee\RayEmployeeRepositoryInterface;
use App\Models\RayEmployee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class RayEmployeeRepository implements RayEmployeeRepositoryInterface
{

    public function index()
    {
        $ray_employees = RayEmployee::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.ray_employee.index', compact('ray_employees'));
    }

    public function store($request)
    {
        try {

            $ray_employee = new RayEmployee();
            $ray_employee->name = $request->name;
            $ray_employee->email = $request->email;
            $ray_employee->password = Hash::make($request->password);
            $ray_employee->save();
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

        $ray_employee = RayEmployee::find($id);
        $ray_employee->update($input);

        flash()->addInfo('تم تعديل البيانات بنجاح.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            RayEmployee::destroy($id);
            flash()->addWarning('تم حذف البيانات بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
