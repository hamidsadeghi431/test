<?php

namespace App\Http\Livewire\Charts;

use App\Models\fcTable;
use App\Models\powerData;
use App\Models\powerDataEnd;
use App\Models\User;
use Database\Seeders\UsersData;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeMissionOneChartsComponent extends Component
{

    protected $listeners=['getChartId','forcedCloseModal'];
    public $idIn;public $meter;
    public function getChartId($id,$meter)
    {
//        dd($meter);
        $this->idIn=$id;
        $this->meter=$meter;
    }

    public function mount($id)
    {
        $this->idIn=$id;
        $this->meter=User::where('user_id',$this->idIn)->value('mm2');

    }
    public function render()
    {
//        dump($this->idIn);
        $tableParameters=powerDataEnd::where('userId',$this->idIn)->orderBy('year')->orderBy('month')->get();
        $tableParameters1=powerDataEnd::where('userId',$this->idIn)->orderBy('year')->orderBy('month')->get();
        $dailyPower=powerDataEnd::where('userId',$this->idIn)->groupBy('temperature')->get();
        $chartData=powerDataEnd::where('userId',$this->idIn)->get();
        $firstYear=powerDataEnd::where('userId',$this->idIn)->min('year');
        $secondYear=$firstYear+1;
        $thirdYear=$secondYear+1;
//        $meter=User::where('user_id',$this->idIn)->value('mm2');
        $meter=$this->meter;
        if ($this->idIn)$Fc1=fcTable::where('year',$firstYear)->value('fc');
        if ($this->idIn)$Fc2=fcTable::where('year',$secondYear)->value('fc');
        if ($this->idIn)$Fc3=fcTable::where('year',$thirdYear)->value('fc');
        if ($this->idIn)$sei1=powerDataEnd::where('userId',$this->idIn)->where('year',$firstYear)->sum('dailyPwrConsum')/$meter*$Fc1;
        if ($this->idIn)$sei2=powerDataEnd::where('userId',$this->idIn)->where('year',$secondYear)->sum('dailyPwrConsum')/$meter*$Fc2;
        if ($this->idIn)$sei3=powerDataEnd::where('userId',$this->idIn)->where('year',$secondYear)->sum('dailyPwrConsum')/$meter*$Fc3;
        $datapoints1=array();
        $datapoints1=array();
//        $keys
        foreach ($chartData as $k=>$item)
        {
            $date=intval($item->year.$item->month);
//            $datapoints1=array("x"=>$item->year,"y"=>$item->pwrConsTotal);
            $dataPoints1[$k] = ["label:"=> $item->year,	"y:"=> $item->pwrConsTotal,];
            $dataPoints2[$k] = ["label:"=> $item->year,	"y:"=> $item->temperature,];
        }
        return view('livewire.charts.home-mission-one-charts-component',get_defined_vars())->layout('layouts.admin1');
    }
}
