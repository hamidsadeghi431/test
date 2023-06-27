<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            جدول مصرف 3 دوره کاربر
        </h3>

    </div>
    <div class="card-body">

{{--        <div class="card card-info">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">نمودار همزمانی مصرف برق/دمای محیط</h3>--}}

{{--                <div class="card-tools">--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                        <i class="fas fa-minus"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="chart">--}}
{{--                    <div wire:ignore id="chartContainer" style="height: 300px; width: 100%;">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.card-body -->--}}
{{--        </div>--}}
{{--        </div>--}}
{{--        <div class="card card-info">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">نمودار میانگین مصرف برق روزانه/دمای روزانه</h3>--}}

{{--                <div class="card-tools">--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                        <i class="fas fa-minus"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="chart">--}}
{{--                    <div wire:ignore id="chartContainer1" style="height: 300px; width: 100%;">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Bootstrap Switch -->
        <div class="card card-secondary">
            <div class="card-body">
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">ردیف</th>
                                <th>از ماه</th>
                                <th>تا ماه</th>
                                <th>تعداد روز</th>
                                <th>مصرف کل</th>
                                <th>مصرف روز</th>
                                <th>قیمت</th>
                                <th>دما</th>
                                <th>اصلاح</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($i=($tableParameters->currentpage()-1)* $tableParameters->perpage() + 1)

                            @foreach($tableParameters as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{substr($item->fromDate,0,4)}}/{{substr($item->fromDate,4,2)}}/{{substr($item->fromDate,6,2)}}</td>
                                    <td>{{substr($item->toDate,0,4)}}/{{substr($item->toDate,4,2)}}/{{substr($item->toDate,6,2)}}</td>
                                    <td>{{$item->dayQty}}</td>
                                    <td>{{number_format($item->pwrConsTotal)}} <span class="bg-green">kWh</span></td>
                                    <td>{{number_format($item->dailyPwrConsum)}} <span class="bg-green">kWh</span></td>
                                    <td>{{number_format($item->price)}} <span class="bg-green">ریال</span></td>
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
                        {{$tableParameters->links('tt')}}
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
