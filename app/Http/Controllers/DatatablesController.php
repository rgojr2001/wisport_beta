<?php
namespace App\Http\Controllers;

use App\App\Models\WisportRacer;
use App\Http\Requests;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $users = WisportRacer::select(['wisport_racer_id', 'first_name', 'last_name']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->wisport_racer_id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('wisport_racer_id', 'WiSport ID: {{$wisport_racer_id}}')
            ->make(true);
        #return Datatables::of(WisportRacer::query())->make(true);
    }

}
