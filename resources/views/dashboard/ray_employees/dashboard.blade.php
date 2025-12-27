@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row align-items-center mb-2">
                        <div class="col">

                            <h2 class="h5 page-title">
                                <span style="font-size: 26px">     لوحة تحكم الاشعة</span>

                            {{-- مرحبا! {{ auth()->user()->name }} --}}

                            </h2>
                        </div>
                    </div>


                    <!-- start section -->
                    <div class="row">

                        {{-- إجمالي الفواتير --}}
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="h5 mb-0">اجمالي عدد الفواتير</span>
                                            <p class="small text-muted mb-0">الفواتير</p>
                                            <span class="badge badge-pill badge-primary" style="font-size: 14px">
                                                +{{ App\Models\Ray::count() }}
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-file-text fe-48 text-primary" style="font-size:55px;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- تحت الإجراء --}}
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="h5 mb-0">اجمالي عدد الفواتير تحت الاجراء</span>
                                            <p class="small text-muted mb-0">الفواتير</p>
                                            <span class="badge badge-pill badge-danger" style="font-size: 14px">
                                                +{{ App\Models\Ray::where('case', 0)->count() }}
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-clock fe-48 text-danger" style="font-size:55px;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- المكتملة --}}
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="h5 mb-0">اجمالي عدد الفواتير المكتملة</span>
                                            <p class="small text-muted mb-0">الفواتير</p>
                                            <span class="badge badge-pill badge-success" style="font-size: 14px">
                                                +{{ App\Models\Ray::where('case', 1)->count() }}
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-check-circle fe-48 text-success"
                                                style="font-size:55px;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end section -->



                    {{-- جدول آخر 5 فواتير --}}
                    <div class="row row-sm row-deck">
                        <div class="col-md-12">
                            <div class="card card-table-two">
                                <div class="card-header">
                                    <h5 class="mb-0">اخر 5 فواتير على النظام</h5>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0 text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>تاريخ الفاتورة</th>
                                                <th>اسم الموظف</th>
                                                <th>اسم المريض</th>
                                                <th>اسم الطبيب</th>
                                                <th>المطلوب</th>
                                                <th>حالة الفاتورة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse(\App\Models\Ray::latest()->take(5)->get() as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        {{ $invoice->case == 0 ? 'noEmployee' : $invoice->employee->name }}
                                                    </td>
                                                    <td>{{ $invoice->patient->name }}</td>
                                                    <td>{{ $invoice->doctor->name }}</td>
                                                    <td>{{ $invoice->description }}</td>
                                                    <td>

                                                        @if ($invoice->case == 0)
                                                            <span class="badge badge-danger" style="font-size:12px">تحت
                                                                الاجراء</span>
                                                        @else
                                                            <span class="badge badge-success"
                                                                style="font-size:12px">مكتملة</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-muted">
                                                        لا توجد بيانات
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
            </div>
        </div>
    </main>
@endsection
