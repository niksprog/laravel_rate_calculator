<?php

use Illuminate\Database\Seeder;
use App\Rate as Rate;
use App\Currency as Currency;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('rates')->delete();


//        Euro -&gt; US Dollar (1.3764)
//        Euro -&gt; Swiss Franc (1.2079)
//        Euro -&gt; British Pound (0.8731)
//        US Dollar -&gt; JPY (76.7200)
//        Swiss Franc -&gt; US Dollar (1.1379)
//        British Pound -&gt; CAD (1.5648)


        $EUR = Currency::where('prefix', '=', 'EUR')->first();
        $USD = Currency::where('prefix', '=', 'USD')->first();
        $CHF = Currency::where('prefix', '=', 'CHF')->first();
        $GBP = Currency::where('prefix', '=', 'GBP')->first();
        $JPY = Currency::where('prefix', '=', 'JPY')->first();
        $CAD = Currency::where('prefix', '=', 'CAD')->first();

        Rate::create(['from_currency_id' => $EUR->id, 'to_currency_id' => $USD->id, 'rate' => '1.3764']);
        Rate::create(['from_currency_id' => $EUR->id, 'to_currency_id' => $CHF->id, 'rate' => '1.2079']);
        Rate::create(['from_currency_id' => $EUR->id, 'to_currency_id' => $GBP->id, 'rate' => '0.8731']);
        Rate::create(['from_currency_id' => $USD->id, 'to_currency_id' => $JPY->id, 'rate' => '76.7200']);
        Rate::create(['from_currency_id' => $CHF->id, 'to_currency_id' => $USD->id, 'rate' => '1.1379']);
        Rate::create(['from_currency_id' => $GBP->id, 'to_currency_id' => $CAD->id, 'rate' => '1.5648']);

    }
}
