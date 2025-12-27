<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sections.store') }}" method="post">
                 @csrf
                <div class="modal-body">

                    <label for="exampleInputPassword1"> اسم القسم</label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم القسم" required>

                     <label for="exampleInputPassword1"> وصف القسم</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="ادخل وصف القسم" ></textarea>
                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
