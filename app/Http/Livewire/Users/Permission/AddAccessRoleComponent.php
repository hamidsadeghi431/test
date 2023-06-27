<?php

namespace App\Http\Livewire\Users\Permission;

use App\Models\user\roleAx;
use App\Models\user\access_element;
use App\Models\user\roleAll;
use Livewire\Component;

class AddAccessRoleComponent extends Component
{
    public $fld1;public $fld2;public $fld3;public $fld4;public $fld5;public $fld6;public $fld7;public $fld8;public $fld9;public $fld10;
    public $fld11;public $fld12;public $fld13;public $fld14;public $fld15;public $fld16;public $fld17;public $fld18;public $fld19;public $fld20;
    public $fld21;public $fld22;public $fld23;public $fld24;public $fld25;public $fld26;public $fld27;public $fld28;public $fld29;public $fld30;

    public $fld1126;public $fld1127;public $fld1128;public $fld1129;public $fld1130;public $fld1131;

    public $fld2126;public $fld2127;public $fld2128;public $fld2129;public $fld2130;public $fld2131;public $fld2132;public $fld2133;public $fld2134;
    public $fld2226;public $fld2227;public $fld2228;public $fld2229;public $fld2232;public $fld2235;public $fld2236;public $fld2237;public $fld2238;
    public $fld2338;public $fld2339;public $fld2340;
    public $fld3138;public $fld3139;public $fld3140;public $fld3141;public $fld3142;public $fld3143;public $fld3144;
    public $fld3238;public $fld3239;public $fld3240;
    public $fld4126;public $fld4127;public $fld4129;public $fld4145;
    public $fld5126;public $fld5127;public $fld5128;public $fld5129;public $fld5146;
    public $fld5226;public $fld5227;public $fld5228;public $fld5229;public $fld5230;public $fld5247;
    public $fld5326;public $fld5327;public $fld5328;public $fld5329;public $fld5348;
    public $fld5426;public $fld5427;public $fld5428;public $fld5429;
    public $roleIDIn;
    protected $listeners=['getModalId'];

    public function getModalId($id)
    {
        $this->roleIDIn=$id;
        $this->cleanvar();
        $this->cleanvarpage();
        $RoleAll=roleAx::where('role_id',$this->roleIDIn)->where('role_access_page',0)->get();
        foreach ($RoleAll as $k=>$item)
        {
            $x='fld'.($item->role_access);
            $this->$x=$item->role_access;
        }
        $RoleAllPage=roleAx::where('role_id',$this->roleIDIn)->where('role_access_page','>',0)->get();
        foreach ($RoleAllPage as $k=>$item)
        {
            $x='fld'.($item->input_code);
            $this->$x=$item->role_access;
        }
    }
    public function closeend()
    {

    }
    public function save()
    {
//        dd($this->fld1,$this->fld2,$this->fld3,$this->fld4,$this->fld5,$this->fld6,
//        $this->fld7,$this->fld8,$this->fld9,$this->fld10,$this->fld11,$this->fld12,$this->fld13,$this->fld14,$this->roleIDIn);
//        dd($this->fld1126,$this->fld1127,$this->fld1128,$this->fld1129,$this->fld1130,$this->fld1131);
//        dd($this->fld2126,$this->fld2127,$this->fld2128,$this->fld2129,$this->fld2132,$this->fld2133);
//        dd($this->fld2226,$this->fld2227,$this->fld2228,$this->fld2229,$this->fld2234,$this->fld2235,$this->fld2236);
//        dd($this->fld2334,$this->fld2337,$this->fld2339);

        roleAx::where('role_id',$this->roleIDIn)->delete();
        for ($i=1;$i<31;$i++)
        {
            $x="fld$i";
            if ($this->$x != null)
            {
                roleAx::create([
                    'role_id'=>$this->roleIDIn,
                    'role_access'=>$this->$x,
                    'role_access_page'=>0

                ]);
            }
        }
        $this->addedPagePermissionToDB(1126,1132,0,0,0,0,111);
        $this->addedPagePermissionToDB(2126,2135,2,2129,0,0,211);
        $this->addedPagePermissionToDB(2226,2239,2,2229,2234,2232,221);
        $this->addedPagePermissionToDB(2338,2341,0,0,0,0,231);
        $this->addedPagePermissionToDB(3138,3145,0,0,0,0,311);
        $this->addedPagePermissionToDB(3238,3241,0,0,0,0,321);
        $this->addedPagePermissionToDB(4126,4146,1,4127,4144,4129,411);
        $this->addedPagePermissionToDB(5126,5147,0,0,5145,5129,511);
        $this->addedPagePermissionToDB(5226,5248,0,0,5246,5230,521);
        $this->addedPagePermissionToDB(5326,5349,0,0,5347,5329,531);
        $this->addedPagePermissionToDB(5426,5430,0,0,0,0,541);

        $this->cleanvar();
    }
    public function addedPagePermissionToDB($start,$end,$step1,$no1,$step2,$no2,$role_access_page)
    {
        for ($a=$start;$a<$end;$a++)
        {
            $x='fld'.$a;
            if ($this->$x != null)
            {

               roleAx::create([
                    'role_id'=>$this->roleIDIn,
                    'role_access'=>$this->$x,
                    'role_access_page'=>$role_access_page,
                    'input_code'=>$a
                ]);
            }
            if($step1 > 0)
            {
                if ($a == $no1) $a = $a + $step1;
            }
            if($step2 > 0)
            {
//
                if ($a == $no2) $a =  $step2;
            }

        }
    }
    public function cleanvar()
    {
        for ($i=1;$i<31;$i++)
        {
            $x="fld$i";
            $this->$x=null;
        }
    }

