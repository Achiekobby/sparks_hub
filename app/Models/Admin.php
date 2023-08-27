<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'phone_number',
        'password',
        'role'
    ];

    protected $hidden = ['password'];

    protected $guarded =  ['created_at','updated_at'];
}
