<div>
    <div class="card card-primary">
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible text-center">
                    <span class="spinner-grow spinner-grow-sm"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> توجه!</h5>
                    {{ session()->get('success') }}
                </div>
            @endif
                {{--------- نام------------}}
                <div class="input-group mb-3">
                    <input wire:model="first_name" type="text" class="form-control" placeholder="نام "  required autofocus autocomplete="first_name">
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('first_name'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                {{---------  نام خانوادگی------------}}

                {{--  نام کاربری--}}

                {{--نقش کاربر--}}
                <div class="input-group mb-3">
                    <select wire:model="role" class="form-control" tabindex="-1">
                        <option>نام نقش</option>
                        @foreach($rolall as $key => $item)
                            <option value="{{$item->role_id}}">{{$item->role_name}}</option>
                        @endforeach
                    </select>
                    </select>
                    <div class="input-group-append">
                        <span class="fa fa- input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('role'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('role') }}
                    </div>
                @endif
                {{--تلفن  ثابت --}}
                <div class="input-group mb-3">
                    <input wire:model="phone" type="text" class="form-control" placeholder=" تلفن ثابت" >

                    <div class="input-group-append">
                        <span class="fa fa-phone input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('phone'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                {{--شماره موبایل--}}
                <div class="input-group mb-3">
                    <input wire:model="mobile" type="text" class="form-control" placeholder="شماره تلفن"  required autofocus autocomplete="mobile">
                    <div class="input-group-append">
                        <span class="fa fa-mobile input-group-text text-success"></span>
                    </div>
                </div>
                @if($errors->has('mobile'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                {{--ایمیل --}}
                <div class="input-group mb-3">
                    <input wire:model="email" type="email" class="form-control" placeholder="ایمیل" >

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('email') }}
                    </div>
                @endif
                {{--رمز عبور --}}
                <div class="input-group mb-3">
                    <input  wire:model="password" type="text" class="form-control" placeholder="رمز عبور"  required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="fa fa-key input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('password'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('password') }}
                    </div>
                @endif
                {{--مساحت اعیان --}}
                <div class="input-group mb-3">
                    <input wire:model="aianArea" type="text" class="form-control" placeholder="مساحت اعیان" >

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('aianArea'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('aianArea') }}
                    </div>
                @endif
                {{--مساحت مفید --}}
                <div class="input-group mb-3">
                    <input wire:model="UsefulArea" type="text" class="form-control" placeholder="مساحت مفید" >

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('UsefulArea'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('UsefulArea') }}
                    </div>
                @endif
                {{-- شناسه ملی ساختمان --}}
                <div class="input-group mb-3">
                    <input wire:model="InternationalIDBuldiing" type="text" class="form-control" placeholder="شناسه ملی ساختمان" >

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('InternationalIDBuldiing'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('InternationalIDBuldiing') }}
                    </div>
                @endif
                {{-- کد پستی --}}
                <div class="input-group mb-3">
                    <input wire:model="postalCode" type="text" class="form-control" placeholder="کد پستی" >

                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('postalCode'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('postalCode') }}
                    </div>
                @endif
                {{-- استان --}}
                <div class="input-group mb-3">
                    <select wire:model="province" class="form-control" tabindex="-1">
                        <option>استان</option>
                        @foreach($provincesAll as $key => $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    </select>
                    <div class="input-group-append">
                        <span class="fa fa-user-secret input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('province'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('province') }}
                    </div>
                @endif
                {{-- شهر--}}
                <div class="input-group mb-3">
                    <select wire:model="city" class="form-control" tabindex="-1">
                        <option>شهر</option>
                        @foreach($CityAll as $key => $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    </select>
                    <div class="input-group-append">
                        <span class="fa fa-user-secret input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('city'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <div class="form-group">
                    <textarea wire:model="address" class="form-control" rows="3" placeholder="آدرس ..."></textarea>
                    @if($errors->has('address'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>

                {{--تکرار رمز عبور --}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button  class="btn btn-primary" wire:click="save">
                <i class="fa fa-check"></i> </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> </button>
            <span wire:loading class="spinner-grow spinner-grow-sm"></span>

        </div>

    </div>
</div>

