@extends('layouts.master')
@section('header')
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
        </tr>
        </thead>
    </table>


    <script>
        var editor; // use a global for the submit and return data rendering in the examples

        $(document).ready(function() {
            editor = new $.fn.dataTable.Editor( {
                ajax: "{!! route('datatables.data') !!}",
                table: "#users-table",
                fields: [ {
                    label: "WiSport ID:",
                    name: "wisport_racer_id"
                }, {
                    label: "First name:",
                    name: "first_name"
                }, {
                    label: "Last name:",
                    name: "last_name"
                }
                ]
            } );

            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.data') !!}',
                    columns: [
                        { data: 'wisport_racer_id', name: 'wisport_racer_id' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name'}
                    ],
                    select: true,
                    buttons: [
                        { extend: "create", editor: editor },
                        { extend: "edit",   editor: editor },
                        { extend: "remove", editor: editor }
                    ]
                });
            });
        } );
    </script>
@stop


