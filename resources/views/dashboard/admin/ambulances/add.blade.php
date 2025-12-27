<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة سيارة الاسعاف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ambulances.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <label for="exampleInputPassword1"> رقم السيارة </label>
                    <input type="text" name="car_number" value="{{ old('car_number') }}"
                        class="form-control @error('car_number') is-invalid @enderror" placeholder="ادخل رقم السيارة"
                        required>

                    <label for="exampleInputPassword1">موديل السيارة</label>
                    <input type="text" name="car_model" value="{{ old('car_model') }}"
                        class="form-control @error('car_model') is-invalid @enderror" placeholder="ادخل  موديل السيارة "
                        required>

                    <label for="exampleInputPassword1">سنة الصنع</label>
                    <input type="number" name="car_year_made" value="{{ old('car_year_made') }}"
                        class="form-control @error('car_year_made') is-invalid @enderror"
                        placeholder="ادخل  سنة الصنع  " required>


                    <label for="exampleInputPassword1">نوع السيارة</label>
                    <select class="form-control" name="car_type">
                        <option value="1">مملوكة</option>
                        <option value="2">ايجار</option>
                    </select>

                    <label for="exampleInputPassword1">اسم السائق</label>
                    <input type="text" name="driver_name" value="{{ old('driver_name') }}"
                        class="form-control @error('driver_name') is-invalid @enderror" placeholder="ادخل  اسم السائق  "
                        required>


                    <label for="exampleInputPassword1">رقم رخصة القيادة</label>
                    <input type="number" name="driver_license_number" value="{{ old('driver_license_number') }}"
                        class="form-control @error('driver_license_number') is-invalid @enderror"
                        placeholder="ادخل  رقم الرخصة  " required>


                    <label for="exampleInputPassword1">رقم الهاتف</label>
                    <input type="number" name="driver_phone" value="{{ old('driver_phone') }}"
                        class="form-control @error('driver_phone') is-invalid @enderror"
                        placeholder="ادخل  رقم الهاتف  " required>


                    <label for="exampleInputPassword1"> ملاحظات </label>
                    <textarea name="notes" id="" cols="30" rows="10" class="form-control"
                        placeholder="ادخل الملاحظات "></textarea>

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
