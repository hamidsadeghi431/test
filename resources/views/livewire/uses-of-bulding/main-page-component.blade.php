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
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    {{$pagedescription}}
                                </h3>
                                <div class="card-tools">
                                    <button wire:click="selectItem('a','addCity')" type="button" class="btn btn-primary" >
                                        افزودن کاربری ها
                                    </button>
                                    <button wire:click="selectItem('a','addCity')" class="btn btn-warning" data-toggle="modal" data-target="#addParameters"><i class="fa fa-plus"></i>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr class="expandable-body">
                                                    <td>
                                                        <div class="p-0">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                @foreach($mainTable as $k=>$item)
                                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                                        <td>
                                                                            {{$item->id}}
                                                                            <button  type="button" class="btn btn-primary p-0">
                                                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                            </button>
                                                                            {{$item->title}}
                                                                        </td>
                                                                        <td>
                                                                            <button wire:click="selectItem({{$item->id}},'update')" class="btn btn-primary"><i class="fa fa-edit"></i> </button>
                                                                        </td>
                                                                        <td>
                                                                            <button wire:click="selectItem({{$item->id}},'delete')" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="expandable-body">
                                                                        <td>
                                                                            <div class="p-0">
                                                                                <table class="table table-hover">
                                                                                    <tbody>
                                                                                    @foreach(\App\Models\usesesOfBulding::where('parents','!=',0)->where('parents',$k+1)->get() as $item1)
                                                                                        <tr>
                                                                                            <td>{{$item1->id}}-{{$item1->title}}</td>
                                                                                            <td>
                                                                                                <button wire:click="selectItem({{$item1->id}},'update')"  class="btn btn-primary"><i class="fa fa-edit"></i> </button>
                                                                                            </td>
                                                                                            <td>
                                                                                                <button wire:click="selectItem({{$item1->id}},'delete')"  class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer clearfix">
                                            {{$mainTable->links('tt')}}
                                        </div>
                                    </div>


                                    <!-- /.card -->
                                </div>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                </div>
                <!-- /.col -->

            </div>
            {{--                @if($addpwr)--}}
            {{--                @include('livewire.pwrconsum.main')--}}
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

    @include('livewire.uses-of-bulding.modal')


    </section>
    <!-- /.content -->
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
    <!-- Select2 -->


    <script>
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

    </div>
