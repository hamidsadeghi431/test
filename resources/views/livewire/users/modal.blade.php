<div class="modal fade " id="modalForm" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                @livewire('users.add-user-component')
            </div>

        </div>
    </div>
</div>
<!-- Modal Create Head of Excel -->
<div class="modal fade bd-example-modal-lg" id="modalFormAddHead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                {{--                    @livewire('import-data.post-import-data-head-excel-component')--}}
            </div>
            <div class="modal-footer">
                <button wire:click="closeend" type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
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
