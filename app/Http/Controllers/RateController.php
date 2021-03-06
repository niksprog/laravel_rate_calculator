<?php

// TODO add Session flash messages

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate as Rate;
use App\Http\Controllers\CurrencyController as CurrencyController;

class RateController extends Controller
{

    /**
     * Find Rate to calculate Exchange amounts.
     * @param $from_currency_id
     * @param $to_currency_id
     * @return int
     */
    public static function getRate($from_currency_id, $to_currency_id)
    {

        $rate = Rate::where([
            'from_currency_id' => $from_currency_id,
            'to_currency_id' => $to_currency_id
        ])->orderBy('id', 'desc')->first();

        if($rate) {
            return $rate->rate;
        }

        $rate = Rate::where([
            'from_currency_id' => $to_currency_id,
            'to_currency_id' => $from_currency_id
        ])->orderBy('id', 'desc')->first();

        if($rate) {
            return (1 / $rate->rate);
        }

        return 1;

    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::orderBy('id', 'desc')->paginate(5);

        return view('rates.index')->withRates($rates);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rates.create')->withOptions(CurrencyController::getSelectOptions());
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'from_currency_id' => 'required|integer|different:to_currency_id',
            'to_currency_id' => 'required|integer|different:from_currency_id',
            'rate' => 'required|regex:/^\d*(\.\d{1,5})?$/'
        ]);

        // Save data
        $rate = new Rate();
        $rate->from_currency_id = $request->from_currency_id;
        $rate->to_currency_id = $request->to_currency_id;
        $rate->rate = $request->rate;
        $rate->save();

        // Redirect to list view
        return redirect()->route('rates.index');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not supported functionality redirect to Currencies list
        return redirect()->route('rates.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('rates.edit', [
            'rate' => Rate::find($id),
            'options' => CurrencyController::getSelectOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate data
        $this->validate($request, [
            'id' => 'exists',
            'from_currency_id' => 'required|integer|different:to_currency_id',
            'to_currency_id' => 'required|integer|different:from_currency_id',
            'rate' => 'required|regex:/^\d*(\.\d{1,5})?$/'
        ]);

        // Update data
        $rate = Rate::find($id);
        $rate->from_currency_id = $request->from_currency_id;
        $rate->to_currency_id = $request->to_currency_id;
        $rate->rate = $request->rate;
        $rate->save();

        // Redirect to list view
        return redirect()->route('rates.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rate::find($id);
        $rate->delete();
    }
}
