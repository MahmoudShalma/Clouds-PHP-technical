<div class="modal fade" id="confirm_success_modal_with_get" tabindex="-1" role="dialog"
     aria-labelledby="confirmModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" id="confirm_success_form_with_get" method="GET" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{--                {{ method_field('DELETE') }}--}}
                <div class="modal-header" style="">
                    <button type="button" class="close shadow-lg" data-dismiss="modal" aria-hidden="true">×</button>

                    <h6 class="modal-title" id="confirmModalLabel">
                        {{ trans('modal_confirm.confirm_process') }}?
                    </h6>
                </div>

                <div class="modal-body">
                    <h5 class="modal-title" id="deleteModalLabel">
                        {{ trans('modal_confirm.are_you_sure_you_want_to_confirm') }} ?
                    </h5>
                </div>
                {{--<div class="modal-body">--}}

                {{--<div class="form-group">--}}
                {{--<label>Are you sure you want to delete this for ever?</label>--}}
                {{--</div>--}}

                {{--</div>--}}
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary btn-sm shadow-lg"
                            data-dismiss="modal">{{ trans('modal_confirm.close') }}
                    </button>
                    <button type="submit" class="btn btn-success btn-sm eventBtu2 shadow-lg">
                        {{ trans('modal_confirm.confirm') }}
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
