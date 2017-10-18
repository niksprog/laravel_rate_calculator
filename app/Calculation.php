<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $fillable = ['from_currency_id', 'to_currency_id', 'rate', 'amount', 'result'];
}