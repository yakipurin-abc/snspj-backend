<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['id', 'name'];
    protected $table = 'users';

    public static $rules = array(
        'name' => 'required',
    );

    public function rests(){
        return $this->hasMany('App\Models\Rest');
    }
}
