<!-- Modal -->
<div class="modal fade" id="edit{{ $receipt->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">تعديل سند القبض</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="{{ route('receipts.update', 'test') }}" method="post">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $receipt->id }}">

                    <label>اسم المريض</label>
                    <select name="patient_id" class="form-control select2" required>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ $receipt->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>

                    <label class="mt-2">المبلغ</label>
                    <input type="number" name="Debit" value="{{ $receipt->amount }}" class="form-control" required>

                    <label class="mt-2">البيان</label>
                    <textarea name="description" rows="4" class="form-control">{{ $receipt->description }}</textarea>

                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>

            </form>
        </div>
    </div>
</div>
