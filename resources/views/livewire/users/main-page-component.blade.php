<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$maintitle}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/">خانه</a></li>
                            <li class="breadcrumb-item active">{{$maintitle}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <!-- /.card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title ">{{$pagedescription}}</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            @if($srch == 26)
                                <button title="جستجو" class="btn btn-primary pull-right"><i class="fa fa-search"></i> </button>
                            @else
                                <button title="جستجو" class="btn btn-primary pull-right" disabled><i class="fa fa-search"></i> </button>
                            @endif
                            @if($add == 27)
                                <button title="ایجاد عملیات جدید جهت ایجاد کاربر" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalForm"><i class="fa fa-plus"></i> </button>
                            @else
                                <button title="ایجاد عملیات جدید جهت ایجاد کاربر" class="btn btn-warning pull-right" disabled><i class="fa fa-plus"></i> </button>
                            @endif
                        </table>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center"> نام و نام خانوادگی</th>
                                <th class="text-center">ایمیل</th>
                                <th class="text-center">شماره تماس</th>
                                {{--                            <th>نوع الزامات</th>--}}
                                <th class="text-center">نوع نقش</th>
                                <th class="text-center">اصلاح</th>
                                <th class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                            @dump($users)--}}
{{--                            @php($i=($users->currentpage()-1)* $users->perpage() + 1)--}}
                                @php($i=1)

                            @foreach($users as $item)
                                <tr>
{{--                                                                        @dump($item->roleObj)--}}
                                    <td class="text-center">{{$i++}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->email}}</td>
                                    <td class="text-center">{{$item->mobile}} </td>
                                    <td class="text-center">{{$item->roleObj->role_name}}</td>
                                    @if($edit == 28)
                                        <td class="text-center"><button wire:click="selectItem({{$item->id}},'update')" class="btn btn-primary"><i class="fa fa-edit"></i></button> </td>
                                    @else
                                        <td class="text-center"><button disabled class="btn btn-primary"><i class="fa fa-edit"></i></button> </td>
                                    @endif
                                    @if($del == 29)
                                        <td class="text-center "><button wire:click="selectItem({{$item->id}},'delete')" class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                                    @else
                                        <td class="text-center"><button disabled class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="card-footer clearfix">
                            {{--                                                        {{$users->links('tt')}}--}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- Modal Create Excel Table -->
@include('livewire.users.modal')


    @push('scp')
        <script>
            window.addEventListener('closeModal', event => {
                $("#modalForm").modal('hide');
            })
        </script>
        <script>
            window.addEventListener('openModal', event => {
                $("#modalForm").modal('show');
            })
        </script>
        <script>
            window.addEventListener('openModal2', event => {
                $("#modalFormAddHead").modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeModal2', event => {
                $("#modalFormAddHead").modal('hide');
            })
        </script>
        <script>
            window.addEventListener('opennotificationModal', event => {
                $("#opennotificationModal").modal('show');
            })
        </script>
        <script>
            window.addEventListener('openDeleteModal', event => {
                $("#modalFormDelete").modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeDeleteModal', event => {
                $("#modalFormDelete").modal('hide');
            })
        </script>
        <script>
            window.addEventListener('openDeleteModalheadexcel', event => {
                $("#modalFormDeleteHeadExcel").modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeDeleteModalheadexcel', event => {
                $("#modalFormDeleteHeadExcel").modal('hide');
            })
        </script>
        <script>
            $(document).ready(function(){
                $("#modalForm").on('hidden.bs.modal', function(){
                    livewire.emit('forcedCloseModal');
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#modalFormAddHead").on('hidden.bs.modal', function(){
                    livewire.emit('forcedCloseModalhead');
                });
            });
        </script>

    @endpush
    @push('css')
    @endpush
</div>
