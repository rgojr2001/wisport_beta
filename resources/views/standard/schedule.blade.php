@extends('layouts.master')
@section('header')
    <br/>
    <h1 class="centered">2016 Racing Schedule</h1>
<hr>
    <br/>
@stop
@section('content')
<div class="container">
    <table class="table-responsive table-striped">
        <thead>
        <th>Date</th>
        <th>Name</th>
        <th>Location</th>
        <th>Course Map</th>
        <th>Flyer</th>
        </thead>
        <tbody>
        @foreach ($schedule as $race)
            <tr>
                <td><?php $date = new DateTime($race->date); echo $date->format('D, M j,Y '); ?></td>
                <td><a href="#">{{ $race->name }}</a></td>
                <td>{{ $race->location }}</td>
                <td><a href="{{ $race->course_map }}">Link</a></td>
                <td><a href="{{ $race->flyer_link }}">Flyer</a></td>
            </tr>
            <tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
