<div>
    <div class="modal-body">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <h4 class="text-center" style="font-size: 16px;"> نام نقش : <span style="color: #10707f;">{{$roles_name}}</span> </h4>
                </div>

                <div class="card-body">
                    <div class="tab-content" style="width: 700px; height: 600px;  overflow: scroll;">
                        <div class="active tab-pane" id="access1">
                            <ul data-widget="treeview">
                                @foreach($cat1 as $itemd)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        </a>
                                        {{$itemd->access_Description}}
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld1)
                                        @foreach($scat1 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage1 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach

                                    @endif
                                </ul>
                                </li>

                                @foreach($cat2 as $item)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        {{$item->access_Description}}</a>
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld3)
                                        @foreach($scat21 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})
                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage211 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{--                                                                {{$xno}}<br>--}}
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat22 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})
                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage221 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{--                                                                                                                                    {{$xno}}<br>--}}
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat23 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})
                                                    @if($xno)
                                                        @foreach($spage231 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{--                                                                                                                                    {{$item->ax_id}}<br>--}}
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach


                                    @endif
                                </ul>
                                </li>

                                @foreach($cat3 as $item)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        {{$item->access_Description}}</a>
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld7)
                                        @foreach($scat31 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($spage311 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat32 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($spage321 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                </li>
                                @foreach($cat4 as $item)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        {{$item->access_Description}}</a>
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld10)
                                        @foreach($scat41 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess1 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage411 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                </li>
                                @foreach($cat5 as $item)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        {{$item->access_Description}}</a>
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld12)
                                        @foreach($scat51 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage511 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat52 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage521 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat53 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage531 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                        @foreach($scat54 as $itemd)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$itemd->ax_id}}" value="{{$itemd->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$itemd->access_Description}}
                                                <ul class="treeview-menu">
                                                    @php($xno=${"fld$itemd->ax_id"})

                                                    @if($xno)
                                                        @foreach($commAcess as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                        @foreach($spage541 as $item)
                                                            <li>&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <label class="switch">
                                                                    <input wire:model="fld{{$itemd->access_tree}}{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label> </a>
                                                                {{$itemd->access_tree}}{{$item->ax_id}}=
                                                                {{$item->access_Description}}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                @foreach($cat6 as $item)
                                    <li style="color: #721c24;font-size: 16px;"><i class="fa fa-plus"></i>
                                        <label class="switch">
                                            <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        {{$item->access_Description}}</a>
                                    </li>
                                @endforeach
                                <ul class="treeview-menu">
                                    @if($fld17)
                                        @foreach($scat6 as $item)
                                            <li>&emsp;&emsp;&emsp;
                                                <label class="switch">
                                                    <input wire:model="fld{{$item->ax_id}}" value="{{$item->ax_id}}" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label> </a>
                                                {{$item->access_Description}}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->


                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <div class="modal-footer">
        <button wire:click="save" type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i> </button>
        <button wire:click="closeend" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> </button>

    </div>
    @push('css')
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 30px;
                height: 15px;
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
                height: 8px;
                width: 8px;
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
                -webkit-transform: translateX(13px);
                -ms-transform: translateX(13px);
                transform: translateX(13px);
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
</div>
