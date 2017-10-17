<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency as Currency;

class CalculatorController extends Controller
{
    public function show() {
        return view('calculator', [
            'currencies' => Currency::all()
        ]);
    }
}
