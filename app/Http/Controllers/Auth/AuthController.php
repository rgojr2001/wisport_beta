<?php

namespace App\Http\Controllers\Auth;

use App\App\Models\WisportRacer;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

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
        $this->redirectTo = '/auth/payment';
        #dd($data);
        $user = User::create($data);
        $data['user_id'] = $user->id;
        $data['wisport_racer_id'] = $user->wisportId;
        $racer = WisportRacer::create($data);
        
        Mail::send('standard.welcome_email', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->first_name.' '.$user->last_name)->subject('WiSport Registration');
        });
        
        #dd($racer);
        return $user;
    }
    
    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('/');
    }
}
