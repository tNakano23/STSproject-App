<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [//保存するため
        'user_id' ,'post'    ,
        'rnd-1'   ,'rnd-2'   ,'rnd-3'  ,
        'now-x'   ,'now-like','now-num','now-dig',
        'runstop' 
    ];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function likedBy($user)
    {
        return Like::where('user_id',$user->id)->where('post_id',$this->id);
    }
}
