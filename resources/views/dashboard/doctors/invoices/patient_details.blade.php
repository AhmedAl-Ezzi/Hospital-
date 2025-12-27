{{-- @extends('dashboard.layouts.master-doctor')

@section('content')

<style>
/* ===== Timeline Wrapper ===== */
.vtimeline {
    position: relative;
    padding-right: 60px;
}

/* الخط العمودي */
.vtimeline::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    right: 30px;
    width: 2px;
    background: #e5e7eb;
}

/* كل عنصر */
.timeline-wrapper {
    position: relative;
    margin-bottom: 30px;
}

/* أيقونة الحدث */
.timeline-badge {
    position: absolute;
    right: 10px;
    top: 20px;
    width: 46px;
    height: 46px;
    background: #2563eb;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.timeline-badge i {
    font-size: 22px;
    color: #fff;
}

/* صندوق المحتوى */
.timeline-panel {
    background: #fff;
    border-radius: 10px;
    padding: 20px 25px;
    margin-right: 70px;
    border: 1px solid #e5e7eb;
}

/* العنوان */
.timeline-title {
    font-size: 16px;
    font-weight: 600;
    color: #1f2937;
}

/* تذييل */
.timeline-footer {
    font-size: 14px;
    color: #374151;
}

/* أيقونة الدكتور */
.doctor-icon {
    font-size: 22px;
}

/* شارة */
.badge-light-primary {
    background-color: rgba(37, 99, 235, 0.1);
    color: #2563eb;
    font-weight: 500;
}
</style>

<main role="main" class="main-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="page-title">
                    سجل المريض
                    <small class="d-block text-muted mt-1">التاريخ الطبي والتشخيصات</small>
                </h2>
            </div>
        </div>

        <!-- Timeline -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="vtimeline">

                            @forelse ($patient_records as $patient_record)
                                <div class="timeline-wrapper">

                                    <!-- أيقونة -->
                                    <div class="timeline-badge">
                                        <i class="las la-notes-medical"></i>
                                    </div>

                                    <!-- المحتوى -->
                                    <div class="timeline-panel">

                                        <!-- العنوان + التاريخ -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="timeline-title mb-0">تشخيص طبي</h6>
                                            <small class="text-muted">
                                                <i class="las la-calendar mr-1"></i>
                                                {{ $patient_record->date }}
                                            </small>
                                        </div>

                                        <!-- التشخيص -->
                                        <p class="mb-3 text-dark">
                                            {{ $patient_record->diagnosis }}
                                        </p>

                                        <!-- الفوتر -->
                                        <div class="timeline-footer d-flex justify-content-between align-items-center pt-2 border-top">

                                            <div class="d-flex align-items-center">
                                                <i class="las la-user-md text-primary doctor-icon mr-2"></i>
                                                <span class="font-weight-bold">
                                                    سجل الدكتور :
                                                    {{ $patient_record->Doctor->name }}
                                                </span>
                                            </div>

                                            <span class="badge badge-light-primary">
                                                سجل طبي
                                            </span>

                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <i class="las la-folder-open la-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">لا يوجد سجلات طبية</p>
                                </div>
                            @endforelse

                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection --}}













@extends('dashboard.layouts.master')

