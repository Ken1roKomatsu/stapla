<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    protected $table = 'owners';

    protected $fillable = [
        'email',
        'password',
        'name',
        'birthday',
        'prefecture',
        'city',
        'street',
        'building',
        'mobile_phone_number',
        'landline_phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
