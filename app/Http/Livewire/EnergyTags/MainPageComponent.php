<?php

namespace App\Http\Livewire\EnergyTags;

use App\Models\powerData;
use App\Models\powerDataEnd;
use App\Models\Provinces;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Livewire\Component;
class MainPageComponent extends Component
{
    public $idIn;public $sece;public $r;public $secIdeal;public $secAv;public $mm2; public $energyTags;public $lastyear;
    protected $listeners=['getEnergyTagsId'];

    public function getEnergyTagsId($id,$sece,$secAv,$r,$secIdeal,$mm2,$enregyTags,$lastYear)
    {
//        dd($lastYear);
        $this->idIn=$id;$this->sece=$sece;$this->secAv=$secAv;$this->r=$r;$this->secIdeal=$secIdeal;$this->mm2=$mm2;$this->energyTags=$enregyTags;$this->lastyear=$lastYear;
    }
    public function render()
    {
        $city_code=$pwrConsumsecyear=$city=$address=$postalCode=$InternationalIDBuldiing=$tagsNO=$ExpireDate=$aianArea='';
        $region=$fyear=$pwrConsumFiYear=$pwrConsumSeYear=$pwrConsumThYear=0;
        $startDate=powerData::where('userId',$this->idIn)->first();
        if ($this->idIn)$startDuration=powerDataEnd::where('userId',$this->idIn)->first()->year;

//        dump($this->lastyear,$startDate);
        if ($this->idIn)$fyear=$startDuration;
        if ($this->idIn)$pwrConsumFiYear=powerDataEnd::where('userId',$this->idIn)->where('year',$fyear)->max('pwrConsTotal');
        if ($this->idIn)$pwrConsumSeYear=powerDataEnd::where('userId',$this->idIn)->where('year',$fyear+1)->max('pwrConsTotal');
        if ($this->idIn)$pwrConsumThYear=powerDataEnd::where('userId',$this->idIn)->where('year',$fyear+2)->max('pwrConsTotal');
        $datas=User::where('user_id',$this->idIn)->get();
//        dump(gettype($datas->city));
        foreach ($datas as $item)
        {
            $city_code=$item->city;$usefulAre=$item->UsefulArea;$address=$item->address;
            $postalCode=$item->postalCode;$InternationalIDBuldiing=$item->InternationalIDBuldiing;
            $tagsNO=$item->tagsNO;$ExpireDate=$item->ExpireDate;$aianArea=$item->aianArea;
        }
        $citydatas=Provinces::where('id',$city_code)->get();
        foreach ($citydatas as $item)
        {
            $city=$item->title;$region=$item->region;
        }
        if ($startDate) $startDate=$startDate->fromDate;
        return view('livewire.energy-tags.main-page-component',get_defined_vars());
    }
}
