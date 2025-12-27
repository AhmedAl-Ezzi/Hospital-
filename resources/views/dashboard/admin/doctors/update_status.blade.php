<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    تعديل حالة الدكتور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_status') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--اختار من القائمة--</option>
                            <option value="1" style="color: green">مفعل</option>
                            <option value="0" style="color: red">غير مفعل</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">إغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
