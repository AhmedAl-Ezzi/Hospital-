<!-- Modal -->
<div class="modal fade" id="show{{ $ambulance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">عرض سيارة الاسعاف</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <label for="exampleInputPassword1"> رقم السيارة </label>
                <input type="text" class="form-control" value="{{ $ambulance->car_number }}" readonly>

                <label for="exampleInputPassword1">موديل السيارة</label>
                <input type="text" class="form-control" value="{{ $ambulance->car_model }}" readonly>

                <label for="exampleInputPassword1">سنة الصنع</label>
                <input type="number" class="form-control" value="{{ $ambulance->car_year_made }}" readonly>

                <label for="exampleInputPassword1">اسم السائق</label>
                <input type="text" class="form-control" value="{{ $ambulance->driver_name }}" readonly>

                <label>نوع السيارة</label>
                <select class="form-control" name="car_type" readonly>
                    <option value="1" {{ $ambulance->car_type == 1 ? 'selected' : '' }} readonly>مملوكة</option>
                    <option value="2" {{ $ambulance->car_type == 2 ? 'selected' : '' }} readonly>ايجار</option>
                </select>

                <label for="exampleInputPassword1">رقم رخصة القيادة</label>
                <input type="number" class="form-control" value="{{ $ambulance->driver_license_number }}" readonly>

                <label for="exampleInputPassword1">رقم الهاتف</label>
                <input type="number" class="form-control" value="{{ $ambulance->driver_phone }}" readonly>

                <label for="exampleInputPassword1"> ملاحظات </label>
                <textarea class="form-control" rows="6" readonly>{{ $ambulance->notes }}</textarea>

            </div>

            {{-- <div class="mb-3 text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div> --}}

        </div>
    </div>
</div>
