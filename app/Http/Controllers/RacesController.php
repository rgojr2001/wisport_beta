<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RacesController extends Controller
{

    public  function index()
    {

    }

    public  function show($id)
    {
        $race = \App\Models\Race::where('id',$id)->get()->first();
        return view('standard.test', ['race' => $race]);
    }

    public  function create()
    {

    }

    public  function store()
    {

    }

    public  function edit($id)
    {

    }

    public  function update($id)
    {

    }

    public  function destroy($id)
    {

    }

    public function results()
    {
        $race = \App\Models\Race::where('id',201601)->get()->first();
        return view('standard.test', ['race' => $race]);
    }
}
