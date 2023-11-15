<div class="modal fade" id="confirm_success_modal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" id="confirm-success-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}


                {{--                <input type="hidden" name="approval_id" value="{{ $id }}">--}}
                <div class="modal-header">
                    <button type="button" class="close shadow-lg" data-dismiss="modal" aria-hidden="true">×</button>

                    <h6 class="modal-title" id="successModalLabel">
                        {{ trans('modal_confirm_success.are_you_sure') }}?
                    </h6>
                </div>

                {{--                {{ trans('modal_confirm_success.confirm') }}--}}

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary mr-2 ml-2 shadow-lg" data-dismiss="modal">
                        {{ trans('modal_confirm_success.close') }}
                    </button>

                    <button type="submit" class="btn btn-success mr-2 ml-2 shadow-lg">
                        {{ trans('modal_confirm_success.confirm') }}
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
