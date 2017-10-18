<?php

use Illuminate\Database\Seeder;
use App\Currency as Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Default Currencies
         * EUR - Euro
         * USD - US Dollar
         * CHF - Swiss Franc
         * GBP - British Pound
         * JPY - Japanese Yen
         * CAD - Canadian Dollar
         */

        DB::table('currencies')->delete();

        Currency::create(['name' => 'Euro', 'prefix' => 'EUR']);
        Currency::create(['name' => 'US Dollar', 'prefix' => 'USD']);
        Currency::create(['name' => 'Swiss Franc', 'prefix' => 'CHF']);
        Currency::create(['name' => 'British Pound', 'prefix' => 'GBP']);
        Currency::create(['name' => 'Japanese Yen', 'prefix' => 'JPY']);
        Currency::create(['name' => 'Canadian Dollar', 'prefix' => 'CAD']);
    }
}
