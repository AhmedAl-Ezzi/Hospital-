@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <br>
                    <h2 class="mb-2 page-title">موظفين المختبر</h2>
                    <br>

                    <div class="row my-4">
                        <div class="col-md-12">

                            <div class="card shadow">
                                <div class="card-body">

                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                        data-target="#add">
                                        + إضافة موظفين المختبر جديد
                                    </button>

                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم </th>
                                                <th>الايميل </th>
                                                <th>تاريخ الاضافة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1; @endphp

                                            @forelse ($laboratorie_employees as $laboatorie_employee)
                                                <tr>

                                                    <td>{{ $i++ }}</td>


                                                    <td>{{ $laboatorie_employee->name }}</td>
                                                    <td>{{ $laboatorie_employee->email }}</td>

                                                    <td>{{ $laboatorie_employee->created_at->diffForHumans() }}</td>

                                                    <td>

                                                        <a class="modal-effect btn btn-sm btn btn-primary"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#edit{{ $laboatorie_employee->id }}"><i
                                                                class="las la-pen"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $laboatorie_employee->id }}"><i
                                                                class="bi bi-trash3-fill"></i></a>

                                                    </td>

                                                </tr>

                                                {{-- موديالات --}}
                                                @include('dashboard.admin.laboratorie_employees.edit')
                                                @include('dashboard.admin.laboratorie_employees.delete')

                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد موظفين
                                                        مختبر
                                                        مضافين بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                                                        بإضافة أول موظف المختبر باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة موظفين المختبر جديد
                                                    </button>
                                                </div>
                                            @endforelse

                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $laboratorie_employees->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- موديال  --}}
        @include('dashboard.admin.laboratorie_employees.add')

    </main>
@endsection
