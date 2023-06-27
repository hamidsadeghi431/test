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
                        <h3 class="card-title">{{$pagedescription}}</h3>
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
                                <button title=" تعریف نقش" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalForm"><i class="fa fa-plus"></i> </button>
                            @else
                                <button title=" تعریف نقش" class="btn btn-warning pull-right" disabled><i class="fa fa-plus"></i> </button>
                            @endif
                        </table>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center">نقش</th>
                                {{--                            <th>نوع الزامات</th>--}}
                                <th class="text-center">اعمال سطح دسترسی</th>
                                <th class="text-center">اصلاح</th>
                                <th class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @php($i=($users->currentpage()-1)* $users->perpage() + 1)--}}
@php($i=0)
                            @foreach($users as $item)
                                <tr>
                                    <td class="text-center">{{$i++}}</td>
                                    <td class="text-center">{{$item->role_name}} </td>
                                    @if($addAx == 48)
                                        <td class="text-center"><button wire:click="selectItem({{$item->role_id}},'addaccess')" class="btn btn-success"><i class="fa fa-key"></i></button> </td>
                                    @else
                                        <td class="text-center"><button disabled class="btn btn-success"><i class="fa fa-key"></i></button> </td>
                                    @endif
                                    @if($edit == 28)
                                        <td class="text-center"><button wire:click="selectItem({{$item->role_id}},'update')" class="btn btn-primary"><i class="fa fa-edit"></i></button> </td>
                                    @else
                                        <td class="text-center"><button disabled class="btn btn-primary"><i class="fa fa-edit"></i></button> </td>
                                    @endif
                                    @if($del == 29)
                                        <td class="text-center"><button wire:click="selectItem({{$item->role_id}},'delete')" class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                                    @else
                                        <td class="text-center"><button disabled class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="card-footer clearfix">
{{--                            {{$users->links('tt')}}--}}
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
    <div class="modal fade " id="modalForm" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    @livewire('users.permission.add-role-component')
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Create Head of Excel -->
    <div class="modal fade bd-example-modal-lg" id="modalFormAddHead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                @livewire('users.permission.add-access-role-component')

            </div>
        </div>
    </div>
    <!-- Delete Excel Table -->
    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalformdeletepost" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalformdeletepost">حذف اطلاعات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    آیا می خواهید رکورد را حذف کنید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                    <button type="button" class="btn btn-primary" wire:click="delete">بله</button>
                </div>
            </div>
        </div>
    </div>
    {{--Notification Modal    --}}
    <div class="modal fade" id="opennotificationModal" tabindex="-1" aria-labelledby="modalformdeletepost" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalformdeletepost">توجه</h5>
                    <button class="float-left close"><span class="pull-left" aria-hidden="true" data-dismiss="modal" aria-label="Close">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        این رکورد را نمی توانید حذف کنید!<br>
                        اطلاعات موجود در قسمت بارگذاری فایل و تحلیل داده را تعیین تکلیف نمایید!
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">تایید</button>
                </div>
            </div>
        </div>
    </div>


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
            window.addEventListener('openModalFormAddHead', event => {
                $("#modalFormAddHead").modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeModalFormAddHead', event => {
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
