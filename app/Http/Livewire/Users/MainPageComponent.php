<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\access_page;
use App\Http\Livewire\define_policy;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MainPageComponent extends Component
{
    public $idIn;
    public $delId;
    protected $listeners=['refreshParent'=>'$refresh'];
    public function selectItem($id,$action)
    {
        if ($action == 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
            $this->delId=$id;
        }
        else
        {

            $this->emit('getId',$id);
            $this->dispatchBrowserEvent('openModal');
//            dd('yuyuyuy');
        }
    }
    public function delete()
    {
        User::destroy($this->delId);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }
    public function render()
    {
        $maintitle=' کاربران';
        $pagedescription='مدیریت کاربران';
        $datapanel=define_policy::SetPolicy('sssss');
        $datapage=access_page::SetPolicy(Auth::user()->role,541);
//        dump($datapage);
        $users=User::with('roleObj')->get();
        return view('livewire.users.main-page-component',get_defined_vars(),$datapage)->layout('layouts.admin');
    }
}
