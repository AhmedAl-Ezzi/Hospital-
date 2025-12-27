<div>

    {{-- @if ($serviceSaved)
        <div class="alert alert-info">تم حفظ البيانات بنجاح.</div>
    @endif --}}

    @if ($show_table)
    @include('livewire.GroupServices.index')

    @else

    <form wire:submit.prevent="saveGroup" autocomplete="off">

        <div class="form-group">
            <label>اسم المجموعة</label>
            <input wire:model="name_group" type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label>ملاحظات</label>
            <textarea wire:model="notes" class="form-control" rows="5"></textarea>
        </div>

        <div class="card mt-4">

            <div class="card-header">
                <button class="btn btn-outline-primary" wire:click.prevent="addService">
                    اضافة خدمة فرعية
                </button>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr  style="background-color: #1b68ff">
                            <th style="color: #fff">اسم الخدمة</th>
                            <th width="200" style="color: #fff">العدد</th>
                            <th width="200" style="color: #fff">العمليات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($GroupsItems as $index => $groupItem)
                            <tr>

                                <td>
                                    @if ($groupItem['is_saved'])
                                        {{ $groupItem['service_name'] }}
                                        ({{ number_format($groupItem['service_price'], 2) }})
                                    @else
                                        <select class="form-control"
                                                wire:model="GroupsItems.{{ $index }}.service_id">
                                            <option value="">-- اختر خدمة --</option>
                                            @foreach ($allServices as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ $service->name }}
                                                    ({{ number_format($service->price, 2) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                <td>
                                    @if ($groupItem['is_saved'])
                                        {{ $groupItem['quantity'] }}
                                    @else
                                        <input type="number" min="1" class="form-control"
                                            wire:model="GroupsItems.{{ $index }}.quantity">
                                    @endif
                                </td>

                                <td>
                                    @if ($groupItem['is_saved'])
                                        <button class="btn btn-sm btn-primary"
                                                wire:click.prevent="editService({{ $index }})">
                                            تعديل
                                        </button>
                                    @elseif($groupItem['service_id'])
                                        <button class="btn btn-sm btn-success"
                                                wire:click.prevent="saveService({{ $index }})">
                                            تأكيد
                                        </button>
                                    @endif

                                    <button class="btn btn-sm btn-danger"
                                            wire:click.prevent="removeService({{ $index }})">
                                        حذف
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                {{--  الحسابات  --}}
                <div class="col-lg-4 ml-auto text-right">
                    <table class="table">

                        <tr>
                            <td style="color:red">الإجمالي</td>
                            <td>{{ number_format($subtotal, 2) }}</td>
                        </tr>

                        <tr>
                            <td style="color:red">قيمة الخصم</td>
                            <td width="125">
                                <input type="number" class="form-control w-75 d-inline"
                                       wire:model.live="discount_value">
                            </td>
                        </tr>

                        <tr>
                            <td style="color:red">نسبة الضريبة</td>
                            <td>
                                <input type="number" min="0" max="100"
                                       class="form-control w-75 d-inline"
                                       wire:model.live="taxes"> %
                            </td>
                        </tr>

                        <tr>
                            <td style="color:red">الإجمالي مع الضريبة</td>
                            <td>{{ number_format($total_with_tax, 2) }}</td>
                        </tr>

                    </table>
                </div>

                <div>
                    <button class="btn btn-outline-success">تاكيد البيانات</button>
                </div>

            </div>
        </div>

    </form>

    @endif

</div>
