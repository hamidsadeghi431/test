<?php

namespace App\Http\Livewire\Pwrconsum;

use App\Models\powerData;
use App\Models\Provinces;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class AddPwrConsumComponent extends Component
{
    public $idIn;public $fromDate;public $toDate;public $pwrConsTotal;public $dayQty;
    public $price;public $temperature;public $userId;public $dailyPwrConsum;
    protected $listeners=['getId','forcedCloseModal'];

    public function getId($id)
    {
        $this->idIn=$id;
        if($id != 'a')
        {
            $data = powerData::find($id);
            $this->userId=$data->userId;
            $this->fromDate=$data->fromDate;
            $this->toDate=$data->toDate;
            $this->pwrConsTotal=$data->pwrConsTotal;
            $this->dailyPwrConsum=$data->dailyPwrConsum;
            $this->dayQty=$data->dayQty;
            $this->price=$data->price;
            $this->temperature=$data->temperature;
        }
    }
    public function forcedCloseModal(){
        $this->cleanme();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'fromDate'=>'required', 'toDate'=>'required','pwrConsTotal'=>'required', 'dayQty'=>'required',
            'price'=>'required',  'userId'=>'required'
        ]);
    }
    public function save()
    {
//        dd($this->idIn);
//dd('hi');
        $this->validate([
            'fromDate'=>'required', 'toDate'=>'required','pwrConsTotal'=>'required', 'dayQty'=>'required',
            'price'=>'required', 'userId'=>'required'
        ]);
        if($this->idIn == 'a')
        {
//            $catId=categories::max('catId')+1;

            $data=[
                'userId'=>$this->userId,
                'fromDate'=>$this->fromDate,
                'toDate'=>$this->toDate,
                'pwrConsTotal'=>$this->pwrConsTotal,
                'dailyPwrConsum'=>$this->pwrConsTotal/$this->dayQty,
                'dayQty'=>$this->dayQty,
                'price'=>$this->price*$this->pwrConsTotal,
                'userInsert'=>Auth::user()->id
            ];
            powerData::create($data);
        }
        else
        {
            $data=[
                'userId'=>$this->userId,
                'fromDate'=>$this->fromDate,
                'toDate'=>$this->toDate,
                'pwrConsTotal'=>$this->pwrConsTotal,
                'dailyPwrConsum'=>$this->pwrConsTotal/$this->dayQty,
                'dayQty'=>$this->dayQty,
                'price'=>$this->price*$this->pwrConsTotal,
                'userUpdate'=>Auth::user()->id
            ];
            powerData::find($this->idIn)->update($data);
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('close_form');
        $this->cleanme();
        return redirect()->back()->with('success','عملیات با موفقیت انجام شد!');
    }
    public function cleanme()
    {
        $this->idIn=null;$this->fromDate=null;$this->toDate=null;$this->dailyPwrConsum=null;
        $this->dayQty=null;$this->price=null;$this->temperature=null;$this->userId=null;
    }
    public function render()
    {
        $users=User::get();
        return view('livewire.pwrconsum.add-pwr-consum-component',get_defined_vars());
    }
}
