<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CurrencyController as CurrencyController;
use App\Http\Controllers\RateController as RateController;
use App\Calculation as Calculation;

class CalculatorController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('calculator.index')->withOptions(CurrencyController::getSelectOptions());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function calculate(Request $request)
    {

        $this->validate($request, [
            'from_currency_id' => 'required|integer|different:to_currency_id',
            'to_currency_id' => 'required|integer|different:from_currency_id',
            'amount' => 'required|regex:/^\d*(\.\d{1,5})?$/'
        ]);

        $rate = RateController::getRate($request->from_currency_id, $request->to_currency_id);
        $result = round($request->amount * $rate, 5);

        Calculation::create([
            'from_currency_id' => $request->from_currency_id,
            'to_currency_id' => $request->to_currency_id,
            'rate' => $rate,
            'amount' => $request->amount,
            'result' => $result
        ]);

        return [
            'rate' => $rate,
            'result' => $result
        ];

    }

}
