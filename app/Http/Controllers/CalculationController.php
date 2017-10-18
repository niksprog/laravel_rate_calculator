<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculation as Calculation;

class CalculationController extends Controller
{
    public function index() {

        $calculations = Calculation::orderBy('id', 'desc')->paginate(5);

        return view('calculations.index')->withCalculations($calculations);

    }
}
