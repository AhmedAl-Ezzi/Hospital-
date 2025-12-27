<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة شركة تأمين</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insurances.store') }}" method="post">
                @csrf
                <div class="modal-body">


                            <label>كودالشركة</label>
                            <input type="text" name="insurance_code"  value="{{old('insurance_code')}}" class="form-control @error('insurance_code') is-invalid @enderror">
                            @error('insurance_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                    <label for="exampleInputPassword1"> اسم شركة تأمين</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                            <label>نسبة خصم المريض %</label>
                            <input type="number" name="discount_percentage" class="form-control @error ('discount_percentage') is-invalid @enderror">
                            @error('discount_percentage')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <label>نسبة تحمل شركة التأمين %</label>
                            <input type="number" name="company_rate" class="form-control @error ('company_rate') is-invalid @enderror">
                            @error('company_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                    <label for="exampleInputPassword1"> وصف شركة تأمين</label>
                    <textarea name="notes" id="" cols="30" rows="10" class="form-control"
                        placeholder="ادخل وصف  شركة تأمين"></textarea>
                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
