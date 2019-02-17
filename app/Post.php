<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the user belong to post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category belong to post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
