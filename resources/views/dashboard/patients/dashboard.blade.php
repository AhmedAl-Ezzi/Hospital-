@extends('dashboard.layouts.master')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h2 class="h5 page-title">
                            <span style="font-size:26px">لوحة تحكم المريض</span>
                        </h2>
                    </div>
                </div>

                <!-- start section -->
                <div class="row">

                    {{-- عدد الفواتير --}}
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h5 mb-0">عدد الفواتير</span>
                                        <p class="small text-muted mb-1">إجمالي الفواتير</p>
                                        <span class="badge badge-primary px-3 py-2" style="font-size:14px">
                                            {{ App\Models\Invoice::where('patient_id', auth()->user()->id)->count() }}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-file-text text-primary"
                                            style="font-size:60px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- إجمالي المدفوعات --}}
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h5 mb-0">إجمالي المدفوعات</span>
                                        <p class="small text-muted mb-1">المبلغ المدفوع</p>
                                        <span class="badge badge-success px-3 py-2" style="font-size:14px">
                                            <a href="{{ route('payments.patient') }}" style="color:#fff;text-decoration:none">
                                                {{ App\Models\PatientAccount::where('patient_id', auth()->user()->id)->sum('credit') }}
                                            </a>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-dollar-sign text-success"
                                            style="font-size:60px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- إجمالي المتبقي --}}
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="h5 mb-0">إجمالي المتبقي</span>
                                        <p class="small text-muted mb-1">المبلغ المتبقي</p>
                                        <span class="badge badge-warning px-3 py-2 text-white"
                                            style="font-size:14px">
                                            {{ App\Models\PatientAccount::where('patient_id', auth()->user()->id)->sum('Debit') }}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="fe fe-alert-circle text-warning"
                                            style="font-size:60px;"></span>
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
                        <div class="card shadow">
                            <div class="card-header">
                                <h5 class="mb-0">آخر 5 فواتير</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>تاريخ الفاتورة</th>
                                            <th>اسم المريض</th>
                                            <th>اسم الطبيب</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\App\Models\Invoice::latest()
                                            ->where('patient_id', auth()->user()->id)
                                            ->take(5)->get() as $invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $invoice->patient->name }}</td>
                                                <td>{{ $invoice->doctor->name }}</td>
                                                <td>
                                                    @if ($invoice->case == 0)
                                                        <span class="badge badge-danger">تحت الإجراء</span>
                                                    @else
                                                        <span class="badge badge-success">مكتملة</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-muted">لا توجد بيانات</td>
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
