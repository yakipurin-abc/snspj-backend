<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user' => 'required',
        'comment' => 'required',
        'message_id' => 'required'
    );
}