@section('content')
    <style>
        /* ===== Timeline Wrapper ===== */
        .vtimeline {
            position: relative;
            padding-right: 60px;
        }

        /* الخط العمودي */
        .vtimeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            right: 30px;
            width: 2px;
            background: #e5e7eb;
        }

        /* كل عنصر */
        .timeline-wrapper {
            position: relative;
            margin-bottom: 30px;
        }

        /* أيقونة الحدث */
        .timeline-badge {
            position: absolute;
            right: 10px;
            top: 20px;
            width: 46px;
            height: 46px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .timeline-badge i {
            font-size: 22px;
            color: #fff;
        }

        /* صندوق المحتوى */
        .timeline-panel {
            background: #fff;
            border-radius: 10px;
            padding: 20px 25px;
            margin-right: 70px;
            border: 1px solid #e5e7eb;
        }

        /* العنوان */
        .timeline-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }

        /* تذييل */
        .timeline-footer {
            font-size: 14px;
            color: #374151;
        }

        /* أيقونة الدكتور */
        .doctor-icon {
            font-size: 22px;
        }

        /* شارة */
        .badge-light-primary {
            background-color: rgba(37, 99, 235, 0.1);
            color: #2563eb;
            font-weight: 500;
        }
    </style>

    <main role="main" class="main-content">
        <div class="container-fluid">

            {{-- الشرط  --}}
            {{-- @if ($patient_rays->where('doctor_id', auth()->user()->id)->count() > 0) --}}


            {{-- @php
                $hasAccess =
                    $patient_rays->where('doctor_id', auth()->user()->id)->count() > 0 ||
                    $patient_laboratories->where('doctor_id', auth()->user()->id)->count() > 0 ||
                    $patient_records->where('doctor_id', auth()->user()->id)->count() > 0;
            @endphp

            @if ($hasAccess) --}}


                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="page-title">
                            معلومات المريض
                            <small class="d-block text-muted mt-1">السجل الطبي والأشعة</small>
                        </h2>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <ul class="nav nav-tabs mb-4">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#records">
                                    <i class="las la-notes-medical mr-1"></i>
                                    سجل المريض
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rays">
                                    <i class="las la-x-ray mr-1"></i>
                                    الأشعة
                                </a>
                            </li>


                            {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#laboratorie">
                                <i class="las la-x-ray mr-1"></i>
                                المختبر
                            </a>
                        </li> --}}

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#laboratorie">
                                    <i class="las la-vials mr-1"></i>
                                    المختبر
                                </a>
                            </li>


                        </ul>

                        <div class="tab-content">

                            {{-- ================= سجل المريض ================= --}}
                            <div class="tab-pane fade show active" id="records">

                                <div class="vtimeline">

                                    @forelse ($patient_records as $patient_record)
                                        <div class="timeline-wrapper">

                                            <div class="timeline-badge">
                                                <i class="las la-notes-medical"></i>
                                            </div>

                                            <div class="timeline-panel">

                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h6 class="timeline-title mb-0">تشخيص طبي</h6>
                                                    <small class="text-muted">
                                                        <i class="las la-calendar mr-1"></i>
                                                        {{ \Carbon\Carbon::parse($patient_record->date)->format('Y-m-d') }}
                                                    </small>
                                                </div>

                                                <p class="mb-3 text-dark">
                                                    {{ $patient_record->diagnosis }}
                                                </p>

                                                <div
                                                    class="timeline-footer d-flex justify-content-between align-items-center pt-2 border-top">
                                                    <div class="d-flex align-items-center">
                                                        <i class="las la-user-md text-primary doctor-icon mr-2"></i>
                                                        <span class="font-weight-bold">
                                                            سجل الدكتور :
                                                            {{ $patient_record->Doctor->name }}
                                                        </span>
                                                    </div>

                                                    <span class="badge badge-light-primary" style="font-size: 12px">
                                                        سجل طبي
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-5">
                                            <i class="las la-folder-open la-3x text-muted mb-3"></i>
                                            <p class="text-muted mb-0">لا يوجد سجل طبي</p>
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                            {{-- ================= الأشعة ================= --}}
                            <div class="tab-pane fade" id="rays">

                                <div class="table-responsive">
                                    {{-- <table class="table table-hover text-center align-middle" dir="rtl"> --}}
                                    <table class="table datatables">

                                        <thead class="thead-light">

                                            <tr>
                                                <th>#</th>
                                                <th>الوصف</th>
                                                <th>اسم الدكتور</th>
                                                <th>اسم الموظف </th>
                                                <th>حالة الكشف</th>
                                                <th>العمليات</th>



                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($patient_rays as $ray)
                                                {{-- @if ($ray->doctor_id == auth()->user()->id) --}}
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        {{ $ray->description }}
                                                    </td>

                                                    <td>
                                                        {{ $ray->doctor->name ?? '-' }}
                                                    </td>

                                                    <td>{{ $ray->employee->name }}</td>

                                                    <td>
                                                        @if ($ray->case == 0)
                                                            <span class="badge badge-danger" style="font-size: 12px">
                                                                غير مكتملة
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success" style="font-size: 12px">
                                                                مكتملة
                                                            </span>
                                                        @endif
                                                    </td>



                                                    @if ($ray->doctor_id == auth()->user()->id)
                                                        @if ($ray->case == 0)
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn btn-primary"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#edit_xray_conversion{{ $ray->id }}"><i
                                                                        class="las la-pen"></i></a>

                                                                <a class="modal-effect btn btn-sm btn-danger"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#delete{{ $ray->id }}"><i
                                                                        class="bi bi-trash3-fill"></i></a>

                                                            </td>
                                                        @else
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn-warning"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#x-ray_images{{ $ray->id }}"><i
                                                                        class="fe-download-cloud"></i></a>
                                                            </td>
                                                        @endif
                                                    @endif

                                                    @include('dashboard.doctors.invoices.edit_xray_conversion')
                                                    @include('dashboard.doctors.invoices.delete')
                                                    @include('dashboard.doctors.invoices.x-ray_images')
                                                    {{-- @else
                                                <tr>
                                                    <td colspan="6"
                                                        class="text-center text-danger font-weight-bold py-4">
                                                        🚫 ليس لديك الصلاحية لعرض هذه الأشعة
                                                    </td>
                                                </tr>
                                                @break --}}

                                                    {{-- نوقف اللوب عشان ما تتكرر الرسالة --}}
                                                    {{-- @endif --}}


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-muted py-4">
                                                        لا توجد أشعة
                                                    </td>
                                                </tr>
                                            @endforelse




                                            {{-- @forelse ($patient_rays as $ray)

    @if ($ray->doctor_id == auth()->user()->id)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $ray->description }}
            </td>

            <td>
                {{ $ray->doctor->name ?? '-' }}
            </td>

            <td>{{ $ray->employee->name }}</td>

            <td>
                @if ($ray->case == 0)
                    <span class="badge badge-danger" style="font-size: 12px">
                        غير مكتملة
                    </span>
                @else
                    <span class="badge badge-success" style="font-size: 12px">
                        مكتملة
                    </span>
                @endif
            </td>

            <td>
                @if ($ray->case == 0)
                    <a class="modal-effect btn btn-sm btn-primary"
                       data-toggle="modal"
                       href="#edit_xray_conversion{{ $ray->id }}">
                        <i class="las la-pen"></i>
                    </a>

                    <a class="modal-effect btn btn-sm btn-danger"
                       data-toggle="modal"
                       href="#delete{{ $ray->id }}">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                @else
                    <a class="modal-effect btn btn-sm btn-warning"
                       data-toggle="modal"
                       href="#x-ray_images{{ $ray->id }}">
                        <i class="fe-download-cloud"></i>
                    </a>
                @endif
            </td>
        </tr>

        @include('dashboard.doctors.invoices.edit_xray_conversion')
        @include('dashboard.doctors.invoices.delete')
        @include('dashboard.doctors.invoices.x-ray_images')

    @endif

