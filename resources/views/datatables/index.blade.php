@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('assets/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}">
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset('assets/js/dataTables.editor.min.js')}}"></script>
@stop
@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Wisport ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>


    <script>
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.data') !!}',
            dom: 'Bfrtip',
            buttons: ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
            columns: [
                {data: 'wisport_racer_id', name: 'wisport_racer_id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@stop
@section('scripts')

@stop

