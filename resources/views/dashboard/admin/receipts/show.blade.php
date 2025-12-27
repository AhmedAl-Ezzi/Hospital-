<!-- Modal -->
<div class="modal fade" id="show{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">عرض السند </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <label for="exampleInputPassword1">اسم المريض</label>
                <input type="text" class="form-control" value="{{ $receipt->patients->name }}" readonly>


                <label for="exampleInputPassword1">المبلغ </label>
                <input type="number" class="form-control" value="{{ $receipt->amount }}" readonly>

                <label for="exampleInputPassword1"> البيان </label>
                <textarea class="form-control" rows="6" readonly>{{ $receipt->description }}</textarea>

            </div>

            {{-- <div class="mb-3 text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div> --}}

        </div>
    </div>
</div>
