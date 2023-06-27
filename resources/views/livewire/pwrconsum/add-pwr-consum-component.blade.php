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
{{--            انتخاب کاربر --}}
                <div class="form-group">
                    <label>انتخاب کاربری</label>
                    <select wire:model="userId"  class="form-control select2" style="width: 100%;">
                        <option selected="selected">--</option>
                        @foreach($users as $item)
                            <option value="{{$item->user_id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cat_id'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('cat_id') }}
                        </div>
                    @endif
                </div>

                {{--            از ماه--}}
            <div class="form-group">
                <label for="exampleInputEmail1">از ماه</label>
                <input wire:model="fromDate" class="form-control" id="exampleInputEmail1" placeholder="از ماه" >
                @if($errors->has('fromDate'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('fromDate') }}
                    </div>
                @endif
            </div>
{{-- تا ماه--}}
            <div class="form-group">
                    <label for="exampleInputEmail1">تا ماه</label>
                    <input wire:model="toDate" class="form-control" id="exampleInputEmail1" placeholder="تا ماه" >
                    @if($errors->has('toDate'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('toDate') }}
                        </div>
                    @endif
                </div>
{{--     تعداد روز       --}}
            <div class="form-group">
                    <label for="exampleInputEmail1">تعداد روز </label>
                    <input wire:model="dayQty" class="form-control" id="exampleInputEmail1" placeholder="تعداد روز" >
                    @if($errors->has('dayQty'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('dayQty') }}
                        </div>
                    @endif
                </div>
{{--         مصرف کل       --}}
            <div class="form-group">
                    <label for="exampleInputEmail1">مصرف کل</label>
                    <input wire:model="pwrConsTotal" class="form-control" id="exampleInputEmail1" placeholder="مصرف کل" >
                    @if($errors->has('pwrConsTotal'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('pwrConsTotal') }}
                        </div>
                    @endif
                </div>
{{--         مصرف روز       --}}
{{--            <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">مصرف روز</label>--}}
{{--                    <input wire:model="dailyPwrConsum" class="form-control" id="exampleInputEmail1" placeholder="مصرف روز" >--}}
{{--                    @if($errors->has('dailyPwrConsum'))--}}
{{--                        <div class="alert alert-danger alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>--}}
{{--                            {{ $errors->first('dailyPwrConsum') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--         قیمت       --}}
            <div class="form-group">
                    <label for="exampleInputEmail1">قیمت</label>
                    <input wire:model="price" class="form-control" id="exampleInputEmail1" placeholder="قیمت" >
                    @if($errors->has('price'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>
{{--          دما      --}}
{{--            <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">دما</label>--}}
{{--                    <input wire:model="temperature" class="form-control" id="exampleInputEmail1" placeholder="دما" >--}}
{{--                    @if($errors->has('temperature'))--}}
{{--                        <div class="alert alert-danger alert-dismissible">--}}
{{--                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>--}}
{{--                            {{ $errors->first('temperature') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}

        </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button  class="btn btn-primary" wire:click="save"><i class="fa fa-check"></i> </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> </button>
    </div>

</div>
</div>
