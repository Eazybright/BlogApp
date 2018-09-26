<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guard = [];

    protected $fillable = [
        'user_id', 'token', 'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
