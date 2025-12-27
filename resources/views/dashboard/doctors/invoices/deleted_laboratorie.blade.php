<!-- Deleted insurance -->
<div class="modal fade" id="deleted_laboratorie{{$laboratorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف تفاصيل مختبر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laboratories.destroy', $laboratorie->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger"> هل انت متاكد من حذف بيانات المختبر؟ </p>
                            <input type="text" class="form-control" readonly value="{{ $laboratorie->description }}">
                        </div>
                    </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-danger">حذف</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
