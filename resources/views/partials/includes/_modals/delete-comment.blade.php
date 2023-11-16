<div class="modal fade" id="delete_comment_modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" id="delete-comment-form" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{--                {{ method_field('DELETE') }}--}}
                <div class="modal-header">
                    <button type="button" class="close shadow-lg" data-dismiss="modal" aria-hidden="true">×</button>
                    {{--                    <h4 class="modal-title" id="deleteModalLabel">--}}
                    {{--                        {{ trans('modal_delete.are_you_sure_you_want_to_delete') }} ?--}}
                    {{--                    </h4>--}}
                </div>

                <div class="modal-body" id="modal-body">
                    {{-- Form to Trash purchaseRequest --}}
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        {{--                        @method('put')--}}

                        <label for="" class="label-comment">@lang('site.reason_all') </label>
                        <textarea name="comment" required class="form-control input-comment mb-3" id="modal-body"
                                  cols="30" rows="10"></textarea>

                        <input type="file" required name="file" class="form-control mb-4">

                        <button type="button" class="btn btn-outline-dark shadow-lg"
                                data-dismiss="modal"> @lang('site.No') ,
                            @lang('site.Cancel')
                        </button>

                        <button type="submit" class="btn btn-outline-dark send-po shadow-lg"> @lang('site.Yes')
                            ,@lang('site.Approve') <span
                                id="action-btn-text"></span>
                        </button>
                    </form>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
