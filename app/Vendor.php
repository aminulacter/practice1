<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name', 'slug', 'logo', 'profile_pic', 'description', 'facebook_profile', 'tweet_profile', 'linkedin_profile'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
