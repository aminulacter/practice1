<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
