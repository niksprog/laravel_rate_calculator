<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    /**
     * Collect options for Currency Select
     * @return array $options
     */
    public static function getSelectOptions()
    {
        $options = ['' => 'Select'];
        $currencies = Currency::all()->sortBy('prefix');

        foreach ($currencies as $currency) {
            $options[$currency->id] = "{$currency->prefix} | {$currency->name}";
        }

        return $options;
    }

}
