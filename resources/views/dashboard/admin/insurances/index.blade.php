@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">شركات التأمين</h2>
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
                                            + إضافة شركة تأمين جديد
                                        </button>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>كود الشركة </th>
                                                <th>اسم الشركة</th>
                                                <th>نسبة خصم المريض </th>
                                                <th>نسبة تحمل شركة التأمين </th>
                                                <th>الحالة</th>
                                                <th>ملاحظات</th>
                                                <th>العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($insurances as $insurance)
                                                <tr>

                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>

                                                    <td>{{ $insurance->insurance_code }}</td>
                                                    <td>{{ $insurance->name }}</td>
                                                    <td>{{ $insurance->discount_percentage }}</td>
                                                    <td>{{ $insurance->Company_rate }}</td>
                                                    {{-- <td class="{{$insurance->status == 1 ? 'bg-success':'bg-danger'}}">{{$insurance->status == 1 ? 'مفعل' : 'غير مفعل'}}</td> --}}
                                                    <td>

                                                        @if ($insurance->status == 1)
                                                            <span class="badge badge-success" style="font-size: 14px;">
                                                                مفعل
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger" style="font-size: 14px;">
                                                                غير مفعل
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>{{ $insurance->notes }}</td>
                                                    <td>

                                                        <a class="modal-effect btn btn-info btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#show{{ $insurance->id }}"><i class="las la-eye"></i></a>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $insurance->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $insurance->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        @include('dashboard.admin.insurances.show')
                                                        @include('dashboard.admin.insurances.edit')
                                                        @include('dashboard.admin.insurances.delete')
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد شركة
                                                        تأمين
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول شركة تأمين باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة شركة تأمين جديد
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $insurances->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end insurance -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('dashboard.admin.insurances.add')
    </main>
@endsection
