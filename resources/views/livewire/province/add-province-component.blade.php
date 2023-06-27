<div>
    <div class="card card-primary">
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> توجه!</h5>
                    {{ session()->get('success') }}
                </div>
            @endif
                @if(session()->has('unsuccess'))
                    <div class="alert alert-danger alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> توجه!</h5>
                        {{ session()->get('unsuccess') }}
                    </div>
                @endif
                <div class="form-group">
                    <label>انتخاب منطقه {{$latitude,$longitude}}</label>
                    <select wire:model="status"  class="form-control select2" style="width: 100%;">
                        <option selected="selected">--</option>
                        <option value="1">استان</option>
                        <option value="2">شهر</option>
                    </select>
                    @if($errors->has('status'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                </div>

                @if($status == 2)
                    {{--            انتخاب منطقه --}}

                    <div class="form-group">
                        <label>انتخاب استان</label>
                        <select wire:model="provinceCode"  class="form-control select2" style="width: 100%;">
                            <option selected="selected">--</option>
                            @foreach($provinces as $province) <option value="{{$province->id}}">{{$province->title}}</option> @endforeach

                        </select>
                        @if($errors->has('provinceCode'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('provinceCode') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>انتخاب منطقه</label>
                        <select wire:model="region"  class="form-control select2" style="width: 100%;">
                            <option selected="selected">--</option>
                            <option value="1"> گرمایش زیاد</option>
                            <option value="2">سرمایش زیاد</option>
                            <option value="3">گرمایش و یا سرمایش متوسط</option>
                            <option value="4">گرمایش و یا سرمایش کم</option>
                        </select>
                        @if($errors->has('region'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('region') }}
                            </div>
                        @endif
                    </div>
                    {{--            نام شهر--}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام شهر</label>
                        <input wire:model="city" class="form-control" id="exampleInputEmail1" placeholder="نام شهر" >
                        @if($errors->has('city'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">عرض جغرافیایی (latitude)</label>
                        <input wire:model="latitude" class="form-control" id="exampleInputEmail1" placeholder="عرض جغرافیایی (latitude)" >
                        @if($errors->has('latitude'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('latitude') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">طول جغرافیایی (longitude)</label>
                        <input wire:model="longitude" class="form-control" id="exampleInputEmail1" placeholder="طول جغرافیایی (longitude)" >
                        @if($errors->has('longitude'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('longitude') }}
                            </div>
                        @endif
                    </div>
                @elseif($status == 1)
                    {{--            نام استان--}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام استان</label>
                        <input wire:model="province" class="form-control" id="exampleInputEmail1" placeholder="نام استان" >
                        @if($errors->has('province'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('province') }}
                            </div>
                        @endif
                    </div>
                    {{--             ضریب--}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">ضریب</label>
                        <input wire:model="coefficient" class="form-control" id="exampleInputEmail1" placeholder="ضریب" >
                        @if($errors->has('coefficient'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('coefficient') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">عرض جغرافیایی (latitude)</label>
                        <input wire:model="latitude" class="form-control" id="exampleInputEmail1" placeholder="عرض جغرافیایی (latitude)" >
                        @if($errors->has('latitude'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('latitude') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">طول جغرافیایی (longitude)</label>
                        <input wire:model="longitude" class="form-control" id="exampleInputEmail1" placeholder="طول جغرافیایی (longitude)" >
                        @if($errors->has('longitude'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                                {{ $errors->first('longitude') }}
                            </div>
                        @endif
                    </div>
                @endif
                <div class="  p-2 d-inline">فعال
                    <label class="switch ">
                        <input type="checkbox"wire:model="active" >
                        <span class="slider round"></span>
                    </label>
                </div>
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
