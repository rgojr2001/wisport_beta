@extends('layouts.master')
@section('header')
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/button.server-side.js') }}"></script>
@stop
@section('content')
    <div class="container">
        <h2>Series Age Group Standings</h2>
        <table class="table table-bordered" id="overall-table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Series</th>
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
                "order": [[5, 'desc'],[3, 'asc']],
                "ajax": {
                    "url": '{!! url('standings/ageGroup/data') !!}',
                    "type": 'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    { data: 'first', name: 'first' },
                    { data: 'last', name: 'last'},
                    { data: 'gender', name: 'gender' },
                    { data: 'competition', name: 'competition' },
                    { data: 'ag_label', name: 'ag_label' },
                    { data: 'points', name: 'points'}
                ]
            });
        });
    </script>
@stop


