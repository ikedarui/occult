<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'code'
        , 'name'
    ];

    // 以下を追記
    public static function selectlist()
    {
        $prefs = Prefecture::all();
        $list = array();
        $list += array( "" => "選択してください" ); //selectlistの先頭を空に
        foreach ($prefs as $pref) {
           $list += array( $pref->code => $pref->name );
        }
        return $list;
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}
