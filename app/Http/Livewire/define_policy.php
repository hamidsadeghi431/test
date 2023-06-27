<?php

namespace App\Http\Livewire;
use App\Http\Livewire\access_detect;

class define_policy
{
    public static function SetPolicy($title)
    {
        return ['title'=>$title,
//            الزامات
            'accmm1'=>access_detect::GetAccess(1,0),
            'accsb0'=>access_detect::GetAccess(2,0),
//            عملیات
            'accmm2'=>access_detect::GetAccess(3,0),
            'accsb1'=>access_detect::GetAccess(4,0),
            'accsb2'=>access_detect::GetAccess(5,0),
            'accsb3'=>access_detect::GetAccess(6,0),
//            گزارشات
            'accmm3'=>access_detect::GetAccess(7,0),
            'accsb4'=>access_detect::GetAccess(8,0),
            'accsb5'=>access_detect::GetAccess(9,0),
//            مدیریت پروژه
            'accmm4'=>access_detect::GetAccess(10,0),
            'accsb6'=>access_detect::GetAccess(11,0),
//تنظیمات
            'accmm5'=>access_detect::GetAccess(12,0),
            'accsb7'=>access_detect::GetAccess(13,0),
            'accsb8'=>access_detect::GetAccess(14,0),
            'accsb9'=>access_detect::GetAccess(15,0),
            'accsb10'=>access_detect::GetAccess(16,0),
//            خانه
            'accmm6'=>access_detect::GetAccess(17,0),
            'accsb11'=>access_detect::GetAccess(18,0),
            'accsb12'=>access_detect::GetAccess(19,0),
            'accsb13'=>access_detect::GetAccess(20,0),
            'accsb14'=>access_detect::GetAccess(21,0),
            'accsb15'=>access_detect::GetAccess(22,0),
            'accsb16'=>access_detect::GetAccess(23,0),
            'accsb17'=>access_detect::GetAccess(24,0),
            'accsb18'=>access_detect::GetAccess(25,0),
//            'srch'=>access_detect::GetAccessPage(26,111),
//            'add'=>access_detect::GetAccessPage(27,111),
//            'edit'=>access_detect::GetAccessPage(28,111),
//            'del'=>access_detect::GetAccessPage(29,111),
//            'dowl'=>access_detect::GetAccessPage(30,111),
//            'srchadvnc'=>access_detect::GetAccessPage(31,111),
        ];
    }
}
