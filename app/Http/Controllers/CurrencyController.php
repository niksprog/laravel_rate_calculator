<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency as Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currencies', [
            'currencies' => Currency::all()
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
