<!-- Modal -->
<div class="modal fade" id="add_diagnosis{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة تشخيص
                    <span>{{ $invoice->Patient->name }}</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('invoices_ray_employees.update',$invoice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    {{-- <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    <input type="hidden" name="patient_id" value="{{ $invoice->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $invoice->doctor_id }}"> --}}

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">التشخيص</label>
                        <textarea class="form-control" name="description_employee" rows="6"></textarea>
                    </div>




                  {{-- <div class="card-header">
                      <strong>Dropzone</strong>
                    </div>
                    <div class="card-body">
                      <form action="/file-upload" class="dropzone bg-light rounded-lg" id="tinydash-dropzone">
                        <div class="dz-message needsclick">
                          <div class="circle circle-lg bg-primary">
                            <i class="fe fe-upload fe-24 text-white"></i>
                          </div>
                          <h5 class="text-muted mt-4">Drop files here or click to upload</h5>
                        </div>
                      </form>
                      <!-- Preview -->
                      <!-- <div class="dropzone-previews mt-3" id="file-previews"></div> -->
                      <!-- file preview template -->
                      <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                          <div class="p-2">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                              </div>
                              <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                <p class="mb-0" data-dz-size></p>
                              </div>
                              <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                  <i class="dripicons-cross"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> <!-- .card-body -->
 --}}




                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">المرفقات</label>
                        <input type="file" name="photos[]" accept="image/*" multiple>
                    </div>

                </div>
                <div class="mb-3 text-center ">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
