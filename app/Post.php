<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'date'  => 'required',
        'body'  => 'required',
        'prefecture_id' => 'required'
    );
}
