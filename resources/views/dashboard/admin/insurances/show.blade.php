<!-- Modal -->
<div class="modal fade" id="show{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">عرض  شركة تأمين</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <label for="exampleInputPassword1"> كود شركة تأمين</label>
                <input type="text" class="form-control" value="{{ $insurance->insurance_code }}" readonly>

                <label>اسم  شركة تأمين</label>
                <input type="text" class="form-control" value="{{ $insurance->name }}" readonly>

                <label for="exampleInputPassword1"> كود شركة تأمين</label>
                <input type="number" class="form-control" value="{{ $insurance->discount_percentage }}" readonly>

                    <label for="exampleInputPassword1">نسبة تحمل شركة التأمين</label>
                <input type="number" class="form-control" value="{{ $insurance->Company_rate }}" readonly>


                <label class="mt-3">وصف  شركة تأمين</label>
                <textarea class="form-control" rows="6" readonly >{{ $insurance->notes }}</textarea>

            </div>

            {{-- <div class="mb-3 text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div> --}}

        </div>
    </div>
</div>
