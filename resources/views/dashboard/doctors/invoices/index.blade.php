@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">الـكـشوفات/
                        <span style="font-size: 26px">تحت الاجراءت</span>
                    </h2>
                    <br>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">

                                        {{-- <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                            data-target="#add">
                                            + إضافة كشف جديد
                                        </button> --}}
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>تاريخ الفاتورة</th>
                                                <th>اسم الخدمة</th>
                                                <th>اسم المريض</th>
                                                <th>سعر الخدمة</th>
                                                <th>قيمة الخصم</th>
                                                <th>نسبة الضريبة</th>
                                                <th>قيمة الضريبة</th>
                                                <th>الاجمالي مع الضريبة</th>
                                                <th>حالة الفاتورة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->invoice_date }}</td>
                                                    <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                                    <td>
                                                        <a href="{{ route('diagnostics.show', $invoice->patient_id) }}">
                                                            {{ $invoice->Patient->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ number_format($invoice->price, 2) }}</td>
                                                    <td>{{ number_format($invoice->discount_value, 2) }}</td>
                                                    <td>{{ $invoice->tax_rate }}%</td>
                                                    <td>{{ number_format($invoice->tax_value, 2) }}</td>
                                                    <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                                    <td>
                                                        @if ($invoice->invoice_status == 1)
                                                            <span class="badge badge-danger">تحت الإجراء</span>
                                                        @elseif ($invoice->invoice_status == 2)
                                                            <span class="badge badge-warning">مراجعة</span>
                                                        @else
                                                            <span class="badge badge-success">مكتملة</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                                data-toggle="dropdown">
                                                                العمليات
                                                            </button>

                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                                    data-target="#add_diagnosis{{ $invoice->id }}">
                                                                    <i class="las la-stethoscope text-primary mr-2"></i>
                                                                    إضافة تشخيص
                                                                </a>

                                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                                    data-target="#add_review{{ $invoice->id }}">
                                                                    <i class="las la-notes-medical text-info mr-2"></i>
                                                                    إضافة مراجعة
                                                                </a>

                                                                <a class="dropdown-item" href="#"data-toggle="modal"
                                                                    data-target="#xray_conversion{{ $invoice->id }}">
                                                                    <i class="las la-x-ray text-warning mr-2"></i>
                                                                    تحويل للأشعة
                                                                </a>

                                                                <a class="dropdown-item" href="#"data-toggle="modal"
                                                                    data-target="#laboratorie_conversion{{ $invoice->id }}">
                                                                    <i class="las la-flask text-success mr-2"></i>
                                                                    تحويل للمختبر
                                                                </a>

                                                                <div class="dropdown-divider"></div>

                                                                <a class="dropdown-item text-danger" href="#">
                                                                    <i class="las la-trash mr-2"></i>
                                                                    حذف
                                                                </a>
                                                            </div>

                                                        </div>

                                                        @include('dashboard.doctors.invoices.add_diagnosis')
                                                        @include('dashboard.doctors.invoices.add_review')
                                                        @include('dashboard.doctors.invoices.xray_conversion')
                                                        @include('dashboard.doctors.invoices.laboratorie_conversion')

                                                    </td>

                                                    {{-- <td>

                                                        <a class="modal-effect btn btn-info btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#show{{ $receipt->id }}"><i class="las la-eye"></i></a>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $receipt->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $receipt->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        <a class="btn btn-warning btn-sm" data-toggle="modal"
                                                            href="#print{{ $receipt->id }}">
                                                            <i class="bi bi-printer-fill"></i>
                                                        </a> --}}


                                                    {{-- <a href="{{route('receipts_print',$receipt->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه سند قبض"><i class="fas fa-print"></i></a> --}}


                                                    {{-- @include('dashboard.admin.receipts.show')
                                                        @include('dashboard.admin.receipts.edit')
                                                        @include('dashboard.admin.receipts.delete')
                                                        @include('dashboard.admin.receipts.print') --}}


                                                    {{-- </td> --}}
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد كشف
                                                        مضافه بعد</h2>
                                                    {{-- <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول كشف باستخدام الزر أدناه.</p> --}}
                                                    {{-- <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة كشف جديد
                                                    </button> --}}
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $invoices->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end receipt -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        {{-- @include('dashboard.admin.receipts.add') --}}
    </main>
@endsection
