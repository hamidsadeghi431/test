<?php

namespace App\Http\Livewire\Province;

use App\Models\Provinces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddProvinceComponent extends Component
{
    public $idIn;public $status;public $coefficient;public $region;public $city;public $province;
    public $action;public $provinceCode;public $latitude;public $longitude;public $active;
    protected $listeners=['getId','forcedCloseModal'];
    public function getId($id,$action)
    {
//        dd($id);
        $this->idIn=$id;
        $this->action=$action;
        if($id != 'a')
        {
//            dd('hi');
            $data=Provinces::find($id);
//            dd($data->parent);
            if ($data->parent == 0) $this->status =1;
            if ($data->parent > 0) $this->status=2;
//            dd($this->status);

//            dd($this->status);
            if ($this->status == 1)
            {
                $province=$data->title;
                $this->province=$data->title;
                $this->coefficient=$data->coeficent;
                $this->latitude=$data->latitude;
                $this->longitude=$data->longitude;
                $this->active=$data->active;
            }
            if ($this->status == 2)
            {
                $province=Provinces::where('id',$data->parent)->value('title');
                $this->city=$data->title;
                $this->provinceCode=$data->parent;
                $this->region=$data->region;
                $this->latitude=$data->latitude;
                $this->longitude=$data->longitude;
                $this->active=$data->active;
                if ($data->latitude == null || $data->longitude == null)
                {
                    $url='https://iran-locations-api.vercel.app/api/v1/cities?state='.$province;
//                                  dump($url.$province);

                    $latetud=Http::get("https://iran-locations-api.vercel.app/api/v1/cities?state=$province");
//                dump($latetud);
//                $this->latitude=$url."$province";
//        dump(json_decode($latetud));
                    foreach (json_decode($latetud)->cities as $k=>$city)
                    {

                        $cities=json_decode(json_encode($city), true);
//                    dump(array_search(''.$data->title.'',$cities));
                        if (array_search(''.$data->title.'',$cities) == true)
                        {
                            $this->latitude=$city->latitude;
                            $this->longitude=$city->longitude;
                        }


                    }
//                dd($this->longitude,$this->latitude);
                    if ($this->latitude == null)
                    {
                        $a='طول و عرض جغرافیایی برای شهر';
                        $b=$data->title;
                        $c='پیدا نشد می توانید به صورت دستی وارد کنید!';
                        return redirect()->back()->with('unsuccess',"$a $b $c");
                    }else
                    {
                        Provinces::where('id',$id)->update(['longitude'=>$this->longitude,'latitude'=>$this->latitude]);
                        $a='طول و عرض جغرافیایی برای شهر';
                        $b=$data->title;
                        $c=$this->latitude.' و ' . $this->longitude;
                        $d='پیدا شد!';
                        return redirect()->back()->with('success',"$a $b $c $d");
                    }
                }
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
                'province'=>'required',
                'coefficient'=>'required',
            ]);
        }
        if ($this->status == 2)
        {
            $this->validateOnly($fields,[
                'city'=>'required',
                'provinceCode'=>'required',
                'region'=>'required',
            ]);
        }
    }
    public function save()
    {

        if ($this->status == 1)
        {

            $this->validate([
                'province'=>'required',
                'coefficient'=>'required',
            ]);
        }
        if ($this->status == 2)
        {
            $this->validate([
                'city'=>'required',
                'provinceCode'=>'required',
                'region'=>'required',
            ]);
        }

//            $catId=categories::max('catId')+1;

            if ($this->status == 1)
            {

                $data=[
                    'title'=>$this->province,
                    'coeficent'=>$this->coefficient,
                    'longitude'=>$this->longitude,
                    'latitude'=>$this->latitude,
                    'active'=>$this->active,
                    'parent'=>0,
                    'sort'=>0
                ];
            }
            if ($this->status == 2)
            {
                $data=[
                    'title'=>$this->city,
                    'parent'=>$this->provinceCode,
                    'region'=>$this->region,
                    'longitude'=>$this->longitude,
                    'latitude'=>$this->latitude,
                    'active'=>$this->active,
                    'sort'=>0
                ];
            }

        if ($this->idIn == 'a') Provinces::create($data);
        else Provinces::where('id',$this->idIn)->update($data);

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('close_form');
        $this->cleanme();
        return redirect()->back()->with('success','عملیات با موفقیت انجام شد!');

    }
    public function cleanme()
    {
        $this->provinceCode=null;$this->city=null;$this->province=null;
        $this->region=null;$this->status=null;$this->coefficient=null;
        $this->action=null;$this->idIn=null;$this->longitude=null;$this->latitude=null;
    }
    public function render()
    {
        $provinces=Provinces::where('parent',0)->get();
        return view('livewire.province.add-province-component',get_defined_vars());
    }
}
