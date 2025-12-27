@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">الحسابات
                        <span>سند قبض</span>
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
                                            + إضافة سند قبض جديد
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
                                            @forelse ($receipts as $receipt)
                                                <tr>

                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $receipt->patients->name }}</td>
                                                    <td>{{ number_format($receipt->amount, 2) }}</td>
                                                    <td>{{ \Str::limit($receipt->description, 50) }}</td>
                                                    <td>{{ $receipt->created_at->diffForHumans() }}</td>
                                                    <td>

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
                                                        </a>


                                                        {{-- <a href="{{route('receipts_print',$receipt->id)}}" class="btn btn-primary btn-sm" target="_blank" title="طباعه سند قبض"><i class="fas fa-print"></i></a> --}}


                                                        @include('dashboard.admin.receipts.show')
                                                        @include('dashboard.admin.receipts.edit')
                                                        @include('dashboard.admin.receipts.delete')
                                                        @include('dashboard.admin.receipts.print')


                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد سند قبض
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول سند قبض باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة سند قبض جديد
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $receipts->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end receipt -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('dashboard.admin.receipts.add')
    </main>
@endsection



<script>
    function printReceipt(id) {
        let printContents = document.getElementById(id).innerHTML;
        let originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
