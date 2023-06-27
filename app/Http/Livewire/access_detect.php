<?php

namespace App\Http\Livewire;

use App\Models\user\roleAx;
use config;

class access_detect
{
public static $out;
public static $out1;
public static $out2;
    /**
     * @return mixed
     */
    public static function GetAccess($role_id,$pageAccess)
    {
        return self::$out=roleAx::where('role_id',(auth()->user()->role))->where('role_access',$role_id)->where('role_access_page',0)->
        value('role_access');
    }
    public static function GetAccessPage($role_id,$pageAccess)
    {
        $data=array();
//        return self::$out1=roleAx::where('role_id',$role_id)->where('role_access',$rol_access)->where('role_access_page',$pageAccess)->
//        value('role_access');
        $out=roleAx::where('role_id',$role_id)->whereBetween('role_access',[config("global.min_op"),config("global.max_op")])->where('role_access_page',$pageAccess)->get();
        foreach ($out as $item)
        {
            if ($item->role_access) $data[config("global.axpagecode.$item->role_access")]=$item->role_access;

        }
        foreach (config("global.axpagecode") as $k=>$item)
        {
//            dump($k);
            if (!isset($data[config("global.axpagecode.$k")])) $data[config("global.axpagecode.$k")]=0;
        }

//       dd($data);
        return self::$out2=$data;

    }

}
