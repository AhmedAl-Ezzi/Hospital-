<!-- Modal -->
<div class="modal fade" id="delete{{ $ray->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف تفاصيل اشعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rays.destroy', $ray->id) }}" method="post">
                @method('DELETE')
                @csrf
                <div class="row">
                    <div class="col">
                        <p class="h5 text-danger"> هل انت متاكد من حذف بيانات الاشعة ؟ </p>
                        <input type="text" class="form-control" readonly value="{{ $ray->description }}">
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
