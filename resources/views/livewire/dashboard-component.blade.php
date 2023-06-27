
<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            {{$maintitle}}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
                            <li class="breadcrumb-item active">{{$maintitle}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <!-- /.card -->
                        <div class="row">
                            {{--                    @if($accsb11)--}}
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner ">
                                        <h3 style="direction: ltr"> {{number_format($sei3,2)}} <span  style="font-size: 12px;">( kwh/m<sup>2</sup> )</span>  </h3>
                                        <p>مصرف ویژه برق سال آخر</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-clipboard"></i>
                                    </div>
{{--                                    onclick="ModalBox(this,'syskdetails/2','90%','90%')"--}}
                                    <a href="#"  class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            {{--                    @endif--}}
                            <!-- ./col -->
                            {{--                    @if($accsb12)--}}
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                       <h3 style="direction: ltr" >{{number_format($sei/3,2)}} <span  style="font-size: 12px;">( kwh/m<sup>2</sup> )</span></h3>
                                        <p>میانگین مصرف ویژه برق</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-beer"></i>
                                    </div>
{{--                                    onclick="ModalBox(this,'syskdetails/5','90%','90%')"--}}
                                    <a href="#"  class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            {{--                    @endif--}}
                            <!-- ./col -->
                            {{--                    @if($accsb13)--}}
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                    <div class="inner">
                                    <h3 class="text-white" style="direction: ltr" >{{number_format($seiIdeal,2)}} <span  style="font-size: 12px;">( kwh/m<sup>2</sup> )</span></h3>
                                        <p class="text-white">مصرف ویژه برق ایده آل</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-cog-outline"></i>
                                    </div>
{{--                                    onclick="ModalBox(this,'syskdetails/3','90%','90%')"--}}
                                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 class="text-white" >{{number_format($r,2)}}</h3>
                                        <p class="text-white">نسبت انرژی</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-cog-outline"></i>
                                    </div>
                                    {{--                                    onclick="ModalBox(this,'syskdetails/3','90%','90%')"--}}
                                    <a href="#"  class="small-box-footer text-white">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>

                            {{--                    @endif--}}
                            <!-- ./col -->
                            {{--                    @if($accsb14)--}}
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        @if($potential)<h3>{{number_format($potential,2)}}  <span  style="font-size: 20px;"></span>  درصد</h3>
                                        @else
                                            اطلاعات موجود نیست
                                        @endif

                                        <p>پتانسل صرفه جویی</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-settings"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            {{--                    @endif--}}
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">
                                        @if($energyGrade)<h3>{{$energyGrade}} </h3>
                                        @else
                                            اطلاعات موجود نیست
                                        @endif

                                        <p>برچسب انرژی</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-settings"></i>
                                    </div>
                                    <a wire:click="energyTags('{{$userId}}','{{number_format($sei,2)}}','{{number_format($sei/2,2)}}','{{number_format($r,2)}}','{{number_format($seiIdeal,2)}}','{{$mm}}','{{$energyGrade}}','{{$lastYear}}')" href="#" class="small-box-footer"> مشاهده ی برچسب انرژی <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.col -->

            </div>
{{--                @if($addpwr)--}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        افزودن مصرف
                    </h3>
                    <div class="card-tools">
                        <span wire:loading class="spinner-grow spinner-grow-sm"></span>
                        <span class="">نمایش جدول 3 دوره کاربر
                            <label class="switch">
                                <input type="checkbox" wire:model="addTune">
                                <span class="slider round"></span>
                            </label>
                        </span>
                        <span class="  p-2 ">نمایش جدول اطلاعات دریافتی از API
                            <label class="switch">
                                <input type="checkbox" wire:model="addsAPI">
                                <span class="slider round"></span>
                            </label>
                        </span>
{{--                        @if($userId != null)--}}
                        <button wire:click="deletePwrEnd('{{$userId}}')" type="button" class="btn btn-danger" >
                            حذف محاسبات کاربر
                        </button>
                        <button wire:click="calculate('{{$userId}}')" type="button" class="btn btn-warning" >
                            محاسبه اطلاعات
                        </button>
{{--                        @endif--}}
                        <button   onclick="ModalBox(this,'{{route('charts',$userId)}}','90%','90%')"  type="button" class="btn btn-success" >
                            نمایش نمودار ها
                        </button>
                        <button wire:click="addData('a','pwrConsum')" type="button" class="btn btn-primary" >
                            افزودن مصرف
                        </button>
                        <button wire:click="requestForAnalyse({{\Illuminate\Support\Facades\Auth::user()->id}})" type="button" class="btn btn-info" >
                            درخواست تحلیل انرژی
                        </button>
{{--                        <button wire:click="addData('a','pwrConsum')" class="btn btn-warning" data-toggle="modal" data-target="#addParameters"><i class="fa fa-plus"></i></button>--}}
                    </div>
                </div>
                <!-- /.card -->
                <div class="form-group col-4">
                    <label>انتخاب کاربر </label>
                    <select wire:model="userId"  class="form-control select2" style="width: 100%;">
                        <option selected="selected">--</option>
                        @foreach($users as $user) <option value="{{$user->user_id}}">{{$user->name}}</option> @endforeach

                    </select>
                    @if($errors->has('status'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                </div>

            </div>
{{--            <div id="chartContainer" style="height: 370px; width: 100%;" wire:ignore></div>--}}
{{--            <div id="chartContainer1" style="height: 370px; width: 100%;" wire:ignore></div>--}}
{{--            <div id="chartContainer2" style="height: 370px; width: 100%;" wire:ignore></div>--}}

        @if($addsAPI)@include('livewire.pwrconsum.main')@endif
            @if($addTune) @include('livewire.pwrEndConsum.main')@endif
{{--                @endif--}}
{{--                @if($addscategory)--}}
{{--                    @include('livewire.admin.product-parameters.scategory.main')--}}
{{--                @endif--}}
{{--                @if($addcolor)--}}
{{--                    @include('livewire.admin.product-parameters.color.main')--}}
{{--                @endif--}}
{{--                @if($addProductName)--}}
{{--                    @include('livewire.admin.product-parameters.productName.main');--}}
{{--                @endif--}}
{{--                @if($addBrands)--}}
{{--                    @include('livewire.admin.product-parameters.brands.main');--}}
{{--                @endif--}}
            <!-- ./row -->
            </div><!-- /.container-fluid -->



        </section>
        <!-- /.content -->
    </div>
    @include('livewire.modal')

</div>
@push('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }



    </style>

@endpush
@push('scp')
{{--    <script type="text/javascript">--}}
{{--        window.onload = function () {--}}
{{--            var chart = new CanvasJS.Chart("chartContainer",{--}}
{{--                title :{--}}
{{--                    text: "Simultanusly Power Consumption / Temperature Environment"--}}
{{--                },--}}

{{--                axisY:[--}}
{{--                    {--}}
{{--                        title: "Power Consum kWh",--}}
{{--                        lineColor: "#369EAD",--}}
{{--                        titleFontColor: "#369EAD",--}}
{{--                        labelFontColor: "#369EAD"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        title: " Temperature",--}}
{{--                    }--}}
{{--                ],--}}

{{--                data: [{--}}
{{--                    type: "column",--}}
{{--                    axisYIndex: 0, //defaults to 0--}}
{{--                    dataPoints : [--}}
{{--                            @foreach($tableParameters1 as $item)--}}
{{--                        { label: {{$item->year.$item->month}},  y: {{$item->pwrConsTotal}} },--}}
{{--                        @endforeach--}}

{{--                    ]--}}
{{--                },--}}
{{--                    {--}}
{{--                        type: "line",--}}
{{--                        axisYIndex: 1,--}}
{{--                        dataPoints : [--}}
{{--                                @foreach($tableParameters1 as $item)--}}
{{--                            { label: {{$item->year.$item->month}},  y: {{$item->temperature}}  },--}}
{{--                            @endforeach--}}

{{--                        ]--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}
{{--            var chart1 = new CanvasJS.Chart("chartContainer1",--}}
{{--                {--}}
{{--                    title:{--}}
{{--                        text: "Daily Average Power Consumption / Daily Temperature",--}}
{{--                    },--}}
{{--                    axisX:{--}}

{{--                        title: "Temperature c",--}}
{{--                        valueFormatString:  "#,##0.##",--}}
{{--                        minimum: 0,--}}
{{--                        maximum: 35--}}
{{--                    },--}}
{{--                    axisY:{--}}
{{--                        title: "Daily Power Consum Per Day kWh ",--}}
{{--                        valueFormatString:  "#,##0.##",--}}
{{--                    },--}}
{{--                    legend: {--}}
{{--                        verticalAlign: "bottom",--}}
{{--                        horizontalAlign: "left"--}}

{{--                    },--}}
{{--                    data: [--}}
{{--                        {--}}
{{--                            type: "scatter",--}}
{{--                            color: "#778899",--}}
{{--                            legendText: "Each triangle represents one person",--}}
{{--                            showInLegend: "true",--}}

{{--                            dataPoints: [--}}
{{--                                    @foreach($dailyPower as $item)--}}
{{--                                { x: {{$item->temperature}},  y: {{$item->dailyPwrConsum/$item->dayQty}} },--}}
{{--                                @endforeach--}}
{{--                                // { x: 10000, y: 1100 },--}}

{{--                            ]--}}
{{--                        }--}}
{{--                    ]--}}
{{--                });--}}
{{--            var chart2 = new CanvasJS.Chart("chartContainer2",{--}}
{{--                title :{--}}
{{--                    text: "SEI Chart"--}}
{{--                },--}}
{{--                axisX:{--}}

{{--                    title: "year",--}}

{{--                },--}}
{{--                axisY:[--}}
{{--                    {--}}
{{--                        title: "Power Consum kWh/mm2",--}}
{{--                        lineColor: "#369EAD",--}}
{{--                        titleFontColor: "#369EAD",--}}
{{--                        labelFontColor: "#369EAD"--}}
{{--                    }--}}
{{--                ],--}}

{{--                data: [{--}}
{{--                    type: "line",--}}
{{--                    title:"year",--}}
{{--                    axisYIndex: 0, //defaults to 0--}}
{{--                    dataPoints : [--}}
{{--                        { label: 1396,  y: {{$sei1}} },--}}
{{--                        { label: 1397,  y: {{$sei2}} },--}}

{{--                    ]--}}
{{--                }--}}

{{--                ]--}}
{{--            });--}}
{{--            chart.render();--}}
{{--            chart1.render();--}}
{{--            chart2.render();--}}

{{--        }--}}
{{--    </script>--}}
{{--    <script src="{{asset('admin/assets/chart/canvasjs.min.js')}}"></script>--}}
    @livewireScripts
    <script>
        window.addEventListener('show_info_form',event=>{
            $('#modal-info-tag').modal('show');
        })
        window.addEventListener('close_info_form',event=>{
            $('#modal-info-tag').modal('hide');
        })
        window.addEventListener('show-form',event=>{
            $('#modal-default').modal('show');
        })
        window.addEventListener('close_form',event=>{
            $('#modal-default').modal('hide');
        })
        window.addEventListener('show-big-modal',event=>{
            $('#modal-big').modal('show');
        })
        window.addEventListener('close-big-modal',event=>{
            $('#modal-big').modal('hide');
        })
        window.addEventListener('show-energy-tag',event=>{
            $('#modal-energy-tag').modal('show');
        })
        window.addEventListener('close-energy-tag',event=>{
            $('#modal-energy-tag').modal('hide');
        })
    </script>
    {{--    for delete modal--}}
    <script>
        window.addEventListener('opendeletemodal', event => {
            $("#modalFormDelete").modal('show');
        })
    </script>
    <script>
        window.addEventListener('closedeletemodal', event => {
            $("#modalFormDelete").modal('hide');
        })
    </script>
    {{--    for notification modal--}}
    <script>
        window.addEventListener('opennotificationModal', event => {
            $("#opennotificationModal").modal('show');
        })
    </script>
    {{--    for prevent validation bug --}}
    <script>
        $(document).ready(function(){
            $("#modal-default").on('hidden.bs.modal', function(){
                livewire.emit('forcedCloseModal');
            });
        });
    </script>
@endpush
