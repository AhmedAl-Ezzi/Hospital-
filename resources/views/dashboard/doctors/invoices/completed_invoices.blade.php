@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">الـكـشوفات/
                        <span style="font-size: 26px">المكتملة </span>
                    </h2>
                    <br>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">


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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->invoice_date }}</td>
                                                    <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                                    <td><a
                                                         href="{{ route('diagnostics.show', $invoice->patient_id) }}">
                                                            {{ $invoice->Patient->name }}
                                                        </a>
                                                         {{-- href="{{ route('patient_details', $invoice->patient_id) }}">{{ $invoice->Patient->name }}</a> --}}
                                                    </td>
                                                    <td>{{ number_format($invoice->price, 2) }}</td>
                                                    <td>{{ number_format($invoice->discount_value, 2) }}</td>
                                                    <td>{{ $invoice->tax_rate }}%</td>
                                                    <td>{{ number_format($invoice->tax_value, 2) }}</td>
                                                    <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                                    <td>
                                                        @if ($invoice->invoice_status == 1)
                                                            <span class="badge badge-danger">تحت الاجراء</span>
                                                        @elseif($invoice->invoice_status == 2)
                                                            <span class="badge badge-warning">مراجعة</span>
                                                        @else
                                                            <span class="badge badge-success">مكتملة</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد كشف
                                                        مضافه بعد</h2>

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

    </main>
@endsection
