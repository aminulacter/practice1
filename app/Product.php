<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'details', 'description', 'image', 'images', 'vedio', 'version', 'layout', 'ratina_ready', 'files_included', 'browser', 'bootstrap', 'highlights', 'vendor_id'
    ];

    // protected $appends = [/*'like_count',*/ 'ratings'];

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
        return $this->hasMany('App\Tag', 'tag_products')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'catgory__products')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'product_users')->withPivot('favorite', 'rating')->withTimestamps();
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

    // public function getRatingsAttribute()
    // {
    //     return $this->users()->wherePivot('rating', '>', 0)->get()->pluck('pivot')->pluck('rating')->avg();
    // }
    public function setRatings()
    {
        $this->rating = $this->users()->wherePivot('rating', '>', 0)->get()->pluck('pivot')->pluck('rating')->avg();
        $this->update();
    }
    public function withComment()
    {
        return $this->comments()
            ->whereNull('comment_id')
            ->where()
            ->with('commentReplies')
            ->get();
    }
    public function getRatings($userId=1)
    {
        $rating = $this->users()
                 ->where('user_id', $userId)
                 ->first()->pivot->rating;
        return $rating;
        //$this->update();
    }
    // public function setRatings()
    // {
    //     $this->rating = $this->reviews()->where('ratings', '>', 0)->get()->pluck('ratings')->avg();
    //     $this->update();
    // }
    public function createComment()
    {
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}
