<script src="{{ asset('dist/jquery-dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/jszip.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('dist/jquery-dataTables/js/dataTables.select.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],

            "pageLength": 10,
            pagingType: 'full_numbers',

            scrollY: '300px',
            sScrollY: "200px",

            scrollX: true,
            "autoWidth": false,

            colReorder: true,
            // searching: false,

            dom: "Blfrtip",
            columnDefs: [{
                targets: "hiddenCols",
                visible: false,
                // targets: '_all',
                render: function (data, type, row) {
                    if (type === 'PDF') {
                        return data.split(' ').reverse().join(' ');
                    }
                    return data;
                }
            }],
            // scrollY: "300px",
            // scrollX: true,
            // scrollCollapse: true,
            // paging: true,
            // buttons: ['colvis', 'print', 'excel', 'pdf', 'copyHtml5'],

            buttons: [
                {extend: 'colvis'},
                // {extend: 'copyHtml5', footer: true},
                {
                    extend: 'excelHtml5', exportOptions: {
                        columns: [':visible']
                    }, footer: true
                },
                // {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true},
                {
                    extend: 'print', exportOptions: {
                        columns: [':visible']
                    }, footer: true
                },
            ],
            select: true,
            deferRender: true,
            fixedHeader: true,
            fixedColumns: {
                leftColumns: 2
            }
        });
    });
</script>
