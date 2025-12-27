<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('services.update', 'test') }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{ $service->id }}">
                <div class="modal-body">
                    <label for="exampleInputPassword1"> اسم الخدمة</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}">

                    <label for="exampleInputPassword1"> سعر الخدمة</label>
                    <input type="number" name="price" class="form-control" value="{{ $service->price }}">

                    <div class="form-group"><span></span>
                        <label for="status">الحالة</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="{{ $service->status }}" selected>
                                {{ $service->status == 1 ? 'مفعل' : 'غير مفعل' }}</option>
                            <option value="1" style="color: green">مفعل</option>
                            <option value="0" style="color: red">غير مفعل</option>
                        </select>
                    </div>


                    <label for="exampleInputPassword1"> وصف الخدمة</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $service->description }}</textarea>

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
