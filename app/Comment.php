<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
     'id',
        'post_id',
            'user_id',
                'comment',
    ];
    
    public static $rules = array(
        'comment' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
