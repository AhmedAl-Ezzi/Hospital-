<h2 class="mb-2 page-title">مجموعة الخدمات</h2>
<br>
<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">اضافة مجموعة خدمات
</button><br><br>
<div class="table-responsive">
    <table class="table datatables" id="dataTable-1">

        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>اجمالي العرض قبل الضريبة </th>
                {{-- <th>العدد </th> --}}
                <th> الخصم </th>
                <th> الضريبة </th>
                <th>اجمالي العرض شامل الضريبة</th>
                <th>الملاحظات</th>
                <th>العمليات</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @forelse ($groups as $group)
                <tr>

                    <?php $i++; ?>
                    <td>{{ $i }}</td>

                    <td>{{ $group->name }}</td>
                    <td>{{ number_format($group->total_before_discount, 2) }}</td>
                    {{-- <td>{{$group->quantity }}</td> --}}
                    <td>{{ number_format($group->discount_value, 2) }}</td>
                    <td>{{ number_format($group->tax_rate, 2) }}</td>
                    <td>{{ number_format($group->total_with_tax, 2) }}</td>
                    <td>{{ $group->notes }}</td>
                    <td>

                        <button wire:click="edit({{ $group->id }})" class="btn btn-primary btn-sm"><i
                                class="las la-pen"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteGroup{{ $group->id }}"><i class="bi bi-trash3-fill"></i></button>

                            </td>
                            @include('livewire.GroupServices.delete')
                </tr>
            @empty
                <div class="empty-state d-flex flex-column align-items-center mb-3">
                    <div class="empty-state-icon display-1 text-secondary mb-2">
                        <i class="la la-newspaper"></i>
                    </div>
                    <h2 class="title text-secondary font-weight-bold mb-3">لا يوجد مجموعة خدمات
                        مضافه بعد</h2>
                    <p class="text-muted mx-auto mb-3" style="max-width: 500px;">يمكنك البدء
                        بإضافة أول مجموعة خدمات باستخدام الزر أدناه.</p>
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                    wire:click="show_form_add" data-target="#add">
                        + إضافة مجموعة خدمات جديد
                    </button>
                </div>

            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $groups->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>

</div>
