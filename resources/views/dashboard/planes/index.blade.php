@extends('layouts.dashboard.app')
@section('title')
@lang('dashboard.planes')
@endsection
@section('css')
<!-- DataTables -->
<!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> -->
@include('partials.includes.jquery-dataTables._style')

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title')
@lang('dashboard.planes')
@endslot
@slot('pagetitle')
@lang('dashboard.dashboard')
@endslot
@endcomponent

@include('partials.includes._flash_message')

<div class="row">
    <div class="col-12">
        <div class="col-md-6 form-group">

            <a href="{{ route('dashboard.planes.create') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>
                @lang('dashboard.add')</a>
            </a>

        </div>
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('dashboard.search') }}</h5>
            </div>
            <div class="card-body mb-n3">
                <div class="row">
                    <div class="col-md-3 form-group">

                        <input type="text" name="name" id="name" placeholder="{{trans('dashboard.name')}}" style="width: 100%">

                    </div>
                    <div class="col-md-3 form-group">

                        <input type="text" name="price" id="price" placeholder="{{trans('dashboard.price')}}" style="width: 100%">

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
                            <th>@lang('dashboard.price')</th>
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
            searching: false,
            ajax: {
                url: "{{ route('dashboard.planes.index') }}",
                data: function(d) {
                    d.name = $('#name').val();
                    d.price = $('#price').val();
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
                    "data": "price"
                },
            ],

            'rowCallback': function(row, data, index) {
                $(row).attr('data-id', data.id);
                $($(row)).dblclick(function() {
                    var data = $(this).attr('data-id');
                    var url = '{{ route("dashboard.planes.show",":id") }}';
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
        $("#price").on("change", function() {
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