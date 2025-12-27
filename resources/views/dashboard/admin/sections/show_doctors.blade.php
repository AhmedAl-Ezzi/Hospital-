@extends('dashboard.layouts.master')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <br>
                <h2 class="mb-2 page-title">
                    الأطباء التابعين لقسم: {{ $section->name }}
                </h2>
                <br>

                <div class="row my-4">
                    <div class="col-md-12">

                        <div class="card shadow">
                            <div class="card-body">

                                <a href="{{ route('sections.index') }}" class="btn btn-secondary mb-4">
                                    رجوع للأقسام
                                </a>

                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>صورة الطبيب</th>
                                            <th>اسم الطبيب</th>
                                            <th>ايميل الطبيب</th>
                                            <th>اسم القسم</th>
                                            <th>رقم الهاتف</th>
                                            <th>المواعيد</th>
                                            <th>الحالة</th>
                                            <th>تاريخ الإضافة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i = 1; @endphp

                                        @forelse ($doctors as $doctor)
                                            <tr>

                                                <td>{{ $i++ }}</td>

                                                <td>
                                                    <img src="{{ $doctor->image
                                                        ? asset('dashboard/assets/img/doctors/' . $doctor->image->filename)
                                                        : asset('dashboard/assets/img/default-avatar.jpg') }}"
                                                        height="50" width="50"
                                                        style="border-radius: 50%; object-fit: cover;">
                                                </td>

                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>{{ $doctor->section->name }}</td>
                                                <td>{{ $doctor->phone }}</td>

                                                <td>
                                                    @foreach ($doctor->doctorappointments as $appt)
                                                        <span class="badge badge-info">{{ $appt->name }}</span>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @if ($doctor->status == 1)
                                                        <span class="badge badge-success" style="font-size: 14px;">
                                                            مفعل
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger" style="font-size: 14px;">
                                                            غير مفعل
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>{{ $doctor->created_at->diffForHumans() }}</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn ripple btn-outline-primary btn-sm"
                                                            data-toggle="dropdown" type="button">
                                                            عمليات الطبيب <i class="fas fa-caret-down mr-1"></i>
                                                        </button>

                                                        <div class="dropdown-menu tx-13">

                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#edit{{ $doctor->id }}">
                                                                <i class="las la-user-edit text-success"></i>تعديل
                                                                البيانات
                                                            </a>

                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#update_password{{ $doctor->id }}">
                                                                <i class="las la-key text-primary"></i>تغيير كلمة المرور
                                                            </a>

                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#update_status{{ $doctor->id }}">
                                                                <i class="las la-sync text-warning"></i> تغيير الحالة
                                                            </a>

                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#delete{{ $doctor->id }}">
                                                                <i class="bi bi-trash3-fill text-danger"></i> حذف
                                                                البيانات
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            {{-- موديالات الطبيب --}}
                                            @include('dashboard.admin.doctors.edit')
                                            @include('dashboard.admin.doctors.update_password')
                                            @include('dashboard.admin.doctors.update_status')
                                            @include('dashboard.admin.doctors.delete')

                                        @empty
                                            <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                <div class="empty-state-icon display-1 text-secondary mb-2">
                                                    <i class="la la-newspaper"></i>
                                                </div>
                                                <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد اطباء
                                                    مضافين بعد</h2>

                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center mt-4">
                                    {{ $doctors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection
