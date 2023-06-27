<?php

namespace App\Http\Livewire\Province;

use App\Models\Provinces;
use Livewire\Component;
use Livewire\WithPagination;

class MainPageComponent extends Component
{
    use WithPagination;
    public $listeners=['refreshParent'=>'$refresh'];
    public $delId;
    public function selectItem($id,$action)
    {
//        dd($id,$action);
        if($action == 'update' || $action == 'addCity')
        {
           $this->emit('getId',$id,$action);
            $this->dispatchBrowserEvent('show-form');
        }
        else
        {
            $this->delId=$id;
            $this->dispatchBrowserEvent('opendeletemodal');
        }
    }

    public function delete1()
    {
        $parentCode=Provinces::where('parent',$this->delId)->count('title');
        if ($parentCode > 0)
        {
            $this->dispatchBrowserEvent('opennotificationModal');
            return redirect()->back()->with('delNotification','شهر وجود دارد شما نمی توانید این استان را حذف کنید'.$parentCode.'برای این استان تعداد');
        }
        else
        {
            Provinces::destroy($this->delId);
            $this->dispatchBrowserEvent('closedeletemodal');
        }
//        dd($parentCode);
    }
    public function render()
    {
        $maintitle='مدیریت استانها و شهرها';
        $pagedescription='جدول استانها و شهرها';
        $cities=Provinces::where('parent',0)->paginate(10);
        return view('livewire.province.main-page-component',get_defined_vars())->layout('layouts.admin');
    }
}
