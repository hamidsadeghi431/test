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
                <div class="input-group mb-3">
                    <input wire:model="role" type="text" class="form-control" placeholder="تعریف نقش"  required autofocus autocomplete="role">
                    <div class="input-group-append">
                        <span class="fa fa-user-secret input-group-text"></span>
                    </div>
                </div>
                @if($errors->has('role'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-ban"></i> توجه!</h5>
                        {{ $errors->first('role') }}
                    </div>
                @endif
            {{--تکرار رمز عبور --}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button  class="btn btn-primary" wire:click="save">
                <i class="fa fa-check"></i> </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> </button>
            <span wire:loading class="spinner-grow spinner-grow-sm"></span>

        </div>

    </div>
</div>

