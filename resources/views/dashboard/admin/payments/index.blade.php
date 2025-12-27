@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">الحسابات
                        <span>سند صرف</span>

                    </h2>
                    <br>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">

                                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                            data-target="#add">
                                            + إضافة سند صرف جديد
                                        </button>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المريض</th>
                                                <th>المبلغ</th>
                                                <th>البيان</th>
                                                <th>تاريخ الاضافة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($payments as $payment)
                                                <tr>

                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $payment->patients->name }}</td>
                                                    <td>{{ number_format($payment->amount, 2) }}</td>
                                                    <td>{{ \Str::limit($payment->description, 50) }}</td>
                                                    <td>{{ $payment->created_at->diffForHumans() }}</td>
                                                    <td>

                                                        <a class="modal-effect btn btn-info btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#show{{ $payment->id }}"><i class="las la-eye"></i></a>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $payment->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $payment->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        <a class="btn btn-warning btn-sm" data-toggle="modal"
                                                            href="#print{{ $payment->id }}">
                                                            <i class="bi bi-printer-fill"></i>
                                                        </a>


                                                        @include('dashboard.admin.payments.show')
                                                        @include('dashboard.admin.payments.edit')
                                                        @include('dashboard.admin.payments.delete')
                                                        @include('dashboard.admin.payments.print')


                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد سند صرف
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول سند صرف باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة سند صرف جديد
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $payments->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end payment -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('dashboard.admin.payments.add')
    </main>
@endsection



<script>
    function printPayment(id) {
        let printContents = document.getElementById(id).innerHTML;
        let originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
