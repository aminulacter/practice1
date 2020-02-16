<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_users')->withPivot('favorite', 'rating')->withTimestamps();
    }
    public function likes($productId)
    {
        if ($this->products()->where('products.id', $productId)->exists()) {
            $this->products()->updateExistingPivot($productId, ['favorite' => true]);
        } else {
            $this->products()->attach($productId, ['favorite' => true]);
        }


        $this->products()->where('products.id', $productId)->first()->logFavorite();
    }

    public function dislike($productId)
    {
        if ($this->products()->where('products.id', $productId)->exists()) {
            $this->products()->updateExistingPivot($productId, ['favorite' => false]);
        }
        // else {
        //     $user->products()->attach($productId, ['favorite' => false]);
        // }
        $this->products()->where('products.id', $productId)->first()->logFavorite();
    }
    public function rates($productId, $ratingPoint)
    {
        if ($this->products()->where('products.id', $productId)->exists()) {
            $this->products()->updateExistingPivot($productId, ['rating' => $ratingPoint]);
        } else {
            $this->products()->attach($productId, ['rating' => $ratingPoint]);
        }

        $this->products()->where('products.id', $productId)->first()->setRatings();
    }
    public function getRatings($productId = 1)
    {
        return $rating = $this->products()
            ->where('product_id', $productId)
            ->first()->pivot->rating;
    }
}
