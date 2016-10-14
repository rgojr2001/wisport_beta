@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Race Results</h2>
        <table class="table table-bordered" id="results-table">
            <thead>
            <tr>
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
        <meta name="_token" content="{!! csrf_token() !!}" />
    </div>
    <script>
        $(function() {
            $('#results-table').DataTable({

                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.result-list') !!}',
                columns: [
                    { data: 'short_name', name: 'short_name' },
                    { data: 'place', name: 'place' },
                    { data: 'first', name: 'first' },
                    { data: 'last', name: 'last'},
                    { data: 'gender', name: 'gender' },
                    { data: 'ag_label', name: 'ag_label' },
                    { data: 'ag_place', name: 'ag_place' },
                    { data: 'time', name: 'time'}
                ]
            });
        });
    </script>
@stop


