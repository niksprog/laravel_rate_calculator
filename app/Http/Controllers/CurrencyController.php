<?php

// TODO add Session flash support for messages

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency as Currency;

class CurrencyController extends Controller
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

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currencies.index')->withCurrencies(Currency::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
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
            'name' => 'required|max:50',
            'prefix' => 'required|max:3'
        ]);

        // save data
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->prefix = $request->prefix;
        $currency->save();

        // redirect
        return redirect()->route('currencies.index');

    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not supported functionality redirect to Currencies list
        return redirect()->route('currencies.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('currencies.edit')->withCurrency(Currency::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // validate data
        $this->validate($request, [
            'id' => 'exists',
            'name' => 'required|max:50',
            'prefix' => 'required|max:3'
        ]);

        // save data
        $currency = Currency::find($id);
        $currency->name = $request->name;
        $currency->prefix = $request->prefix;
        $currency->save();

        // redirect
        return redirect()->route('currencies.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
    }
}
