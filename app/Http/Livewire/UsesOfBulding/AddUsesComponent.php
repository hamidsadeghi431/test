<?php

namespace App\Http\Livewire\UsesOfBulding;

use App\Models\Provinces;
use App\Models\usesesOfBulding;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddUsesComponent extends Component
{


    public $idIn;public $status;public $coefficient;public $region;public $slaveuses;public $mainuses;
    public $action;public $mainusesCode;public $latitude;public $longitude;public $active;
    protected $listeners=['getId','forcedCloseModal'];
    public function getId($id,$action)
    {
//        dd($id);
        $this->idIn=$id;
        $this->action=$action;
        if($id != 'a')
        {
//            dd('hi');
            $data=usesesOfBulding::find($id);
//            dd($data->parent);
            if ($data->parents == 0) $this->status =1;
            if ($data->parents > 0) $this->status=2;
//            dd($this->status);

//            dd($this->status);
            if ($this->status == 1)
            {
                $province=$data->title;
                $this->mainuses=$data->title;
                $this->active=$data->active;
            }
            if ($this->status == 2)
            {
                $province=Provinces::where('id',$data->parent)->value('title');
                $this->slaveuses=$data->title;
                $this->mainusesCode=$data->parents;
                $this->active=$data->active;
            }
        }
    }
    public function forcedCloseModal(){
        $this->cleanme();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function updated($fields)
    {
        if ($this->status == 1)
        {
            $this->validateOnly($fields,[
                'mainuses'=>'required',
            ]);
        }
        if ($this->status == 2)
        {
            $this->validateOnly($fields,[
                'mainusesCode'=>'required',
                'slaveuses'=>'required',
            ]);
        }
    }
    public function save()
    {

        if ($this->status == 1)
        {

            $this->validate([
                'mainuses'=>'required',
            ]);
        }
        if ($this->status == 2)
        {
            $this->validate([
                'mainusesCode'=>'required',
                'slaveuses'=>'required',
            ]);
        }

//            $catId=categories::max('catId')+1;

        if ($this->status == 1)
        {

            $data=[
                'title'=>$this->mainuses,
                'active'=>$this->active,
                'parents'=>0,
                'orderby'=>0
            ];
        }
        if ($this->status == 2)
        {
            $data=[
                'title'=>$this->slaveuses,
                'parents'=>$this->mainusesCode,
                'active'=>$this->active,
                'orderby'=>0
            ];
        }

        if ($this->idIn == 'a') usesesOfBulding::create($data);
        else usesesOfBulding::where('id',$this->idIn)->update($data);

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('close_form');
        $this->cleanme();
        return redirect()->back()->with('success','عملیات با موفقیت انجام شد!');

    }
    public function cleanme()
    {
        $this->mainuses=null;$this->slaveuses=null;$this->mainusesCode=null;
        $this->status=null;
        $this->action=null;$this->idIn=null;
    }
    public function render()
    {
        $usesofBulding=usesesOfBulding::where('parents',0)->get();

        return view('livewire.uses-of-bulding.add-uses-component',get_defined_vars());
    }
}
