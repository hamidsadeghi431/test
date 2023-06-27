<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            جدول مصرف دریافتی از API
        </h3>

    </div>
    <div class="card-body">
        <!-- Bootstrap Switch -->
        <div class="card card-secondary">
            <div class="card-body">
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">ردیف</th>
                                <th>سال</th>
                                <th>ماه</th>
                                <th>تعداد روز</th>
                                <th> مصرف کل  <span class="bg-green">kWh</span> </th>
                                <th>  مصرف روز <span class="bg-green">kWh</span> </th>
                                <th>  قیمت <span class="bg-green">ریال</span> </th>
                                <th> دما <span class="bg-green">سانتی گراد</span></th>
                                <th>اصلاح</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($i=($tableEnd->currentpage()-1)* $tableEnd->perpage() + 1)

                            @foreach($tableEnd as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->year}}</td>
                                    <td>{{$item->month}}</td>
                                    <td>{{$item->dayQty}}</td>
                                    <td>{{$item->pwrConsTotal}} </td>
                                    <td>{{$item->dailyPwrConsum}} </td>
                                    <td>{{$item->price}} </td>
                                    <td>{{$item->temperature}}</td>
                                    {{--                                    <td>@if($item->active == 1) <button class="btn btn-success"><i class="fa fa-check"></i> </button> @else<button class="btn btn-danger"><i class="fa fa-times"></i> </button>@endif</td>--}}
                                    <td><button wire:click="addData({{$item->id}},'update')" class="btn btn-primary"><i class="fa fa-edit"></i> </button> </td>
                                    <td><button wire:click="addData({{$item->id}},'delete')" class="btn btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{$tableEnd->links('tt')}}
                    </div>
                </div>

            </div>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
    @push('scp')
    @endpush

</div>
