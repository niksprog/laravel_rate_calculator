<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $fillable = ['from_currency_id', 'to_currency_id', 'rate', 'amount', 'result'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from_currency()
    {
        return $this->belongsTo('App\Currency', 'from_currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to_currency()
    {
        return $this->belongsTo('App\Currency', 'to_currency_id');
    }

}