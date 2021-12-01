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

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function getData()
    {
        return $this->id . ': ' . $this->title . ' (' . optional($this->user)->name . ')';
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
