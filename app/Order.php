<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $fillable = [
        'user_id', 'billing_address', 'billing_city', 'billing_province', 'billing_postalcode', 'billing_phone', 'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_tax', 'billing_total','payment_type'
    ];
   
    public function paymentable()
    {
        return $this->morphTo();
    }
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('licence_type')->withTimestamps();
    }
}
