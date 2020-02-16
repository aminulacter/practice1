<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'body', 'commentable_id', 'commentable_type'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class)->with('user');
    }
    public function commentReplies()
    {
        return $this->hasMany(Comment::class)->with('replies');
    }
}
