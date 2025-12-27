<!-- Modal -->
<div class="modal fade" id="show{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">عرض الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <label>اسم الخدمة</label>
                <input type="text" class="form-control" value="{{ $service->name }}" readonly>

                <label>سعر الخدمة</label>
                <input type="text" class="form-control" value="{{ $service->price }}" readonly>

                <label class="mt-3">وصف الخدمة</label>
                <textarea class="form-control" rows="6" readonly >{{ $service->description }}</textarea>

            </div>

            {{-- <div class="mb-3 text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div> --}}

        </div>
    </div>
</div>
