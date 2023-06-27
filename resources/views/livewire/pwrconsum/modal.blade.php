{{--big modal chart--}}
<div class="modal fade bd-example-modal-lg" id="modal-big" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @livewire('pwrconsum.add-pwr-consum-component')
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">افزودن استان یا شهر</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @livewire('city.add-province-component')
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
                آیا می خواهید این فایل را حذف کنید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                <button type="button" class="btn btn-primary" wire:click="delete">بله</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="opennotificationModal" tabindex="-1" aria-labelledby="modalformdeletepost" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalformdeletepost">توجه</h5>
                <button class="float-left close"><span class="pull-left" aria-hidden="true" data-dismiss="modal" aria-label="Close">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                @if(session()->has('delNotification'))
                    <div class="alert alert-danger alert-dismissible text-center">
                        <span class="spinner-grow spinner-grow-sm"></span>
                        {{--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        <h5><i class="icon fa fa-check"></i> توجه!</h5>
                        {{ session()->get('delNotification') }}
                    </div>
                    @endif
                    </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">تایید</button>
            </div>
        </div>
    </div>
</div>
