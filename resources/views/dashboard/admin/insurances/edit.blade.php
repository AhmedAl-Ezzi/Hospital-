<!-- Modal -->
<div class="modal fade" id="edit{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل شركة تأمين</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insurances.update', 'test') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $insurance->id }}">

                    {{-- <label for="exampleInputPassword1"> كود  شركة تأمين</label>
                    <input type="text" name="insurance_code" value="{{$insurances->insurance_code}}"
                                       class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}


                    <label for="exampleInputPassword1"> كود شركة تأمين</label>
                    <input type="text" name="insurance_code" class="form-control"
                        value="{{ $insurance->insurance_code }}">



                    <label for="exampleInputPassword1"> اسم شركة تأمين</label>
                    <input type="text" name="name" class="form-control" value="{{ $insurance->name }}">


                    <label for="exampleInputPassword1"> نسبة خصم المريض </label>
                    <input type="number" name="discount_percentage" class="form-control"
                        value="{{ $insurance->discount_percentage }}">


                    <label for="exampleInputPassword1">نسبة تحمل شركة التأمين</label>
                    <input type="number" name="Company_rate" class="form-control"
                        value="{{ $insurance->Company_rate }}">



                    <label for="exampleInputPassword1"> وصف شركة تأمين</label>
                    <textarea name="notes" id="" cols="30" rows="10" class="form-control">{{ $insurance->notes }}</textarea>


                    {{-- <div class="row"> --}}
                    <div class="col">
                        <label>الحالة </label>
                        &nbsp;
                        <input name="status" {{ $insurance->status == 1 ? 'checked' : '' }} value="1"
                            type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div>
                    {{-- </div> --}}


                    {{-- <div class="form-group">
                        <label for="status">الحالة</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--اختار من القائمة--</option>
                            <option value="1" style="color: green">مفعل</option>
                            <option value="0" style="color: red">غير مفعل</option>
                        </select>
                    </div> --}}

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
