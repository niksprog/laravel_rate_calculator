<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency as Currency;

class CalculatorController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('calculator.index')->withOptions(Currency::getSelectOptions());
    }
}
