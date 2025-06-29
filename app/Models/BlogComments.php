<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    protected $fillable = [
        'blog_post_id',
        'user_id',
        'comment',
        'status',
    ];

    public function blog(){
        return $this->belongsTo(BlogPost::class, 'blog_post_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
