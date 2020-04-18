<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paypalpayment extends Model
{
    protected $fillable = [
        'payerEmail', 'paymentId', 'payerStatus', 'transactionFee'
    ];
   
    public function order()
    {
        return $this->morphOne('App\Order', 'paymentable');
    }
}
