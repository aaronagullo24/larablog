<?php

namespace App;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function posts()
    {
        return $this->morphToMany(Post::class, 'taggable');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'taggable');
    }
    
}
