<?php

namespace App\Http\Livewire\Users\Permission;

use App\Http\Livewire\access_page;
use App\Http\Livewire\define_policy;
use App\Models\user\roleAll;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainPageComponent extends Component
{
    public function selectItem($id,$action)
    {

//        dd('hi');
        if ($action == 'addaccess')
        {
            $this->emit('getModalId',$id);
            $this->dispatchBrowserEvent('openModalFormAddHead');
        }
        elseif ($action == 'delete')
        {

        }
        else
        {

        }
    }
    public function render()
    {
        $maintitle='سطح دسترسی کاربران';
        $pagedescription='مدیریت سطح دسترسی کاربران';
//        $datapanel=define_policy::SetPolicy($this->title_page);
        $datapage=access_page::SetPolicy(Auth::user()->role,531);

        $users=roleAll::paginate(5);
        return view('livewire.users.permission.main-page-component',get_defined_vars(),$datapage)->layout('layouts.admin');
    }
}
