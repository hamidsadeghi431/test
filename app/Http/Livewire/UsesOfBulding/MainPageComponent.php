<?php

namespace App\Http\Livewire\UsesOfBulding;

use App\Models\Provinces;
use App\Models\usesesOfBulding;
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
        $parentCode=usesesOfBulding::where('parents',$this->delId)->count('title');
        if ($parentCode > 0)
        {
            $this->dispatchBrowserEvent('opennotificationModal');
            return redirect()->back()->with('delNotification','زیر کاربری وجود دارد شما نمی توانید این کاربری را حذف کنید'.$parentCode.'برای این کاربری تعداد');
        }
        else
        {
            usesesOfBulding::destroy($this->delId);
            $this->dispatchBrowserEvent('closedeletemodal');
        }
//        dd($parentCode);
    }

    public function render()
    {
        $maintitle=' کاربری ها';
        $pagedescription='مدیریت کاربری ها';
        $mainTable=usesesOfBulding::where('parents',0)->paginate(10);
        return view('livewire.uses-of-bulding.main-page-component',get_defined_vars())->layout('layouts.admin');
    }
}
