<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{use Sluggable;
    
    protected $fillable=['title','content','user_id','image'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  
    public function user()
    {
       return $this->belongsTo(User::class); //attach this post to user App/User one post has one user
    }
    
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
        


}
