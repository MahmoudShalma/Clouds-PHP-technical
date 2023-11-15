<!-- REQUIRED SCRIPTS -->
{{-- Start first logic before optimization --}}

{{-- <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>

@if (app()->getLocale() == 'ar')
<script src="{{ asset('dist/js-rtl/bootstrap-rtl.bundle.min.js') }}"></script>
@else
<!-- Bootstrap 4 bundle -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endif

<!-- AdminLTE App -->
<script src=" {{ asset('dist/js/adminlte.min.js') }} "></script>

<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}

<!-- custom general -->
<script src=" {{ asset('dist/js/custom-general.js') }} "></script> --}}

{{-- End first logic before optimization --}}


{{-- Start second logic after optimization --}}
<script src="{{asset('dist/js/jquery-3.5.1.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

{{--@if (app()->getLocale() == 'ar')--}}
{{-- <script src=" {{ asset('dist/js-rtl/main.js') }}"></script>--}}
{{-- --}}{{-- note this file must be update if you do changes in custom general => (dist/js/custom-general.js) and use (https://javascript-minifier.com/)--}}
{{--@else--}}
{{-- <script src=" {{ asset('dist/js/main.js') }} "></script>--}}
{{-- --}}{{-- note this file must be update if you do changes in custom general => (dist/js/custom-general.js) and use (https://javascript-minifier.com/)--}}
{{--@endif--}}

<script src=" {{ asset('dist/js/main.js') }} "></script>

<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

{{--<script src=" {{ asset('dist/js/adminlte.min.js') }} "></script>--}}

<script src="{{asset('dist/js/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{asset('dist/js/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('dist/js/jquery-validate/additional-methods.js')}}"></script>
<script src="{{asset('dist/js/jquery-validate/additional-methods.min.js')}}"></script>

<script src="{{ asset('plugins/tablesorter/js/jquery.tablesorter.combined.js') }}"></script>

<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src=" {{ asset('dist/js/pusher.min.js') }} "></script>
{{--<script src="https://js.pusher.com/7.2/pusher.min.js"></script>--}}

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

{{--<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>--}}

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{--<script src="{{asset('dist/js/jquery-3.4.1.slim.min.js')}}"></script>--}}
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('dist/js/selectize.min.js')}}"></script>

<script>
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>

<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('4f0fbfe9b12c9b75a6b1', {
        cluster: 'mt1'
    });
    var count = parseInt($('.data-count').text());
    var channel = pusher.subscribe('system-version-notification');
    channel.bind('App\\Events\\SystemVersionNotification', function (data) {
        console.log(data);
        let url = "{{ route('units.edit', ':id') }}";
        url = url.replace(':id', data.id);
        $('.dropdown-notifications').append(`<div class="dropdown-divider"></div>
                <a href="${url}" class="dropdown-item">
                    <i class="fas fa-envelope dropdown-name mr-2"></i> ${data.name_en}
                    <span class="float-right dropdown-date text-muted text-sm">${data.time}</span>
                </a>`);
        count += 1;
        $('.data-count').text(count);
    });

    $('.datepicker').datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd'
    });


    $('.select2').select2();

    // Sort table
    $.extend($.tablesorter.defaults, {
        theme: 'materialize',
    });

    $(".sort-table").tablesorter();

    $(document).ready(function () {

        //Amr add supplier ajax autocomplete
        var path = "{{ route('purchase_order.supplier_get_ajax') }}";
        var path2 = "{{ route('purchase_order.supplier_get_ajax2') }}";
        var path3 = "{{ route('purchase_order.employee_get_ajax') }}";
        $('.employee_id').select2({
            placeholder: "@lang('site.Choose') @lang('site.employee')",
            ajax: {
                url: path3,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    $('.employee_id').text('');
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name_ar,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('.supplier_name').select2({
            placeholder: "@lang('site.Choose') @lang('site.supplier')",
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // $('.supplier_name').text('');
                    return {

                        results: $.map(data, function (item) {
                            return {
                                text: item.name_ar + ' - ' + '(' + item.tax_id_number + ')',
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('.supplier_name2').select2({
            placeholder: "@lang('site.Choose') @lang('site.supplier')",
            ajax: {
                url: path2,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // $('.supplier_name').text('');
                    return {

                        results: $.map(data, function (item) {
                            return {
                                text: item.name_ar + ' - ' + '(' + item.tax_id_number + ')',
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });


        // Notification Read By


        $('.notification_link').on("click", function () {
            var uuid = $(this).attr('data-notid');
            $.ajax({
                type: 'get',
                url: '{{ route("upgrade.read_by") }}',
                data: {
                    uuid: uuid
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });

        $('.supplier_name').on("change", function () {
            var _this = $(this);
            var supplier_id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '{{ route("purchase_order.supplier_id") }}',
                data: {
                    supplier_id: supplier_id
                },
                success: function (data) {
                    console.log(data.system);
                    $(".withholding").val(data.system);
                }
            });
        });


        // General Update
        $('body').on('click', '.confirm-modal', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#confirm-modal');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#otherModalLabel').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    // removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });
        // General Update
        $('body').on('click', '.other-modal', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#other-modal');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#otherModalLabel').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    // removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });


        // create modal
        $('body').on('click', '.create-modal', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#create-modal');
            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#createModalLabel').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    // removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        // create modal LG
        $('body').on('click', '.create-modal-lg', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#create-modal-lg');
            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#createModalLabelLg').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    // removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        $('body').on('click', ".delete-comment", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#delete-comment-form').attr('action', link);
            $("#delete_comment_modal").modal();
        });

        $('body').on('click', ".reject-comment", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#reject-comment-form').attr('action', link);
            $("#reject_comment_modal").modal();
        });

        // General Confirm Delete
        $('body').on('click', ".confirm_delete", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#confirm-delete-form').attr('action', link);
            $("#confirm_delete_modal").modal();
        });

        $('body').on('click', ".user_attendance", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#user-attendance-form').attr('action', link);
            $("#user_attendance_modal").modal();
        });

        $('body').on('click', ".user_physique", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#user-physique-form').attr('action', link);
            $("#user_physique_modal").modal();
        });

        // General Confirm Success
        $('body').on('click', ".confirm-success", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#confirm_success_form_with_get').attr('action', link);
            $("#confirm_success_modal_with_get").modal();
        });

        $('body').on('click', ".confirm-approve", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#confirm-success-form').attr('action', link);
            $("#confirm_success_modal").modal();
        });

        $('body').on('click', ".confirm-approvee", function (e) {

            e.preventDefault();
            var link = $(this).attr('href');
            $('#confirm-success').attr('action', link);
            $("#confirm_success").modal();
        });

        // General Confirm success
        $('body').on('click', ".confirm-success", function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            $('#confirm-success-form').attr('action', link);
            $("#confirm_success_modal").modal();
        });

        $('body').on('click', '.update-modal', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#update-modal');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#updateModalLabel').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        $('body').on('click', '.update-modal-sm', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#update-modal-sm');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#updateModalLabelSM').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        $('body').on('click', '.view-modal', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#view-modal');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#viewModalLabel').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        $('body').on('click', '.view-modal-sm', function (event) {
            event.preventDefault();
            var url, targetModal;
            url = $(this).attr('href');
            targetModal = $('#view-modal-sm');

            // Get contents
            $.ajax({
                method: 'GET',
                url: url,
                beforeSend: function () {
                    // addLoader();
                },
                success: function (data) {
                    targetModal.find('#viewModalLabelSm').text(data.title);
                    targetModal.find('.modal-body').html(data.view);
                    // Select2
                    $(".select2").select2();
                    // removeLoarder();
                },
                error: function () {

                }
            });

            // Show modal
            targetModal.modal();
        });

        $(".close").on("click", function () {
            $(".modal-body").html("");
        });

        //ckeditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        //ckeditor for multi-textarea in same page by pass class instead id
        ClassicEditor
            .create(document.querySelector('.editorClass'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });

    function customDatatableExcel() {
        var table = $('#example1').DataTable({
            lengthChange: false,
            "bPaginate": false,
            columnDefs: [{
                targets: "hiddenCols",
                visible: false
            }],
            buttons: ['copy', 'excel', {
                extend: "print",
                exportOptions: {
                    columns: ':visible'
                },
                customize: function (win) {
                    var last = null;
                    var current = null;
                    var bod = [];
                    var css = '@page { size: landscape; }',
                        head = win.document.head || win.document.getElementsByTagName(
                            'head')[0],
                        style = win.document.createElement('style');
                    style.type = 'text/css';
                    style.media = 'print';

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    } else {
                        style.appendChild(win.document.createTextNode(css));
                    }
                    head.appendChild(style);
                    win.document.body.getElementsByTagName('h1')[0].innerHTML =
                        "<h3 class='mt-2 mb-3'>" + ` <div>
                            <h6  style="margin-top: 15px;" class="float-left"> EEC-PUF-01-01</h6>
                            <img width="100px;"  src="{{ asset('dist/img/eecgroup-logo.png') }}" class="img-fluid float-right mb-3" alt="">
                         </div>`;
                }
            }, 'colvis']
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    }
</script>

<script>
    $(function () {
        // Summernote
        $('.textarea-editor').summernote()
    })
</script>

{{--<script>--}}
{{-- $(document).ready(function () {--}}
{{-- const timeout = 5000;  // 900000 ms = 15 minutes--}}
{{-- var idleTimer = null;--}}
{{-- $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {--}}
{{-- clearTimeout(idleTimer);--}}
{{-- idleTimer = setTimeout(function () {--}}
{{-- // $('.confirm_modal').modal('show');--}}
{{-- document.getElementById('logout-form').submit();--}}
{{-- }, timeout);--}}
{{-- });--}}
{{-- $("body").trigger("mousemove");--}}
{{-- });--}}
{{--</script>--}}
{!! Toastr::message() !!}

{{-- End second logic after optimization --}}
