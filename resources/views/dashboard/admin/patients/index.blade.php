@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">المرضى</h2>
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
                                            + إضافة مريض جديد
                                        </button>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المريض</th>
                                                <th>البريد الالكتروني</th>
                                                <th>تاريخ الميلاد</th>
                                                <th>رقم الهاتف</th>
                                                <th>الجنس</th>
                                                <th>فصلية الدم</th>
                                                <th>العنوان</th>
                                                <th>العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($patients as $patient)
                                                <tr>

                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>

                                                    <td><a href="{{ route('show_patients',$patient->id) }}"> {{ $patient->name }}</a></td>
                                                    <td>{{ $patient->email }}</td>
                                                    <td>{{ $patient->Date_Birth }}</td>
                                                    <td>{{ $patient->Phone }}</td>
                                                    <td>{{ $patient->Gender == 1 ? 'ذكر' : 'انثي' }}</td>
                                                    <td>{{ $patient->Blood_Group }}</td>
                                                    <td>{{ $patient->Address }}</td>
                                                    <td>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $patient->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $patient->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        @include('dashboard.admin.patients.edit')
                                                        @include('dashboard.admin.patients.delete')
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد مرضى
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول مريض باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة مريض جديد
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $patients->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end patient -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('dashboard.admin.patients.add')
    </main>
@endsection
