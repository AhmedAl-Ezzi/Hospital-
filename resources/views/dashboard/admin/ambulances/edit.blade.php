<!-- Modal -->
<div class="modal fade" id="edit{{ $ambulance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل سيارة الاسعاف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ambulances.update', 'test') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $ambulance->id }}">

                    <label for="exampleInputPassword1"> رقم السيارة </label>
                    <input type="text" name="car_number" class="form-control" value="{{ $ambulance->car_number }}">

                    <label for="exampleInputPassword1">موديل السيارة</label>
                    <input type="text" name="car_model" class="form-control" value="{{ $ambulance->car_model }}">

                    <label for="exampleInputPassword1">سنة الصنع</label>
                    <input type="number" name="car_year_made" class="form-control"
                        value="{{ $ambulance->car_year_made }}">

                    <label>نوع السيارة</label>
                    <select class="form-control" name="car_type">
                        <option value="1" {{ $ambulance->car_type == 1 ? 'selected' : '' }}>مملوكة</option>
                        <option value="2" {{ $ambulance->car_type == 2 ? 'selected' : '' }}>ايجار</option>
                    </select>

                    <label for="exampleInputPassword1">اسم السائق</label>
                    <input type="text" name="driver_name" class="form-control" value="{{ $ambulance->driver_name }}">

                    <label for="exampleInputPassword1">رقم رخصة القيادة</label>
                    <input type="number" name="driver_license_number" class="form-control"
                        value="{{ $ambulance->driver_license_number }}">

                    <label for="exampleInputPassword1">رقم الهاتف</label>
                    <input type="number" name="driver_phone" class="form-control"
                        value="{{ $ambulance->driver_phone }}">

                    <label for="exampleInputPassword1"> ملاحظات </label>
                    <textarea name="notes" id="" cols="30" rows="10" class="form-control">{{ $ambulance->notes }}</textarea>

                    <div class="col">
                        <label>الحالة </label>
                        &nbsp;
                        <input name="is_available" {{ $ambulance->is_available == 1 ? 'checked' : '' }} value="1"
                            type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div>

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
