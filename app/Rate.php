<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    public function from_currency()
    {
        return $this->belongsTo('App\Currency', 'from_currency_id');
    }

    public function to_currency()
    {
        return $this->belongsTo('App\Currency', 'to_currency_id');
    }

}