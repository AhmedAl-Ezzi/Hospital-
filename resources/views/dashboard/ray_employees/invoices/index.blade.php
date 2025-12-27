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

                                        <br>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>تاريخ الفاتورة</th>
                                                <th>اسم المريض</th>
                                                <th>اسم الدكتور</th>
                                                <th>المطلوب</th>
                                                <th>حالة الفاتورة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d   h:i A') }}</td>
                                                    <td>{{ $invoice->Patient->name }}</td>
                                                    <td>{{ $invoice->doctor->name }}</td>
                                                    <td>{{ $invoice->description }}</td>
                                                    <td>
                                                        @if ($invoice->case == 0)
                                                            <span class="badge badge-danger" style="font-size: 12px">تحت
                                                                الاجراء</span>
                                                        @else
                                                            <span class="badge badge-success"
                                                                style="font-size: 12px">مكتملة</span>
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


                                                            </div>

                                                        </div>

                                                        @include('dashboard.ray_employees.invoices.add_diagnosis')


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
