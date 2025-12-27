<?php

namespace App\Repository\Admin_dashboard\Sections;

use App\Interfaces\Admin_dashboard\Sections\SectionRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.sections.index', compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        flash()->success('تم اضافة القسم بنجاح.');
        return redirect()->route('sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        flash()->addInfo('تم تعديل القسم بنجاح.');
        return redirect()->route('sections.index');
    }

    public function show($request)
    {
        Section::findOrFail($request->id);
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        flash()->addWarning('تم حذف القسم بنجاح.');
        return redirect()->route('sections.index');
    }

    public function show_doctors($id)
    {
        $section = Section::findOrFail($id);

        // جلب الأطباء مع الصور والمواعيد
        $doctors = Doctor::where('section_id', $id)
            ->with(['image', 'doctorappointments', 'section'])
            ->orderBy('id', 'desc')->paginate(15);

        // جلب الأقسام والمواعيد لكل المودالات
        $sections = Section::all();
        $appointments = Appointment::all();

        return view('dashboard.admin.sections.show_doctors', compact('section', 'doctors', 'sections', 'appointments'));
    }
}
