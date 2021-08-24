<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    
    protected $table = 'rests';

    public static $rules = array(
        'message' => 'required',
        'user' => 'required',
        'user_id' => 'required'
    );

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
