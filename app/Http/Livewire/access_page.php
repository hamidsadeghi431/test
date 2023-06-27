<?php

namespace App\Http\Livewire;
use App\Http\Livewire\access_detect;

class access_page
{

    public static function SetPolicy($role_id,$pageAccess)
    {

        return
            access_detect::GetAccessPage($role_id,$pageAccess);
    }
}
