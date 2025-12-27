<!-- Modal -->
<div class="modal fade" id="update_password{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                   تغير كمة المرور {{$doctor->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_password') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
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
