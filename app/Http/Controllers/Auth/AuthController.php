<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        var_dump($data);
        return Validator::make($data, [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:4|confirmed',
            'dob'           => 'date_format:d/m/Y|before:today',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create($data);
        dd($user);
        return $user;
    }

    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('/');
    }

    private function set_wisport_id($letter)
    {
        $wisport_id =  \App\Models\User::where('wisportId', 'like', 'WI'.$letter.'%')
            ->orderBy('wisportId','DESC')
            ->limit(1)
            ->first();
        return ++$wisport_id->wisportId;
    }

    private function set_age_group($month,$year){
        $wisport_age = get_wisport_age($month,$year);
        $age_id =  \App\Models\AgeGroup::where('upper', '>', $wisport_age)
            ->where('lower', '<', $wisport_age)
            ->get();
        return $age_id->age_group_id;
    }

    private function get_wisport_age($m,$y){
        $wisport_month = 6;
        $wisport_year = 2017;
        $age = $wisport_year-$y;
        return ($m > $wisport_month) ? $age : $age-1;
    }
}
