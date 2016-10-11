<?php

namespace App\Http\Controllers;

use App\EmailList;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Requests;

class EmailListController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new email list entry instance after a valid registration.
     *
     * @param  array  $data
     * @return EmailList
     */
    protected function register(Request $data)
    {
        $ns['name'] = $data->input('name');
        $ns['email'] = $data->input('email');
        $newSubscriber = EmailList::create($ns);
        return redirect('/email/thank_you');
    }
}
