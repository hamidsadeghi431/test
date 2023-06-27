<?php

namespace App\Http\Livewire;

use App\Http\Livewire\LineChrt;
use App\Models\fcTable;
use App\Models\powerData;
use App\Models\powerDataEnd;
use App\Models\Provinces;
use App\Models\regionCoefficent;
use App\Models\TehranAvTemperature;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use mnshankar\LinearRegression\Regression;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
use function Livewire\invade;

class DashboardComponent extends Component
{
    use WithPagination;
    public $addpwr;public $addsAPI;public $addTune;public $userId;public $cityCode;public $provinceCode;public $meter;
    public $showDataLabels=true;
    public $firstRun=true;
    protected $listeners=['refreshParent'=>'$refresh'];

    public function showCharts($id)
    {
        $this->emit('getChartId',$id,$this->meter);
        $this->dispatchBrowserEvent('show-big-modal');
        dump($this->meter);
//        dd($id);
    }

    public function energyTags($id,$sece,$secAv,$r,$secIdeal,$mm2,$enregyTags,$lastYear)
    {
        if ($lastYear == "")
        {
//            dd($lastYear);
        }
        else {
            $this->emit('getEnergyTagsId', $id, $sece, $secAv, $r, $secIdeal, $mm2, $enregyTags, $lastYear);
            $this->dispatchBrowserEvent('show-energy-tag');
        }
    }
    public function addData($id,$action)
    {
        if($action == 'pwrConsum' || $action =='update')
        {
            $this->emit('getId',$id);
            $this->dispatchBrowserEvent('show-form');
        }
        else
        {

        }
    }

