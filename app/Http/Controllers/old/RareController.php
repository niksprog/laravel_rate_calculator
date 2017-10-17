<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate as Rate;

class RareController extends Controller
{
    public function show() {

        $rates = Rate::all();

    }
}
