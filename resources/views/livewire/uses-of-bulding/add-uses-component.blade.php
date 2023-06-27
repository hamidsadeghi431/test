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
                <label>انتخاب کاربری </label>
                <select wire:model="status"  class="form-control select2" style="width: 100%;">
                    <option selected="selected">--</option>
                    <option value="1">افزودن کاربری اصلی</option>
                    <option value="2">افزودن زیر کاربری</option>
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
                    <label>انتخاب کاربری اصلی</label>
                    <select wire:model="mainusesCode"  class="form-control select2" style="width: 100%;">
                        <option selected="selected">--</option>
                        @foreach($usesofBulding as $item) <option value="{{$item->id}}">{{$item->title}}</option> @endforeach

                    </select>
                    @if($errors->has('mainusesCode'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('mainusesCode') }}
                        </div>
                    @endif
                </div>

                {{--            نام شهر--}}
                <div class="form-group">
                    <label for="exampleInputEmail1">نام زیرکاربری</label>
                    <input wire:model="slaveuses" class="form-control" id="exampleInputEmail1" placeholder="نام زیر کاربری" >
                    @if($errors->has('slaveuses'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('slaveuses') }}
                        </div>
                    @endif
                </div>

            @elseif($status == 1)
                {{--            نام استان--}}
                <div class="form-group">
                    <label for="exampleInputEmail1">نام کاربری</label>
                    <input wire:model="mainuses" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری" >
                    @if($errors->has('mainuses'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('mainuses') }}
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
