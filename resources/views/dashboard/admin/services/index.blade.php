@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">الخدمات</h2>
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
                                            + إضافة خدمة جديد
                                        </button>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الخدمة</th>
                                                <th>وصف الخدمة</th>
                                                <th>السعر</th>
                                                <th>تاريخ الاضافة</th>
                                                <th>الحالة</th>
                                                <th>العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($services as $service)
                                                <tr>

                                                    <?php $i++; ?>
                                                    {{-- <td>{{ $i }}</td> --}}
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>{{ \Str::limit($service->description, 50) }}</td>
                                                    <td>{{ $service->price }}</td>
                                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                                      <td>
                                                        @if ($service->status == 1)
                                                            <span class="badge badge-success" style="font-size: 14px;">
                                                                مفعل
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger" style="font-size: 14px;">
                                                                غير مفعل
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>

                                                        <a class="modal-effect btn btn-info btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#show{{ $service->id }}"><i class="las la-eye"></i></a>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $service->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $service->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        @include('dashboard.admin.services.show')
                                                        @include('dashboard.admin.services.edit')
                                                        @include('dashboard.admin.services.delete')
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد خدمات
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول خدمة باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة خدمة جديد
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $services->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end service -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('dashboard.admin.services.add')
    </main>
@endsection
