<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Vendor;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'details', 'description', 'image', 'images', 'vedio', 'version', 'layout', 'ratina_ready', 'files_included', 'browser', 'bootstrap', 'highlights', 'user_id'
    ];

    protected $appends = [/*'like_count',*/'ratingcounts'];
    protected $casts = [
        'retina_ready' => 'boolean',
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_products')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'catgory__products')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'product_users')->withPivot('favorite', 'rating')->withTimestamps();
    }

    public function status($userId)
    {
        return ProductUser::where('user_id', $userId)
            ->where('product_id', $this->id)
            ->first()
            ->relation;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function vendor()
    {
        return Vendor::where('user_id', $this->user_id)->first();
    }

    // public function getLikeCountAttribute()
    // {
    //     return $this->users()->wherePivot('favorite', 1)->count();
    // }
    public function logFavorite()
    {
        $this->favorite_count = $this->users()->wherePivot('favorite', 1)->count();
        $this->update();
    }

    public function getRatingcountsAttribute()
    {
        return $this->users()->wherePivot('rating', '>', 0)->count();
    }
    public function setRatings()
    {
        $this->rating = $this->users()->wherePivot('rating', '>', 0)->get()->pluck('pivot')->pluck('rating')->avg();
        $this->update();
    }
    public function withComment()
    {
        $productId = $this->id;

        return DB::table('comments')
            ->join('product_users', function ($join) use ($productId) {
                $join->on('product_users.user_id', '=', 'comments.user_id')
                    ->where('product_users.product_id', '=', $productId)
                    ->where('product_users.rating', '>', 0);
            })
            ->get();
    }
    public function licences_types()
    {
        return $this->hasMany('App\LicenseType');
    }

    public function saveComment($commentBody, $userId, $ratingComment = false)
    {
        $comment = new Comment();
        //$comment->user_id = auth()->user()->id;
        $comment->user_id = $userId;
        $comment->body = $commentBody;
        $comment->ratingComment = $ratingComment;
        $this->comments()->save($comment);
    }


    public function saveReply($commentBody, $userId, $parentId)
    {
        $comment = new Comment();
        //$comment->user_id = auth()->user()->id;
        $comment->user_id = $userId;
        $comment->body = $commentBody;
        $comment->comment_id = $parentId;
        $this->comments()->save($comment);
    }
    public function faqs()
    {
        return $this->hasMany('App\Question');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('licence_type')->withTimestamps();
    }
}
