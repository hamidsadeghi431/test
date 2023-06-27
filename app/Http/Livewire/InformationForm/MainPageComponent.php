<?php

namespace App\Http\Livewire\InformationForm;

use App\Models\Provinces;
use App\Models\usesesOfBulding;
use Livewire\Component;

class MainPageComponent extends Component
{
    protected $listeners =['GetInfoId'];
    public $cunterNo;public $postalCode;public $province;public $city;public $mainUses;public $slaveUses;

    public function GetInfoId($id)
    {
//        dd('hi');
//        dd($id);
    }
    public function render()
    {
        $provincesAll=Provinces::where('parent',0)->get();
        $CityAll=Provinces::where('parent',$this->province)->get();
        $mainUsest=usesesOfBulding::where('parents',0)->get();
        $slaveUsest=usesesOfBulding::where('parents',$this->mainUses)->get();
        return view('livewire.information-form.main-page-component',get_defined_vars());
    }
}
