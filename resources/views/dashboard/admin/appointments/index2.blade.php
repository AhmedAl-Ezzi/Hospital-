@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">المواعيد المؤكدة</h2>
                    <br>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المريض</th>
                                                <th>البريد الالكتروني</th>
                                                <th>القسم</th>
                                                <th>الدكتور</th>
                                                <th>تاريخ الموعد</th>
                                                <th>الهاتف</th>
                                                <th>العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($appointments as $appointment)
                                                <tr>

                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $appointment->name }}</a></td>
                                                    <td>{{ $appointment->email }}</td>
                                                    <td>{{ $appointment->section->name }}</td>
                                                    <td>{{ $appointment->doctor->name }}</td>
                                                    <td>{{ $appointment->appointment }}</td>
                                                    <td>{{ $appointment->phone }}</td>
                                                    <td>

                                                        <a class="modal-effect btn btn-success btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#approval{{ $appointment->id }}"><i
                                                                class="las la-check"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $appointment->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        @include('dashboard.admin.appointments.approval')
                                                        @include('dashboard.admin.appointments.delete')


                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد مواعيد
                                                        مضافه بعد</h2>

                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- <div class="d-flex justify-content-center mt-4">
                                        {{ $appointments->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div> --}}
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        {{-- @include('dashboard.admin.Sections.add') --}}
    </main>
@endsection
