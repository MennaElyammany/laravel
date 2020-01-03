<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','content','user_id'];

    public function user()
    {
       return $this->belongsTo(User::class); //attach this post to user App/User one post has one user
    }

}