@empty
    <tr>
        <td colspan="6" class="text-center text-muted py-4">
            لا توجد أشعة
        </td>
    </tr>
@endforelse --}}


                                        </tbody>
                                    </table>
                                </div>


                            </div>



                            {{-- ================= المختبر ================= --}}
                            <div class="tab-pane fade" id="laboratorie">

                                <div class="table-responsive">
                                    {{-- <table class="table table-hover text-center align-middle" dir="rtl"> --}}
                                    <table class="table datatables">

                                        <thead class="thead-light">

                                            <tr>
                                                <th>#</th>
                                                <th>الوصف</th>
                                                <th>اسم الدكتور</th>
                                                <th>الحالة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($patient_laboratories as $laboratorie)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        {{ $laboratorie->description }}
                                                    </td>

                                                    <td>
                                                        {{ $laboratorie->doctor->name ?? '-' }}
                                                    </td>

                                                    <td>
                                                        @if ($laboratorie->case == 0)
                                                            <span class="badge badge-danger" style="font-size: 12px">
                                                                غير مكتملة
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success" style="font-size: 12px">
                                                                مكتملة
                                                            </span>
                                                        @endif
                                                    </td>



                                                    {{-- @if ($laboratorie->doctor_id == auth()->user()->id)
                                                    @if ($laboratorie->case == 0)
                                                        <td>
                                                            <a class="modal-effect btn btn-sm btn btn-primary"
                                                                data-effect="effect-scale" data-toggle="modal"
                                                                href="#edit_laboratorie_conversion{{ $laboratorie->id }}"><i
                                                                    class="las la-pen"></i></a>

                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                data-effect="effect-scale" data-toggle="modal"
                                                                href="#deleted_laboratorie{{ $laboratorie->id }}"><i
                                                                    class="bi bi-trash3-fill"></i></a>

                                                        </td>

                                                         @else
                                                        <td>
                                                            <a class="modal-effect btn btn-sm btn-warning"
                                                                data-effect="effect-scale" data-toggle="modal"
                                                                href="#x-ray_images{{ $ray->id }}"><i
                                                                    class="fe-download-cloud"></i></a>
                                                        </td>
                                                    @endif


                                                    @endif
                                                @endif --}}


                                                    @if ($laboratorie->doctor_id == auth()->user()->id)
                                                        @if ($laboratorie->case == 0)
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn btn-primary"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#edit_laboratorie_conversion{{ $laboratorie->id }}"><i
                                                                        class="las la-pen"></i></a>

                                                                <a class="modal-effect btn btn-sm btn-danger"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#deleted_laboratorie{{ $laboratorie->id }}"><i
                                                                        class="bi bi-trash3-fill"></i></a>

                                                            </td>
                                                        @else
                                                            <td>
                                                                <a class="modal-effect btn btn-sm btn-warning"
                                                                    data-effect="effect-scale" data-toggle="modal"
                                                                    href="#laboratories_images{{ $laboratorie->id }}"><i
                                                                        class="fe-download-cloud"></i></a>
                                                            </td>
                                                            @include('dashboard.doctors.invoices.laboratories_images')
                                                        @endif
                                                    @endif


                                                    @include('dashboard.doctors.invoices.edit_laboratorie_conversion')
                                                    @include('dashboard.doctors.invoices.deleted_laboratorie')


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-muted py-4">
                                                        لا يوجد مختبر
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>


                            </div>


                        </div>







                    </div>
                </div>

                
            {{-- @else
                @include('dashboard.doctors.page-404')
            @endif --}}

        </div>
    </main>
@endsection
