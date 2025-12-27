@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">المختبر
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
                                                <th>المطلوب</th>
                                                <th>اسم الدكتور</th>
                                                <th>اسم دكتور المختبر</th>
                                                <th>ملاحظة المختبر</th>
                                                <th>المرفقات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($laboratories as $laboratorie)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $laboratorie->description }}</td>
                                                    <td>{{ $laboratorie->doctor->name }}</td>
                                                    <td>{{ $laboratorie->employee->name }}</td>
                                                    <td>{{ $laboratorie->description_employee }}</td>
                                                    <td>
                                                        @if ($laboratorie->employee_id !== null)
                                                            <a class="dropdown-item" href="" data-toggle="modal"
                                                                data-target="#laboratories_images{{ $laboratorie->id }}"
                                                                style="color: blue">
                                                                عرض التحليل
                                                            </a>
                                                        @endif
                                                    </td>

                                                    @include('dashboard.patients.laboratories.laboratories_images')

                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد مختبر
                                                        مضافه بعد</h2>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $laboratories->appends(request()->query())->links('pagination::bootstrap-4') }}
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
