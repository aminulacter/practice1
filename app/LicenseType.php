<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    protected $fillable = ['product_id', 'type', 'price'];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