    public function comparisonData($Fristmonth,$Secoundmonth,$Fristyear,$Secoundyear,$pwrConsumtotal1,$Inprice,$tedadRoozTarikhAval,$avtemp1)
    {

            if ($Fristmonth == 11) {
                $oldData1 = powerDataEnd::where('userId',$this->userId)->where('year', $Fristyear)->where('month', $Fristmonth)->get();
                foreach ($oldData1 as $item) {
                    $pwrConsumtotal1 = $pwrConsumtotal1 + intval($item->pwrConsTotal);
                    $price1 = $Inprice + intval($item->price);
                    $pwrConsumPerDay = $pwrConsumtotal1 / $tedadRoozTarikhAval;
//                    dump($pwrConsumPerDay,$price1,$tedadRoozTarikhAval);
                }
                $data1 = [
                    'userId'=>$this->userId,
                    'pwrConsTotal' => $pwrConsumtotal1,
                    'dayQty' => $tedadRoozTarikhAval,
                    'price' => $price1,
                    'temperature' => $avtemp1,
                    'userInsert' => Auth::user()->id,
                    'dailyPwrConsum' => $pwrConsumPerDay,
                    'year' => $Fristyear,
                    'month' => $Fristmonth
                ];
                powerDataEnd::where('userId',$this->userId)->where('year', $Fristyear)->where('month', $Fristmonth)->update($data1);

            }

    }
    public function calcuulateEndMonthYear($Fristyear,$Fristmonth,$Fristday,$Secoundyear,$Secoundmonth,$Secoundday,$InpwrConsTotal,$Inprice,$longitude,$latitude)
    {

            $tedadRoozTarikhAval= (new Jalalian($Fristyear,$Fristmonth,$Fristday))->getMonthDays();
            $tedadRoozTarikhDovom=(new Jalalian($Fristyear,12,1))->getMonthDays();
            $tedadRoozTarikhSevom=(new Jalalian($Secoundyear,$Secoundmonth,$Secoundday))->getMonthDays();
            $one=01;
            $tedadRoozMah1=$tedadRoozTarikhAval-$Fristday;
            $tedadRoozMah2=$tedadRoozTarikhDovom;
            $tedadRoozMah3=intval($Secoundday);
            $totalDay = $tedadRoozMah1+$tedadRoozMah2+$tedadRoozMah3;
            $pwrConsumPerDay=$InpwrConsTotal/$totalDay;

            $pwrConsumtotal1=$pwrConsumPerDay*$tedadRoozMah1;
            $pwrConsumtotal2=$pwrConsumPerDay*$tedadRoozMah2;
            $pwrConsumtotal3=$pwrConsumPerDay*$tedadRoozMah3;

            $pricePerDay=$Inprice/$totalDay;

            $price1=$pricePerDay*$tedadRoozMah1;
            $price2=$pricePerDay*$tedadRoozMah2;
            $price3=$pricePerDay*$tedadRoozMah3;

//            $startMIladiDate1 = $this->CalculateMiladi($Fristyear,$Fristmonth,1);
//            $endMIladiDate1 = $this->CalculateMiladi($Fristyear,$Fristmonth,$tedadRoozTarikhAval);
//
//            $startMIladiDate2 = $this->CalculateMiladi($Fristyear,12,1);
//            $endMIladiDate2 = $this->CalculateMiladi($Fristyear,12,$tedadRoozTarikhDovom);
//
//
//            $startMIladiDate3 = $this->CalculateMiladi($Secoundyear,$Secoundmonth,1);
//            $endMIladiDate3 = $this->CalculateMiladi($Secoundyear,$Secoundmonth,$tedadRoozTarikhSevom);
//            $avtemp1=$avtemp2=$avtemp3=1;
            $avtemp1=$this->averageTemperatureDB($this->cityCode,$this->provinceCode,$Fristyear.$Fristmonth.intval('0').$one,$Fristyear.$Fristmonth.$tedadRoozTarikhAval,$tedadRoozTarikhAval);
            $avtemp2=$this->averageTemperatureDB($this->cityCode,$this->provinceCode,$Fristyear.intval(120).$one,$Fristyear.intval(12).$tedadRoozTarikhDovom,$tedadRoozTarikhDovom);
            $avtemp3=$this->averageTemperatureDB($this->cityCode,$this->provinceCode,$Secoundyear.$Secoundmonth.intval('0').$one,$Secoundyear.$Secoundmonth.$tedadRoozTarikhSevom,$tedadRoozTarikhSevom);
//                $tedadRoozMah3=$tedadRoozTarikhSevom-$Thirddday+1;

            $countold=powerDataEnd::where('userId',$this->userId)->where('year',$Fristyear)->where('month',$Fristmonth)->count('month');
            if ($countold > 0) {
              $this->comparisonData($Fristmonth,$Secoundmonth,$Fristyear,$Secoundyear,$pwrConsumtotal1,$Inprice,$tedadRoozTarikhAval,$avtemp1);
                $data2=[
                    'userId'=>$this->userId,
                    'pwrConsTotal'=>$pwrConsumtotal2,
                    'dayQty'=>$tedadRoozTarikhDovom,
                    'price'=>$price2,
                    'temperature'=>$avtemp2,
                    'userInsert'=>Auth::user()->id,
                    'dailyPwrConsum'=>$pwrConsumPerDay,
                    'year'=>$Fristyear,
                    'month'=>12
                ];
                $data3=[
                    'userId'=>$this->userId,
                    'pwrConsTotal'=>$pwrConsumtotal3,
                    'dayQty'=>$tedadRoozTarikhSevom,
                    'price'=>$price3,
                    'temperature'=>$avtemp3,
                    'userInsert'=>Auth::user()->id,
                    'dailyPwrConsum'=>$pwrConsumPerDay,
                    'year'=>$Secoundyear,
                    'month'=>$Secoundmonth
                ];
                powerDataEnd::create($data2);
                powerDataEnd::create($data3);
            }
            else
            {
                $data1=[
                    'userId'=>$this->userId,
                    'pwrConsTotal'=>$pwrConsumtotal1,
                    'dayQty'=>$tedadRoozTarikhAval,
                    'price'=>$price1,
                    'temperature'=>$avtemp1,
                    'userInsert'=>Auth::user()->id,
                    'dailyPwrConsum'=>$pwrConsumPerDay,
                    'year'=>$Fristyear,
                    'month'=>$Fristmonth
                ];
                $data2=[
                    'userId'=>$this->userId,
                    'pwrConsTotal'=>$pwrConsumtotal2,
                    'dayQty'=>$tedadRoozTarikhDovom,
                    'price'=>$price2,
                    'temperature'=>$avtemp2,
                    'userInsert'=>Auth::user()->id,
                    'dailyPwrConsum'=>$pwrConsumPerDay,
                    'year'=>$Fristyear,
                    'month'=>12
                ];
                $data3=[
                    'userId'=>$this->userId,
                    'pwrConsTotal'=>$pwrConsumtotal3,
                    'dayQty'=>$tedadRoozTarikhSevom,
                    'price'=>$price3,
                    'temperature'=>$avtemp3,
                    'userInsert'=>Auth::user()->id,
                    'dailyPwrConsum'=>$pwrConsumPerDay,
                    'year'=>$Secoundyear,
                    'month'=>$Secoundmonth
                ];
                powerDataEnd::create($data1);
                powerDataEnd::create($data2);
                powerDataEnd::create($data3);
            }

//                dd($data1,$data2,$data3);


    }

