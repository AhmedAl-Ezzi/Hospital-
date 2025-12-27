<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;
use App\Models\Service;

class CreateGroupServices extends Component
{
    public $GroupsItems = [];
    public $allServices = [];

    public $subtotal = 0;                  // إجمالي الأسعار بدون خصم
    public $discount_value = 0;            // قيمة الخصم
    public $taxes = 15;                    // نسبة الضريبة %
    public $total_after_discount = 0;      // الإجمالي بعد الخصم
    public $total_with_tax = 0;            // الإجمالي النهائي بعد الخصم والضريبة

    public $name_group;
    public $notes;
    public $serviceSaved = false;
    public $show_table = true;
    public $updateMode = false;
    public $group_id;

    public function mount()
    {
        $this->allServices = Service::where('status', 1)->get();
        $this->GroupsItems = [];
    }

    public function addService()
    {
        $this->GroupsItems[] = [
            'service_id' => '',
            'service_name' => '',
            'service_price' => 0,
            'quantity' => 1,
            'is_saved' => false
        ];
    }

    public function saveService($index)
    {
        $service = Service::find($this->GroupsItems[$index]['service_id']);

        if (!$service) return;

        $this->GroupsItems[$index]['service_name']  = $service->name;
        $this->GroupsItems[$index]['service_price'] = $service->price;
        $this->GroupsItems[$index]['is_saved'] = true;

        $this->calculateTotals();
    }

    public function editService($index)
    {
        $this->GroupsItems[$index]['is_saved'] = false;
    }

    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);

        $this->calculateTotals();
    }

    public function updatedDiscountValue()
    {
        $this->calculateTotals();
    }

    public function updatedTaxes()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->discount_value = floatval($this->discount_value);
        $this->taxes = floatval($this->taxes);

        // حساب الإجمالي قبل الخصم
        $this->subtotal = 0;

        foreach ($this->GroupsItems as $item) {
            if (!empty($item['service_price']) && !empty($item['quantity'])) {
                $price = floatval($item['service_price']);
                $qty   = floatval($item['quantity']);
                $this->subtotal += ($price * $qty);
            }
        }

        // تطبيق الخصم أولاً
        $this->total_after_discount = $this->subtotal - $this->discount_value;
        if ($this->total_after_discount < 0) {
            $this->total_after_discount = 0;
        }

        // حساب الضريبة على المبلغ بعد الخصم
        $taxAmount = ($this->total_after_discount * $this->taxes) / 100;

        // الإجمالي النهائي
        $this->total_with_tax = $this->total_after_discount + $taxAmount;
    }




    // public function saveGroup()
    // {




    //     $Groups = new Group();
    //     $total = 0;

    //     foreach ($this->GroupsItems as $groupItem) {
    //         if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
    //             $total += $groupItem['service_price'] * $groupItem['quantity'];
    //         }
    //     }

    //     // اضبط جميع القيم قبل عملية الحفظ
    //     $Groups->name = $this->name_group;
    //     $Groups->notes = $this->notes;

    //     $Groups->total_before_discount = $total;
    //     $Groups->discount_value = $this->discount_value;
    //     $Groups->total_after_discount = $total - (is_numeric($this->discount_value) ? $this->discount_value : 0);
    //     $Groups->tax_rate = $this->taxes;
    //     $Groups->total_with_tax = $Groups->total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);

    //     $Groups->save(); // ✔️ الآن الحفظ صحيح ولا يوجد خطأ

    //     // // حفظ العلاقة
    //     // foreach ($this->GroupsItems as $GroupsItem) {
    //     //     $Groups->service_group()->attach($GroupsItem['service_id']);
    //     // }

    //      // حفظ العلاقة
    //         foreach ($this->GroupsItems as $GroupsItem) {
    //             $Groups->service_group()->attach($GroupsItem['service_id'],['quantity' => $GroupsItem['quantity']]);
    //         }

    //     flash()->success('تم حفظ البيانات بنجاح');

    //     $this->reset('GroupsItems', 'name_group', 'notes');
    //     $this->discount_value = 0;
    //     $this->serviceSaved = true;



    // }





    public function saveGroup()
    {

        if ($this->updateMode) {

            $Groups = Group::find($this->group_id);
            $total = 0;
            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    // الاجمالي قبل الخصم
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }
            //الاجمالي قبل الخصم
            $Groups->total_before_discount = $total;
            // قيمة الخصم
            $Groups->discount_value = $this->discount_value;
            // الاجمالي بعد الخصم
            $Groups->total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            //  نسبة الضريبة
            $Groups->tax_rate = $this->taxes;
            // الاجمالي + الضريبة
            $Groups->total_with_tax = $Groups->total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $Groups->save();
            // حفظ الترجمة
            $Groups->name = $this->name_group;
            $Groups->notes = $this->notes;
            $Groups->save();
            // حفظ العلاقة
            $Groups->service_group()->detach();
            foreach ($this->GroupsItems as $GroupsItem) {
                $Groups->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
            }

            flash()->addInfo('تم تعديل البيانات بنجاح');
            return redirect()->route('add_groupServices');



            // $this->ServiceSaved = false;
            // $this->ServiceUpdated = true;
        } else {


            $Groups = new Group();
            $total = 0;

            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }

            // اضبط جميع القيم قبل عملية الحفظ
            $Groups->name = $this->name_group;
            $Groups->notes = $this->notes;

            $Groups->total_before_discount = $total;
            $Groups->discount_value = $this->discount_value;
            $Groups->total_after_discount = $total - (is_numeric($this->discount_value) ? $this->discount_value : 0);
            $Groups->tax_rate = $this->taxes;
            $Groups->total_with_tax = $Groups->total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);

            $Groups->save(); // ✔️ الآن الحفظ صحيح ولا يوجد خطأ

            // حفظ العلاقة
            foreach ($this->GroupsItems as $GroupsItem) {
                $Groups->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
            }
            flash()->success('تم حفظ البيانات بنجاح');

            $this->reset('GroupsItems', 'name_group', 'notes');
            $this->discount_value = 0;
            $this->serviceSaved = true;
        }
    }





    // public function saveGroup()
    // {
    //     $this->serviceSaved = true;
    // }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function render()
    {
        return view('livewire.GroupServices.create-group-services', [
            'groups' => Group::orderBy('id', 'desc')->paginate(15),
        ]);
    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $group = Group::where('id', $id)->first();
        $this->group_id = $id;

        $this->reset('GroupsItems', 'name_group', 'notes');
        $this->name_group = $group->name;
        $this->notes = $group->notes;

        $this->discount_value = intval($group->discount_value);
        $this->serviceSaved = false;

        foreach ($group->service_group as $serviceGroup) {
            $this->GroupsItems[] = [
                'service_id' => $serviceGroup->id,
                // 'quantity' => 1,
                'quantity' => $serviceGroup->pivot->quantity,
                'is_saved' => true,
                'service_name' => $serviceGroup->name,
                'service_price' => $serviceGroup->price
            ];
        }

    }

    public function delete($id)
    {
        Group::destroy($id);

        flash()->addWarning('تم حذف البيانات بنجاح.');
        return redirect()->route('add_groupServices');

    }
}
