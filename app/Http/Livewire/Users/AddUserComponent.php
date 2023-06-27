<?php

namespace App\Http\Livewire\Users;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Provinces;
use App\Models\User;
use App\Models\user\roleAll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddUserComponent extends Component
{
    use PasswordValidationRules;
    public $first_name;public $last_name;public $username;public $mobile;public $role;
    public $email;public $password;public $password_confirmation;public $updId;public $city;public $province;public $phone;
    public $address;public $aianArea;public $UsefulArea;public $InternationalIDBuldiing;public $postalCode;
    protected $listeners=['getId','forcedCloseModal'];
    protected $validationAttributes=['role'=>'"نوع نقش"'];
    public function getId($id)
    {
        $this->updId=$id;
        $data=User::find($id);
        $this->first_name=$data->name;
        $this->email=$data->email;
        $this->role=$data->role;
        $this->phone=$data->phone;
        $this->mobile=$data->mobile;
        $this->aianArea=$data->aianArea;
        $this->UsefulArea=$data->mm2;
        $this->InternationalIDBuldiing=$data->InternationalIDBuldiing;
        $this->postalCode=$data->postalCode;
        $this->province=$data->province;
        $this->city=$data->city;
        $this->address=$data->address;
    }
    public function forcedCloseModal()
    {
        $this->clearData();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function updated($fileds)
    {
        if ($this->updId)
        {
            $this->validateOnly($fileds,[
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'username' => ['required', $this->updId ? Rule::unique('users')->ignore($this->updId) : 'unique:users ,username', 'max:255','string'],
                'email' => ['required', $this->updId ? Rule::unique('users')->ignore($this->updId) : 'unique:users ,email', 'max:255','string'],
                'mobile' => ['required', $this->updId ? Rule::unique('users')->ignore($this->updId) : 'unique:users ,mobile', 'max:255','digits:11'],
                'role'=>['required'],
            ]);
        }
        else
        {
            $this->validateOnly($fileds,[
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255',"unique:users,username"],
                'mobile' => ['required', 'max:255','digits:11',"unique:users,mobile"],
                'email' => ['required', 'string', 'max:255',"unique:users,email"],
                'password' => ['required', 'string', 'max:255',"unique:users,password"],
                'role'=>['required'],
            ]);
        }
    }
    public function save()
    {
        if ($this->updId)
        {
            $this->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'email' => ['required', $this->updId ? Rule::unique('users')->ignore($this->updId) : 'unique:users ,email', 'max:255','string'],
                'mobile' => ['required', $this->updId ? Rule::unique('users')->ignore($this->updId) : 'unique:users ,mobile', 'max:255','digits:11'],
                'role'=>['required'],
            ]);
            if ($this->password)
            {
                $data=[
                    'name' => $this->first_name,
                    'role'=>$this->role,
                    'phone'=>$this->phone,
                    'mobile' => $this->mobile,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'aianArea' => $this->aianArea,
                    'mm2' => $this->UsefulArea,
                    'InternationalIDBuldiing' => $this->InternationalIDBuldiing,
                    'postalCode' => $this->postalCode,
                    'province' => $this->province,
                    'city' => $this->city,
                    'address' => $this->address,
                    'updateUser' => Auth::user()->user_id,
                ];
            }
            else
            {
                $data=[
                    'name' => $this->first_name,
                    'role'=>$this->role,
                    'phone'=>$this->phone,
                    'mobile' => $this->mobile,
                    'email' => $this->email,
                    'aianArea' => $this->aianArea,
                    'mm2' => $this->UsefulArea,
                    'InternationalIDBuldiing' => $this->InternationalIDBuldiing,
                    'postalCode' => $this->postalCode,
                    'province' => $this->province,
                    'city' => $this->city,
                    'address' => $this->address,
                    'updateUser' => Auth::user()->user_id,
                ];
            }
            User::find($this->updId)->update($data);
        }
        else
        {
            $x=User::max('user_id');
            $this->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'max:255','digits:11',"unique:users,mobile"],
                'email' => ['required', 'string', 'max:255',"unique:users,email"],
                'role'=>['required'],
                'password' => ['required', 'string', 'max:255',"unique:users,password"],
            ]);

            $data=[
                'user_id'=>$x+1,
                'name' => $this->first_name,
                'role'=>$this->role,
                'phone'=>$this->phone,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'aianArea' => $this->aianArea,
                'mm2' => $this->UsefulArea,
                'InternationalIDBuldiing' => $this->InternationalIDBuldiing,
                'postalCode' => $this->postalCode,
                'province' => $this->province,
                'city' => $this->city,
                'address' => $this->address,
                'insertUser' => Auth::user()->user_id,
            ];
//            dd($data);
            User::create($data);
        }
        $this->clearData();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshParent');
    }
    public function clearData()
    {
        $this->first_name = null;
        $this->role = null;
        $this->phone = null;
        $this->mobile = null;
        $this->email = null;
        $this->password = null;
        $this->aianArea = null;
        $this->UsefulArea = null;
        $this->InternationalIDBuldiing = null;
        $this->postalCode = null;
        $this->province = null;
        $this->city = null;
        $this->address = null;
    }
    public function render()
    {
        $rolall=roleAll::get();
        $provincesAll=Provinces::where('parent',0)->get();
        $CityAll=Provinces::where('parent',$this->province)->get();

        return view('livewire.users.add-user-component',get_defined_vars());
    }
}