    public function cleanvarpage()
    {
        for ($i=1126;$i<5429;$i++)
        {
            $x="fld$i";
            $this->$x=null;
        }
    }

    public function render()
    {
        $commAcess=access_element::where('mnuparent',10)->get();
        $roles_name=roleAll::where('role_id',$this->roleIDIn)->value('role_name');
        //منوی الزامات
        $cat1=access_element::where('cat',1)->where('parent',0)->get();
        //زیر منوی الزامات
        $scat1=access_element::where('cat',1)->where('parent',$this->fld1)->get();
        //سطح دسترسی صفحه اول
        $spage1=access_element::where('access_tree',111)->orwhere('mnuparent',8)->orderby('ax_tree_order')->get();
        //************************************پایان منوی اول*************************
        //منوی عملیات
        $cat2=access_element::where('cat',2)->where('parent',0)->get();
        //منوی تجزیه تحلیل روزانه اطلاعات
        $scat21=access_element::where('cat',2)->where('parent',2)->where('access_tree',21)->get();
        //سطح دسترسی صفحه منوی تجزیه تحلیل روزانه اطلاعات///////////////
        $spage211=access_element::orwhere('access_tree',211)->orderby('ax_tree_order')->get();
        //منوی تجزیه تحلیل ماهانه اطلاعات
        $scat22=access_element::where('cat',2)->where('parent',2)->where('access_tree',22)->get();
        //سطح دسترسی صفحه منوی تجزیه تحلیل ماهانه اطلاعات//////////////
        $spage221=access_element::orwhere('access_tree',221)->orwhere('mnuparent',2)->orwhere('mnuparent',3)->orwhere('mnuparent',9)->orderby('ax_tree_order')->get();
        // منوی شناسایی کاربری های بارز
        $scat23=access_element::where('cat',2)->where('parent',2)->where('access_tree',23)->get();
        //سطح دسترسی صفحه منوی شناسایی کاربری های بارز//////////////
        $spage231=access_element::orwhere('access_tree',231)->orwhere('mnuparent',1)->orwhere('mnuparent',2)->orwhere('mnuparent',11)->orderby('ax_tree_order')->get();
        //*********************پایان منوی دوم (عملیات)*****************************
        $cat3=access_element::where('cat',3)->where('parent',0)->get();
        //منوی گزارشات تحلیلی مصرف انرژی
        $scat31=access_element::where('cat',3)->where('parent',3)->where('access_tree',31)->get();
        //سطح دسترسی صفحه منوی گزارشات تحلیلی مصرف انرژی///////////////
        $spage311=access_element::orwhere('access_tree',311)->orwhere('mnuparent',1)->orwhere('mnuparent',2)->orwhere('mnuparent',11)->orderby('ax_tree_order')->get();

        $cat4=access_element::where('cat',4)->where('parent',0)->get();
        //منوی تحلیل عملکرد انرژی بر اساس خط مبنا
        $scat32=access_element::where('cat',3)->where('parent',3)->where('access_tree',32)->get();
        //سطح دسترسی منوی تحلیل عملکرد انرژی بر اساس خط مبنا
        $spage321=access_element::orwhere('mnuparent',1)->orwhere('mnuparent',2)->orwhere('mnuparent',11)->orderby('ax_tree_order')->get();
        //*********************پایان منوی سوم (گزارشات)*****************************
        $scat4=access_element::where('cat',4)->where('parent',4)->get();
        //منوی تعریف پروژه
        $scat41=access_element::where('cat',4)->where('parent',4)->where('access_tree',41)->get();
        //سطح دسترسی منوی تعریف پروژه
        $commAcess1=access_element::where('mnuparent',10)->where('ax_tree_order',1)->get();
        $spage411=access_element::orwhere('mnuparent',16)->get();
        //*********************پایان منوی چهارم (مدیریت پروژه)*****************************
        $cat5=access_element::where('cat',5)->where('parent',0)->get();
        //منوی تعریف پارامترها
        $scat51=access_element::where('cat',5)->where('parent',5)->where('access_tree',51)->get();
        //سطح دسترسی منوی تعریف پارامترها
        $spage511=access_element::orwhere('mnuparent',17)->orwhere('access_tree',511)->get();
        //منوی تنظیمات فایل های اکسل
        $scat52=access_element::where('cat',5)->where('parent',5)->where('access_tree',52)->get();
        //سطح دسترسی منوی تنظیمات فایل های اکسل
        $spage521=access_element::orwhere('mnuparent',8)->orwhere('access_tree',521)->get();
        //منوی نقش کاربری و دسترسی ها
        $scat53=access_element::where('cat',5)->where('parent',5)->where('access_tree',53)->get();
        //سطح دسترسی منوی نقش کاربری و دسترسی ها
        $spage531=access_element::orwhere('access_tree',531)->get();
        //منوی نقش کاربری و دسترسی ها
        $scat54=access_element::where('cat',5)->where('parent',5)->where('access_tree',54)->get();
        //سطح دسترسی منوی نقش کاربری و دسترسی ها
        $spage541=access_element::orwhere('access_tree',541)->get();
        $cat6=access_element::where('cat',6)->where('parent',0)->get();
        $scat6=access_element::where('cat',6)->where('parent',6)->get();
        return view('livewire.users.permission.add-access-role-component',get_defined_vars());
    }
}
