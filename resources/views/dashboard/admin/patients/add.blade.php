<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مريض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patients.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <label for="exampleInputPassword1">اسم المريض</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror " required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="exampleInputPassword1">تاريخ الميلاد</label>
                    <input class="form-control fc-datepicker" name="Date_Birth" placeholder="YYYY-MM-DD" type="date"
                        required>
                    @error('Date_Birth')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="exampleInputPassword1">رقم الهاتف</label>
                    <input type="number" name="Phone" value="{{ old('Phone') }}"
                        class="form-control @error('Phone') is-invalid @enderror" required>
                    @error('Phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="exampleInputPassword1">الجنس</label>
                    <select class="form-control" name="Gender" required>
                        <option value="" selected>-- اختار من القائمة --</option>
                        <option value="1">ذكر</option>
                        <option value="2">انثي</option>
                    </select>
                    @error('Gender')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="exampleInputPassword1">فصلية الدم</label>
                    <select class="form-control" name="Blood_Group" required>
                        <option value="" selected>-- اختار من القائمة --</option>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    @error('Blood_Group')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <label for="exampleInputPassword1">العنوان</label>
                    <textarea rows="5" cols="10" class="form-control" name="Address"></textarea>
                    @error('Address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