    public function calculateAllMonth($Fristyear,$Fristmonth,$Fristday,$Secoundyear,$Secoundmonth,$Secoundday,$InpwrConsTotal,$Inprice,$longitude,$latitude)
    {

        $tedadRoozTarikhAval=(new Jalalian($Fristyear,$Fristmonth,$Fristday))->getMonthDays();
        $tedadRoozTarikhDovom=(new Jalalian($Secoundyear,$Secoundmonth,$Secoundday))->getMonthDays();
        $one=01;
        $tedadRoozMah1=$tedadRoozTarikhAval-$Fristday;
        $tedadRoozMah2=intval($Secoundday);

        $totalDay=$tedadRoozMah1+$tedadRoozMah2;
//        dump($tedadRoozMah1,$tedadRoozMah2);
        $pwrConsumPerDay=$InpwrConsTotal/$totalDay;

        $pwrConsumtotal1=$pwrConsumPerDay*$tedadRoozMah1;
        $pwrConsumtotal2=$pwrConsumPerDay*$tedadRoozMah2;

     //   dump($pwrConsumtotal1,$pwrConsumtotal2,$tedadRoozMah2);
        $pricePerDay=$Inprice/$totalDay;

        $price1=$pricePerDay*$tedadRoozMah1;
        $price2=$pricePerDay*$tedadRoozMah2;
        $counter=0;
//        $startMIladiDate1 = $this->CalculateMiladi($Fristyear,$Fristmonth,1);
//        $endMIladiDate1 = $this->CalculateMiladi($Fristyear,$Fristmonth,$tedadRoozTarikhAval);
//
//        $startMIladiDate2 = $this->CalculateMiladi($Secoundyear,$Secoundmonth,1);
//        $endMIladiDate2 = $this->CalculateMiladi($Secoundyear,$Secoundmonth,$tedadRoozTarikhDovom);
        $firstDateStart=$Fristyear.$Fristmonth.intval('0').$one;$firstDateEnd=$Fristyear.$Fristmonth.$tedadRoozTarikhAval;
        $secoundDateStart=$Fristyear.$Fristmonth.intval('0').$one;$secoundDateEnd=$Fristyear.$Fristmonth.$tedadRoozTarikhAval;
//        dump($firstDateStart,$firstDateEnd,$secoundDateStart,$secoundDateEnd);
        $avtemp1=$this->averageTemperatureDB($this->cityCode,$this->provinceCode,$firstDateStart,$firstDateEnd,$tedadRoozTarikhAval);
        $avtemp2=$this->averageTemperatureDB($this->cityCode,$this->provinceCode,$secoundDateStart,$secoundDateEnd,$tedadRoozTarikhDovom);
        $countold=powerDataEnd::where('userId',intval($this->userId))->where('year',intval($Fristyear))->where('month',intval($Fristmonth))->count('id');
        if ($Fristmonth == $Secoundmonth)
        {
//dd('hi');
            $oldData1 = powerDataEnd::where('userId',$this->userId)->where('year', $Fristyear)->where('month', $Fristmonth)->get();
            foreach ($oldData1 as $item) {
                $pwrConsumtotal1 = $InpwrConsTotal + intval($item->pwrConsTotal);
                $price1 = $price1 + intval($item->price);
                $pwrConsumPerDay = $pwrConsumtotal1 / $tedadRoozTarikhAval;
//                dump($pwrConsumtotal1,$price1,$pwrConsumPerDay,$item->pwrConsTotal);
            }
            $data1=[
                'userId'=>$this->userId,
                'pwrConsTotal'=>$pwrConsumtotal1,
                'dayQty'=>$tedadRoozTarikhAval,
                'price'=>$price1,
                'temperature'=>$avtemp1,
                'userInsert'=>Auth::user()->id,
                'dailyPwrConsum'=>$pwrConsumPerDay,
                'year'=>$Fristyear,
                'month'=>$Fristmonth
            ];
//            dd($data1,$countold);

            if ($countold > 0) {powerDataEnd::where('userId',$this->userId)->where('year', $Fristyear)->where('month', $Fristmonth)->update($data1);}
            else {powerDataEnd::create($data1);}

        }


        if ($Fristmonth < $Secoundmonth) {
//                    dd($countold);
            if ($countold > 0)
            {
//                dump($countold,$Fristyear,$Fristmonth);
                $oldData1 = powerDataEnd::where('userId',$this->userId)->where('year', $Fristyear)->where('month', $Fristmonth)->get();
                foreach ($oldData1 as $item) {
                    $pwrConsumtotal1 = intval($pwrConsumtotal1) + intval($item->pwrConsTotal);

//                   dump('w',$pwrConsumtotal1,$item->pwrConasTotal,'e');
                    $price1 = $price1 + intval($item->price);
                    $pwrConsumPerDay = $pwrConsumtotal1 / $tedadRoozTarikhAval;
               }
//                dump($pwrConsumtotal1,$price1,$pwrConsumPerDay);
            }
//            if (isset($data1))dump($data1);

            $data1 = [
                'userId'=>$this->userId,
                'pwrConsTotal' => $pwrConsumtotal1,
                'dayQty' => $tedadRoozTarikhAval,
                'price' => $price1,
                'temperature' => $avtemp1,
                'userInsert' => Auth::user()->id,
                'dailyPwrConsum' => $pwrConsumPerDay,
                'year' => $Fristyear,
                'month' => $Fristmonth
            ];
            $data2 = [
                'userId'=>$this->userId,
                'pwrConsTotal' => $pwrConsumtotal2,
                'dayQty' => $tedadRoozTarikhDovom,
                'price' => $price2,
                'temperature' => $avtemp2,
                'userInsert' => Auth::user()->id,
                'dailyPwrConsum' => $pwrConsumPerDay,
                'year' => $Secoundyear,
                'month' => $Secoundmonth
            ];
//dump($data1,$data2);
            if ($countold > 0)
            {
                powerDataEnd::where('userId',$this->userId)->where('year',$Fristyear)->where('month',$Fristmonth)->update($data1);
                powerDataEnd::create($data2);
            }
            else
            {

                powerDataEnd::create($data1);
                powerDataEnd::create($data2);
//                dd($data1,$data2,'aaaaa');
            }

//                dump($data1,$data2);
          //  }
        }
    }
    public function CalculateMiladi($year,$month,$day)
    {
        return  (new Jalalian($year, $month, $day))->toCarbon()->format('Ymd');
    }
    public function averageTemperature($longitude,$latitude,$startMIladiDate,$endMIladiDate)
    {
        $temperaters =Http::get('https://power.larc.nasa.gov/api/temporal/daily/point?parameters=T2M&community=SB&longitude='.$longitude.'&latitude='.$latitude.'&start='.$startMIladiDate.'&end='.$endMIladiDate.'&format=JSON');
        $x=array();
        foreach (json_decode($temperaters)->properties as $k=>$temperater)
        {
//            dump($temperater->T2M);
            $x=json_decode(json_encode($temperater->T2M), true);
//            dump($x);
            foreach ($x as $k=>$item)
            {
                $year=substr($k,0,4);$month=substr($k,4,2);$day=substr($k,6,2);
                $datep= CalendarUtils::strftime('Ymd',strtotime($k));
                $data=[
                    'cityCode'=>360,'provinceCode'=>8,'avtemp'=>$item,'date'=> $datep,'userInsert'=>Auth::user()->id
                ];
//                dump($data);
                TehranAvTemperature::create($data);
            }
//            return array_sum($x)/$tedadRoozTarikhAval;
        }
    }
    public function averageTemperatureDB($cityCode,$provinceCode,$startdate,$enddate,$tedadRooz)
    {
        $temperaters =TehranAvTemperature::where('cityCode',$cityCode)->where('provinceCode',$provinceCode)->where('date','>=',$startdate)->where('date','<=',$enddate)->sum('avtemp')/$tedadRooz;
        return $temperaters;
    }
    public function calculate($id)
    {
//        dd(Auth::user()->province);
//        $contData=powerDataEnd::where('year','<=',1396)->where('year','>=',1395)->count('id');
//        if ($contData == 0)
//        {
//            return redirect()->back()->with('notification',"اطلاعات آنالیز شده است لطفا صحت اطلاعات را بررسی نمایید");
//
//        }
//        else
//        {
//        dd($id);
//        $this->averageTemperatureDB(1,2,3,4,5);
//        dd();
            $province=Provinces::where('id',$this->userId)->value('title');
            $citiesDB=Provinces::find(Auth::user()->city);
            $cityDB=$citiesDB->title;
            $latitude=$citiesDB->latitude;
            $longitude=$citiesDB->longitude;
            if ($latitude == null || $longitude == null )
            {
                $latetud=Http::get('https://iran-locations-api.vercel.app/api/v1/cities?state='.$province);
//        dump(json_decode($latetud));
                foreach (json_decode($latetud)->cities as $k=>$city)
                {
                    $cities=json_decode(json_encode($city), true);
                    if (array_search(''.$cityDB.'',$cities) == true)
                    {
                        $latitude=$city->latitude;
                        $longitude=$city->longitude;
                    }
                }

                Provinces::where('id',Auth::user()->city)->update(['longitude'=>$longitude,'latitude'=>$latitude]);
            }
//            where('id','>=',3)->where('id','<=',5)->
            $data=powerData::where('userId',$this->userId)->get();
            foreach ($data as $item)
            {
                $from=$item->fromDate;
                $last=$item->toDate;

                $Fristyear=substr($from,0,4);$Fristmonth=substr($from,4,2);$Fristday=substr($from,6,2);
                $Secoundyear=substr($last,0,4);$Secoundmonth=substr($last,4,2);$Secoundday=substr($last,6,2);

                if ($Fristyear < $Secoundyear)
                {
                    $this->calcuulateEndMonthYear($Fristyear,$Fristmonth,$Fristday,$Secoundyear,$Secoundmonth,$Secoundday,$item->pwrConsTotal,$item->price,$longitude,$latitude);
                }
                if ($Fristmonth <= $Secoundmonth)
                {
                    $this->calculateAllMonth($Fristyear,$Fristmonth,$Fristday,$Secoundyear,$Secoundmonth,$Secoundday,$item->pwrConsTotal,$item->price,$longitude,$latitude);
                }

            }
//            $startMIladiDate = $this->CalculateMiladi(1395,1,1);
//            $endMIladiDate = $this->CalculateMiladi(1402,3,28);

//        $startMIladiDate2 = $this->CalculateMiladi(1395,2,1);
//        $endMIladiDate2 = $this->CalculateMiladi(1395,2,31);
//            $this->averageTemperature($longitude,$latitude,$startMIladiDate,$endMIladiDate);
        }


//    }
    public function energyLicense($r,$cityStatus)
    {
        if ($cityStatus == 1)
        {
            if ($r <= 1) return 'A';if ($r > 1 && $r <=2 ) return 'B';
            if ($r > 2 && $r <= 2.9) return 'C';if ($r > 2.9 && $r <=3.9 ) return 'D';
            if ($r > 3.9 && $r <= 4.8) return 'E';if ($r > 4.8 && $r <= 5.8 ) return 'F';
            if ($r > 5.8 && $r <= 6.7) return 'G';if ($r > 6.7  ) return 'برچسب انرژی تعلق نمی گیرد';
        }
        if ($cityStatus == 2)
        {
            if ($r <= 1) return 'A';if ($r > 1 && $r <=2 ) return 'B';
            if ($r > 2 && $r <= 3) return 'C';if ($r > 3 && $r <=3.8 ) return 'D';
            if ($r > 3.8 && $r <= 4.9) return 'E';if ($r > 4.9 && $r <= 5.8 ) return 'F';
            if ($r > 5.8 && $r <= 6.8) return 'G';if ($r > 6.8  ) return 'برچسب انرژی تعلق نمی گیرد';
        }
        if ($cityStatus == 3)
        {
            if ($r <= 1) return 'A';if ($r > 1 && $r <= 1.5 ) return 'B';
            if ($r > 1.5 && $r <= 2.1) return 'C';if ($r > 2.1 && $r <=2.6 ) return 'D';
            if ($r > 2.6 && $r <= 3.1) return 'E';if ($r > 3.1 && $r <= 3.7 ) return 'F';
            if ($r > 3.7 && $r <= 4.2) return 'G';if ($r > 4.2  ) return 'برچسب انرژی تعلق نمی گیرد';
        }
        if ($cityStatus == 4)
        {
            if ($r <= 1) return 'A';if ($r > 1 && $r <= 1.8 ) return 'B';
            if ($r > 1.8 && $r <= 2.6) return 'C';if ($r > 2.6 && $r <=3.4 ) return 'D';
            if ($r > 3.4 && $r <= 4.2) return 'E';if ($r > 4.2 && $r <= 5 ) return 'F';
            if ($r > 5 && $r <= 5.7) return 'G';if ($r > 5.7  ) return 'برچسب انرژی تعلق نمی گیرد';
        }
    }

