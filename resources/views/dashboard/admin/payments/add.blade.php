<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة سند صرف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('payments.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <label for="exampleInputPassword1">اسم المريض</label>
                    <select name="patient_id" class="form-control select2" required>
                        <option value="">اختر اسم المريض --- </option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <label for="exampleInputPassword1"> المبلغ</label>
                    <input type="number" name="credit" value="{{ old('credit') }}"
                        class="form-control @error('credit') is-invalid @enderror" required>
                    @error('credit')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <label for="exampleInputPassword1">البيان</label>
                    <textarea rows="5" cols="10" class="form-control" name="description"></textarea>
                    @error('description')
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
