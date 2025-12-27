<!-- Modal -->
<div class="modal fade" id="laboratories_images{{ $laboratorie->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <!-- CSS داخل المودال -->
            <style>
                .ray-image-card {
                    border-radius: 12px;
                    overflow: hidden;
                    background: #fff;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    transition: all 0.3s ease-in-out;
                }

                .ray-image-card img {
                    width: 100%;
                    height: 220px;
                    object-fit: cover;
                    transition: transform 0.3s ease-in-out;
                }

                .ray-image-card:hover {
                    transform: translateY(-6px);
                }

                .ray-image-card:hover img {
                    transform: scale(1.1);
                }

                .ray-title {
                    font-weight: bold;
                    text-align: center;
                    margin-bottom: 15px;
                }
            </style>

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">
                    عرض صور المختبر
                    <span class="text-primary">
                        - {{ $laboratorie->Patient->name }}
                    </span>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">

                {{-- ملاحظات دكتور المختبر --}}
                {{-- <div class="form-group mb-4">
                    <label class="font-weight-bold">ملاحظات دكتور المختبر</label>
                    <textarea readonly class="form-control" rows="3">
            {{ $laboratorie->description_employee ?? 'لا توجد ملاحظات' }}
                    </textarea>
                </div> --}}

                {{-- صور المختبر --}}
                <h6 class="ray-title">صور المختبر</h6>

                <div class="row">

                    @forelse($laboratorie->images as $image)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="ray-image-card">
                                <a href="{{ asset('dashboard/assets/img/laboratories/' . $image->filename) }}" target="_blank">
                                    <img src="{{ asset('dashboard/assets/img/laboratories/' . $image->filename) }}"
                                        alt="صورة أشعة">
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted">
                            لا توجد صور مختبر
                        </div>
                    @endforelse

                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    إغلاق
                </button>
            </div>

        </div>
    </div>
</div>
