<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $table = 'likes';

    public static $rules = array(
        'user_id' => 'required',
        'rest_id' => 'required'
    );

}
