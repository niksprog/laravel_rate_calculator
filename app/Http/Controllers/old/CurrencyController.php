<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency as Currency;

class CurrencyController extends Controller
{

    public function show()
    {
        return view('currencies', [
            'currencies' => Currency::all()
        ]);
    }

    public function newRecord()
    {
        return view('currency', [
            'title' => 'New Currency',
            'currency' => new Currency()
        ]);
    }

    public function editRecord($id)
    {

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($id) {

            $currency = Currency::findOrFail($id);

            return view('currency', [
                'title' => $currency->name,
                'currency' => $currency
            ]);

        }


    }

    public function delete($id)
    {

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($id) {
            $currency = Currency::find($id);
            $currency->delete();
        }

    }

}
