<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class admin extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;

    protected $table="admins";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
