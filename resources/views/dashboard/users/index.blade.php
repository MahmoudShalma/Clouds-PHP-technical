@extends('layouts.dashboard.app')
@section('title')
@lang('dashboard.users')
@endsection
@section('css')
<!-- DataTables -->
<!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> -->
@include('partials.includes.jquery-dataTables._style')

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title')
@lang('dashboard.users')
@endslot
@slot('pagetitle')
@lang('dashboard.dashboard')
@endslot
@endcomponent

@include('partials.includes._flash_message')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('dashboard.search') }}</h5>
            </div>
            <div class="card-body mb-n3">
                <div class="row">
                    <div class="col-md-4 form-group">

                        <input type="text" name="name" id="name" placeholder="{{trans('dashboard.name')}}" style="width: 100%">

                    </div>
                    <div class="col-md-4 form-group">

                        <input type="email" name="email" id="email" placeholder="{{trans('dashboard.email')}}" style="width: 100%">

                    </div>
                    <div class="col-md-4 form-group">

                        <select name="status" id="status" class="form-control select2" style="width: 100%">

                            <option value="">{{trans('dashboard.status')}}
                            </option>
                            <option value="activate">{{trans('dashboard.activate')}}
                            </option>
                            <option value="deactivate">{{trans('dashboard.deactivate')}}
                            </option>

                        </select>

                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive">

                <table id="example1" class="table table-bordered pre-wrap text-center table-h">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('dashboard.name')</th>
                            <th>@lang('dashboard.email')</th>
                            <th>@lang('dashboard.status')</th>
                            <th>@lang('dashboard.plane')</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection

@section('script')
@include('partials.includes.jquery-dataTables._script')

<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,

            ajax: {
                url: "{{ route('dashboard.users.index') }}",
                data: function(d) {
                    d.name = $('#name').val();
                    d.email = $('#email').val();
                    d.status = $('#status').val();
                }
            },

            columns: [

                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "name",
                },
                {
                    "data": "email"
                },
                {
                    "data": "status"
                },
                {
                    "data": "plane"
                },

            ],

            'rowCallback': function(row, data, index) {
                $(row).attr('data-id', data.id);
                $($(row)).dblclick(function() {
                    var data = $(this).attr('data-id');
                    var url = '{{ route("dashboard.users.show",":id") }}';
                    url = url.replace(':id', data);
                    window.open(url);
                });
            },

            columnDefs: [{
                targets: "hiddenCols",
                visible: false,
                render: function(data, type, row) {
                    if (type === 'PDF') {
                        return data.split(' ').reverse().join(' ');
                    }
                    return data;
                }
            }],

            dom: "Blfrtip",
            buttons: [{
                    extend: 'colvis',
                    text: '{{trans("dashboard.colvis")}}'
                }, {
                    extend: 'refresh',
                    text: '{{trans("dashboard.refresh")}}',
                }, {
                    extend: 'collection',
                    text: '{{trans("dashboard.Export")}}',
                    buttons: [{
                        extend: 'excel',
                        text: '{{trans("dashboard.excel")}}',
                        exportOptions: {
                            columns: [':visible'],
                        }
                    }, {
                        extend: 'print',
                        text: '{{trans("dashboard.print")}}',
                        exportOptions: {
                            columns: [':visible']
                        }
                    }, 'pdf', {
                        extend: 'excel',
                        text: '{{trans("dashboard.all_data")}}',

                        action: function(e, dt, button, config) {
                            dt.one('preXhr', function(e, s, data) {
                                data.length = -1;
                            }).draw();
                        },

                    }],

                },
                {
                    text: '{{trans("dashboard.select_all")}}',
                    action: function() {
                        table.rows().select();
                    }
                },
                {
                    text: '{{trans("dashboard.deselect_all")}}',
                    action: function() {
                        table.rows().deselect();
                    }
                }
            ],
            select: true,
            deferRender: true,
            fixedHeader: true,
            fixedColumns: {
                leftColumns: 2
            },

        });
        $("#name").on("change", function() {
            table.draw();
        });
        $("#email").on("change", function() {
            table.draw();
        });
        $("#status").on("change", function() {
            table.draw();
        });

    });

    $.fn.dataTable.ext.buttons.refresh = {
        text: 'Refresh',
        action: function(e, dt, node, config) {
            dt.clear().draw();
            dt.ajax.reload();
        }
    };
</script>

@endsection