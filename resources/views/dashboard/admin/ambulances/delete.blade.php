<!-- Modal -->
<div class="modal fade" id="delete{{ $ambulance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ambulances.destroy', 'test') }}" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $ambulance->id }}">
                    <h5>هل انت متأكد من الحذف؟</h5>
                    <input type="text" class="form-control" readonly value="{{ $ambulance->car_number }}">

                    @method('delete')
                    @csrf
                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-danger">حذف</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
