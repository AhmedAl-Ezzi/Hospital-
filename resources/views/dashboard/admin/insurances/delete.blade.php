<!-- Modal -->
<div class="modal fade" id="delete{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف  شركة تأمين</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insurances.destroy','test') }}" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $insurance->id }}">
                    <h5>هل انت متأكد من الحذف؟</h5>
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
