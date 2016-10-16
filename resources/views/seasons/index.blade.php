@extends('layouts.master')
@section('header')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/button.server-side.js') }}"></script>
@stop
@section('content')
    <div class="container">
        <h2>Race Results</h2>
        <table class="table table-bordered" id="results-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Race</th>
                <th>Place</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Age Group Place</th>
                <th>Time</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        $(function() {
            var table = $('#results-table').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": true,
                "order": [[0, 'asc'],[2,'asc']],
                "ajax": {
                    "url": '{!! route('seasons.data') !!}',
                    "type": 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    { data: 'date', name: 'date'},
                    { data: 'short_name', name: 'short_name' },
                    { data: 'place', name: 'place' },
                    { data: 'first', name: 'first' },
                    { data: 'last', name: 'last'},
                    { data: 'gender', name: 'gender' },
                    { data: 'label', name: 'label' },
                    { data: 'age_group_place', name: 'age_group_place' },
                    { data: 'time', name: 'race_results.time'}

                ],
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });

            table.buttons().container()
                    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
        });
    </script>
@stop


