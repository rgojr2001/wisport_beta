@extends('layouts.master')
@section('header')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@stop
@section('content')
    <div class="container">
        <h2>Series Overall Standings</h2>
        <table class="table table-bordered" id="overall-table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Points</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        $(function() {
            var table = $('#overall-table').DataTable({
                "processing": true,
                "serverSide": true,
                "order":[[3,'desc'],[4,'asc'],[5,'desc']],
                "ajax": {
                    "url": '{!! url('standings/overall/data') !!}',
                    "type": 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    { data: 'first', name: 'first' },
                    { data: 'last', name: 'last'},
                    { data: 'gender', name: 'gender',targets:[2],orderData:[2,3,4] },
                    { data: 'ag_label', name: 'ag_label',targets:[3],orderData:[2,3,4] },
                    { data: 'points', name: 'points',targets:[4],orderData:[2,3,4]}

                ]
            });
        });

    </script>
@stop