    public function python()
    {
      echo shell_exec('/');
    }
    public function render()
    {
//        dd($this->userId);
        dump($this->python());
        $arr=array();
        $y1=array();
        $sei=$sei1=$sei2=$seiAv=$seiIdeal=$r=$cityCoStatus=$sei3=0;
        if ($this->userId) {$mm=User::where('user_id',$this->userId)->value('mm2');}
        $users=User::get();
        $lastYear=powerDataEnd::where('userId',$this->userId)->max('year');
        $firstYear=powerDataEnd::where('userId',$this->userId)->min('year');
        $secondYear=$firstYear+1;
        $thirdYear=$secondYear+1;

//        $firstYear=$lastYear-3;
        $startYear=$lastYear-3;

        $totalconsumfor2year=powerData::where('userId',$this->userId)->where('fromDate','>',$startYear*10000)->where('fromDate','<',$lastYear*10000)->sum('pwrConsTotal');
        $mm=User::where('user_id',$this->userId)->value('mm2');

        $countYear=powerData::where('userId',$this->userId)->distinct()->count('year');

        $maintitle='داشبورد';
        $pagedescription='جدول مصرف انرژی';

        $tableParameters=powerData::where('userId',$this->userId)->paginate(12);
        $tableParameters1=powerDataEnd::where('userId',$this->userId)->orderBy('year')->orderBy('month')->get();
        $dailyPower=powerData::where('userId',$this->userId)->groupBy('temperature')->get();


        $tableEnd=powerDataEnd::where('userId',$this->userId)->orderBy('year')->orderBy('month')->paginate(12);
        $chartData=powerDataEnd::where('userId',$this->userId)->get();
        $datapoints1=array();
        $datapoints2=array();
//        $keys
        foreach ($chartData as $k=>$item)
        {
            $date=intval($item->year.$item->month);
//            $datapoints1=array("x"=>$item->year,"y"=>$item->pwrConsTotal);
            $dataPoints1[$k] = ["label:"=> $item->year,	"y:"=> $item->pwrConsTotal,];
            $dataPoints2[$k] = ["label:"=> $item->year,	"y:"=> $item->temperature,];
        }
        $cityCo='';
//        dump($firstYear,$secondYear,$thirdYear);

        if ($this->userId)$Fc1=fcTable::where('year',$firstYear)->value('fc');
        if ($this->userId)$Fc2=fcTable::where('year',$secondYear)->value('fc');
        if ($this->userId)$Fc3=fcTable::where('year',$thirdYear)->value('fc');
        if ($this->userId)$sei1=powerDataEnd::where('userId',$this->userId)->where('year',$firstYear)->sum('dailyPwrConsum')/$mm*$Fc1;
        if ($this->userId)$sei2=powerDataEnd::where('userId',$this->userId)->where('year',$secondYear)->sum('dailyPwrConsum')/$mm*$Fc2;
        if ($this->userId)$sei3=powerDataEnd::where('userId',$this->userId)->where('year',$secondYear)->sum('dailyPwrConsum')/$mm*$Fc3;
        $sei=$sei1+$sei2+$sei3;
        $seiAv=$sei/3;
        if ($this->userId){$province=User::where('user_id',$this->userId)->value('province');$this->provinceCode=$province;}
        if ($this->userId){$city=User::where('user_id',$this->userId)->value('city');$this->cityCode=$city;}
        if ($this->userId)$provinceCo=Provinces::where('parent',0)->where('id',$province)->value('coeficent');
        if ($this->userId)$cityCoStatus=Provinces::where('id',$city)->value('region');
        if ($cityCoStatus == 1) $cityCo=regionCoefficent::value('veryHot');
        if ($cityCoStatus == 2) $cityCo=regionCoefficent::value('verycold');
        if ($cityCoStatus == 3) $cityCo=regionCoefficent::value('mediumHotCold');
        if ($cityCoStatus == 4) $cityCo=regionCoefficent::value('lowHotCold');
        if ($this->userId)$seiIdeal=$provinceCo*$cityCo;
//        dump($provinceCo,$cityCo,$seiIdeal);

        if ($this->userId)$r=$seiAv / $seiIdeal;
        if ($this->userId)$potential=($r-1)*100;
        $energyGrade=$this->energyLicense($r,$cityCoStatus);


        return view('livewire.dashboard-component',get_defined_vars())->layout('layouts.admin');
    }
}
