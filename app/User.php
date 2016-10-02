<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','wisport_racer_id','first_name','last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public static function create(array $data = array())
    {
        $birthday = new \DateTime($data['birth_date']);
        $month = $birthday->format('m');
        $year = $birthday->format('Y');
        #dd($year);
        #dd(substr($data['last_name'], 0,1));
        $user = new \App\User();
        $user->first_name=$data['first_name'];
        $user->last_name=$data['last_name'];
        $user->wisportId=set_wisport_id(substr($data['last_name'], 0, 1));
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);
        $user->gender=$data['gender'];
        $user->team=$data['team'];
        $user->phone=$data['email'];
        $user->birth_date=set_age_group($month,$year);
        //$user->store;
        $user->save();
        #dd($user->wisportId);
        return $user;
    }
}
