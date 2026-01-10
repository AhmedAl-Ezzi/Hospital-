<!-- Edit Doctor Modal -->
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 12px; padding: 20px;">

            <div class="modal-header">
                <h4 class="modal-title">تعديل بيانات الطبيب</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $doctor->id }}">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="row">

                        {{-- اسم الطبيب --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الطبيب</label>
                                <input type="text" name="name" value="{{ $doctor->name }}" class="form-control"
                                    required>
                            </div>
                        </div>

                        {{-- البريد --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" name="email" value="{{ $doctor->email }}" class="form-control"
                                    required>
                            </div>
                        </div>

                        {{-- رقم الهاتف --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="tel" name="phone" value="{{ $doctor->phone }}" class="form-control"
                                    required>
                            </div>
                        </div>

                        {{-- القسم --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القسم</label>
                                <select name="section_id" class="form-control" required>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"
                                            {{ $doctor->section_id == $section->id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>عدد الكشوفات اليومية</label>

                                <input  name="number_of_statements" value="{{ $doctor->number_of_statements }}" type="text" class="form-control"
                                    value="{{ $doctor->number_of_statements }}" type="text">

                            </div>
                        </div>


                        {{-- <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">عدد الكشوفات اليومية</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="number_of_statements"
                                    value="{{ $doctor->number_of_statements }}" type="text">
                            </div>
                        </div> --}}



                        {{-- المواعيد --}}
                        <div class="col-md-12 mt-3">
                            <label class="font-weight-bold">المواعيد المتاحة</label>

                            @php
                                $selectedAppointments = $doctor->doctorappointments->pluck('id')->toArray();
                            @endphp

                            <div class="row mt-2">

                                @foreach ($appointments as $appointment)
                                    <div class="col-md-3 mb-2">
                                        <label class="d-flex align-items-center">

                                            <input type="checkbox" name="appointments[]" value="{{ $appointment->id }}"
                                                class="mr-2"
                                                {{ in_array($appointment->id, $selectedAppointments) ? 'checked' : '' }}>

                                            {{ $appointment->name }}

                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        {{-- الصورة --}}
                        <div class="col-md-6 mb-3">
                            <label>صورة الطبيب</label>
                            <input type="file" name="photo" class="form-control-file">
                            <img src="{{ $doctor->image
                                ? asset('dashboard/assets/img/doctors/' . $doctor->image->filename)
                                : asset('dashboard/assets/img/default-avatar.jpg') }}"
                                height="80" class="mt-2 rounded">
                        </div>

                        {{-- الحالة --}}
                        {{-- <div class="col-md-12 mt-3">
                            <label>الحالة</label>
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" name="status" class="custom-control-input"
                                    id="switch{{ $doctor->id }}" {{ $doctor->status == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="switch{{ $doctor->id }}">
                                    {{ $doctor->status == 1 ? 'مفعل' : 'غير مفعل' }}
                                </label>
                            </div>
                        </div> --}}

                    </div><!-- ./row -->
                </div>

                <div class="mt-3 text-center">
                    <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">إغلاق</button>
                </div>

            </form>

        </div>
    </div>
</div>
