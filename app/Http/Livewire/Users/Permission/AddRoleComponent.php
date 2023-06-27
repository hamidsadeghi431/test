<?php

namespace App\Http\Livewire\Users\Permission;

use App\Models\user\roleAll;
use Livewire\Component;

class AddRoleComponent extends Component
{
    public $role;public $routeRole;
    public function save()
    {
        $data=['role_name'=>$this->role];
        roleAll::create($data);
    }

    public function render()
    {
        return view('livewire.users.permission.add-role-component');
    }
}
