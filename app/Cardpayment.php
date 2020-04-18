<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardpayment extends Model
{
    protected $fillable = [
        'cardno', 'cardType'
    ];
   
    public function order()
    {
        return $this->morphOne('App\Order', 'paymentable');
    }
}
