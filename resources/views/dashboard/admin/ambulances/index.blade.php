@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <br>
                    <h2 class="mb-2 page-title">سيارة الاسعاف</h2>
                    <br>

                    <div class="row my-4">
                        <div class="col-md-12">

                            <div class="card shadow">
                                <div class="card-body">

                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                        data-target="#add">
                                        + إضافة سيارة الاسعاف جديد
                                    </button>

                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>رقم السيارة</th>
                                                <th>موديل السيارة</th>
                                                <th>سنة الصنع</th>
                                                <th>نوع السيارة</th>
                                                <th>اسم السائق</th>
                                                <th>رقم الرخصة</th>
                                                <th>رقم الهاتف</th>
                                                <th>حالة السيارة</th>
                                                <th>تاريخ الانظمام </th>
                                                <th>ملاحظات</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1; @endphp

                                            @forelse ($ambulances as $ambulance)
                                                <tr>

                                                    <td>{{ $i++ }}</td>


                                                    <td>{{ $ambulance->car_number }}</td>
                                                    <td>{{ $ambulance->car_model }}</td>
                                                    <td>{{ $ambulance->car_year_made }}</td>
                                                    <td>{{ $ambulance->car_type == 1 ? 'مملكوكة' : 'ايجار' }}</td>
                                                    <td>{{ $ambulance->driver_name }}</td>
                                                    <td>{{ $ambulance->driver_license_number }}</td>
                                                    <td>{{ $ambulance->driver_phone }}</td>
                                                    <td>
                                                        @if ($ambulance->is_available == 1)
                                                            <span class="badge badge-success" style="font-size: 14px;">
                                                                مفعل
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger" style="font-size: 14px;">
                                                                غير مفعل
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $ambulance->created_at->diffForHumans() }}</td>
                                                    <td>{{ $ambulance->notes }}</td>

                                                    <td>

                                                        <a class="modal-effect btn btn-info btn-sm"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#show{{ $ambulance->id }}"><i class="las la-eye"></i></a>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $ambulance->id }}"><i class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $ambulance->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                        @include('dashboard.admin.ambulances.show')
                                                        @include('dashboard.admin.ambulances.edit')
                                                        @include('dashboard.admin.ambulances.delete')
                                                    </td>

                                                </tr>

                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد سيارة
                                                        اسعاف

                                                        مضافين بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول سيارة الاسعاف باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة سيارة الاسعاف جديد
                                                    </button>
                                                </div>
                                            @endforelse

                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $ambulances->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- موديال الإضافة --}}
        @include('dashboard.admin.ambulances.add')

    </main>
@endsection
