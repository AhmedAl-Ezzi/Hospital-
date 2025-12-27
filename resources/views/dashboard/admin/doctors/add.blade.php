<!-- Add Doctor Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"> <!-- جعل المودال أكبر -->
        <div class="modal-content" style="border-radius: 12px; padding: 20px;">

            <div class="modal-header">
                <h4 class="modal-title">إضافة طبيب جديد</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="row">

                        {{-- اسم الطبيب --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الطبيب</label>
                                <input type="text" name="name" class="form-control" autofocus  required>
                            </div>
                        </div>

                        {{-- البريد --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        {{-- كلمة المرور --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        {{-- الهاتف --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                        </div>

                        {{-- القسم --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>القسم</label>
                                <select name="section_id" class="form-control" required>
                                    <option disabled selected>-- اختر القسم --</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                       {{-- المواعيد --}}
<div class="col-md-12 mt-3">
    <label class="font-weight-bold mb-2">المواعيد المتاحة</label>

    <div class="row pl-3">
        @foreach ($appointments as $appointment)
            <div class="col-md-3 mb-2">
                <label class="d-flex align-items-center checkbox-label">
                    <input type="checkbox" name="appointments[]" value="{{ $appointment->id }}"
                        class="mr-2 checkbox-input">
                    {{ $appointment->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>



                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>صورة الطبيب</label>
                                <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                <img style="border-radius:50%" width="150px" height="150px" id="output" />
                            </div>
                        </div>


                    </div><!-- ./row -->

                </div>

                <div class=" mb-3 text-center">
                    <button class="btn btn-primary" type="submit">حفظ</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">إغلاق</button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
