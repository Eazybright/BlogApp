<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function VerifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    // user token relations
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    //return the phone number and contry code concatenated
    public function getPhoneNumber()
    {
        return $this->country_code.$this->phone;
    }

}
