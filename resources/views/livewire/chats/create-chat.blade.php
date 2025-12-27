<div>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <br>
                    <h2 class="mb-2 page-title">المحادثات
                    </h2>
                    <br>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">


                                        <thead>
                                            <tr>
                                                <th class="col-md-6">#</th>
                                                <th class="col-md-6">اسم الدكتور</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @forelse ($users as $user)
                                                <tr>

                                                    <?php $i++; ?>


                                                    <td>{{ $i }}</td>
                                                    <td><button wire:click="createConversation('{{ $user->email }}')" class="btn mb-2 btn-outline-primary">
                                                            {{ $user->name }}</button></td>

                                                </tr>
                                            @empty
                                                <div class="empty-state d-flex flex-column align-items-center mb-3">
                                                    <div class="empty-state-icon display-1 text-secondary mb-2">
                                                        <i class="la la-newspaper"></i>
                                                    </div>
                                                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد
                                                        فواتير
                                                        مضافه بعد</h2>
                                                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك
                                                        البدء
                                                        بإضافة أول فاتورة باستخدام الزر أدناه.</p>
                                                    <button type="button" class="btn btn-primary mb-4"
                                                        wire:click="show_form_add" data-toggle="modal"
                                                        data-target="#add">
                                                        + إضافة فاتورة جديدة
                                                    </button>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{-- <div class="d-flex justify-content-center mt-4">
                                        {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div> --}}

                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end receipt -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>

</div>
