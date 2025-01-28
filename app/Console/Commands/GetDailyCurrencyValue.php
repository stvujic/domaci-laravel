<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class GetDailyCurrencyValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get todays currency values for USD and EUR description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        foreach(ExchangeRates::AVAILABLE_CURRENCIES as $currency)
        {
            $todayCurrency = ExchangeRates::getCurrencyForToday($currency);

            if($todayCurrency !== null)
            {
                continue;
            }

            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
            ExchangeRates::create([
                'currency' => $currency,
                'value' => $response->json()["exchange_middle"]
            ]);
        }
    }
}
