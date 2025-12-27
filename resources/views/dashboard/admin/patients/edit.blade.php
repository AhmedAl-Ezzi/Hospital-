<!-- Modal -->
<div class="modal fade" id="edit{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المريض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patients.update', 'test') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patient->id }}">

                    <label for="exampleInputPassword1">اسم المريض</label>
                    <input type="text" name="name" value="{{ $patient->name }}"
                        class="form-control @error('name') is-invalid @enderror " required>

                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" name="email" value="{{ $patient->email }}"
                        class="form-control @error('email') is-invalid @enderror" required>

                    <label for="exampleInputPassword1">تاريخ الميلاد</label>
                    <input class="form-control fc-datepicker" value="{{ $patient->Date_Birth }}" name="Date_Birth"
                        type="date" required>

                    <label for="exampleInputPassword1">رقم الهاتف</label>
                    <input type="number" name="Phone" value="{{ $patient->Phone }}"
                        class="form-control @error('Phone') is-invalid @enderror" required>

                    <label for="exampleInputPassword1">الجنس</label>
                    <select class="form-control" name="Gender" required>
                        <option value="1" {{ $patient->Gender == 1 ? 'selected' : '' }}>ذكر</option>
                        <option value="2" {{ $patient->Gender == 2 ? 'selected' : '' }}>انثي</option>
                    </select>

                    <label for="exampleInputPassword1">فصلية الدم</label>
                    <select class="form-control" name="Blood_Group" required>
                        <option value="O-"{{ $patient->Blood_Group == 'O-' ? 'selected' : '' }}>O-</option>
                        <option value="O+" {{ $patient->Blood_Group == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="A+" {{ $patient->Blood_Group == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ $patient->Blood_Group == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ $patient->Blood_Group == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ $patient->Blood_Group == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+"{{ $patient->Blood_Group == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-"{{ $patient->Blood_Group == 'AB-' ? 'selected' : '' }}>AB-</option>
                    </select>

                    <label for="exampleInputPassword1">العنوان</label>
                    <textarea rows="5" cols="10" class="form-control" name="Address">{{ $patient->Address }}</textarea>

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
