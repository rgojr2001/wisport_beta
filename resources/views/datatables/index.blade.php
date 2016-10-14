@extends('layouts.master')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Wisport ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        </thead>
    </table>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'wisport_racer_id', name: 'wisport_racer_id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name'}
                ]
            });
        });
    </script>
@stop


