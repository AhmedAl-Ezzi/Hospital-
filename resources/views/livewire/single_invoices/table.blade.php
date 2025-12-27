<h2 class="mb-2 page-title"> الفواتير
    <span style="font-size: 20px">خدمة مفردة</span>
</h2>
<br>
<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">اضافة فاتورة جديدة
</button><br><br>
<div class="table-responsive">
    <table class="table datatables" id="dataTable-1">

        <thead>
            <tr>
                <th>#</th>
                <th>اسم الخدمة</th>
                <th>اسم المريض</th>
                <th>تاريخ الفاتورة</th>
                <th>اسم الدكتور</th>
                <th>القسم</th>
                <th>سعر الخدمة</th>
                <th>قيمة الخصم</th>
                <th>نسبة الضريبة</th>
                <th>قيمة الضريبة</th>
                <th>الاجمالي مع الضريبة</th>
                <th>نوع الفاتورة</th>
                <th>العمليات</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @forelse ($single_invoices as $single_invoice)
                <tr>

                    <?php $i++; ?>
                    <td>{{ $i }}</td>

                    <td>{{ $single_invoice->Service->name }}</td>
                    <td>{{ $single_invoice->Patient->name }}</td>
                    <td>{{ $single_invoice->invoice_date }}</td>
                    <td>{{ $single_invoice->Doctor->name }}</td>
                    <td>{{ $single_invoice->Section->name }}</td>
                    <td>{{ number_format($single_invoice->price, 2) }}</td>
                    <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                    <td>{{ $single_invoice->tax_rate }}%</td>
                    <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                    <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                    <td>{{ $single_invoice->type == 1 ? 'نقدي' : 'اجل' }}</td>
                    <td>

                        <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i
                                class="las la-pen"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete_invoice" wire:click="delete({{ $single_invoice->id }})"><i
                                class="bi bi-trash3-fill"></i></button>

                        <button wire:click="print({{ $single_invoice->id }})" class="btn btn-warning btn-sm"><i
                                class="bi bi-printer-fill"></i></button>

                    </td>
                    @include('livewire.single_invoices.delete')

                </tr>
            @empty
                <div class="empty-state d-flex flex-column align-items-center mb-3">
                    <div class="empty-state-icon display-1 text-secondary mb-2">
                        <i class="la la-newspaper"></i>
                    </div>
                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد فواتير
                        مضافه بعد</h2>
                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                        بإضافة أول فاتورة باستخدام الزر أدناه.</p>
                    <button type="button" class="btn btn-primary mb-4" wire:click="show_form_add" data-toggle="modal"
                        data-target="#add">
                        + إضافة فاتورة جديدة
                    </button>
                </div>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $single_invoices->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>

</div>
