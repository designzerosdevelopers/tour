<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait CurrencyConverterTrait
{
    public function formatCurrency($price)
    {
        $currency = Session::get('currency', 'AED');

        if ($currency == 'AED') {
            // Format without thousands separator and keep two decimal places
            return (float)number_format($price, 2, '.', '');
        } else {
            $response = $this->currencyAPI();

            if ($response['result'] === 'success') {
                // Convert the price using the exchange rate and format it
                $convertedPrice = $price * $response['conversion_rates'][$currency];
                return (float)number_format($convertedPrice, 2, '.', '');
            } else {
                // Fallback if API fails, format the original price
                return (float)number_format($price, 2, '.', '');
            }
        }
    }
    public function getAEDCurrency($price, $currency)
    {

        $response = $this->currencyAPI();

        if ($response['result'] === 'success') {
            $conversionRate = $response['conversion_rates'][$currency] ?? null;
    
            if ($conversionRate) {
                $convertedPrice = $price / $conversionRate * $response['conversion_rates']['AED'];
                return (float)number_format($convertedPrice, 2, '.', '');
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function arrayFormatCurrency($price)
    {
        $currency = Session::get('currency', 'AED');
        if ($currency == 'AED') {
            return number_format($price, 2, '.' . '') . ' ' . $currency;
        } else {
            $response = $this->currencyAPI();
            if ($response['result'] === 'success') {
                $convertedPrice = $price * $response['conversion_rates'][$currency];
                return number_format($convertedPrice, 2, '.' . '') . ' ' . $currency;
            } else {
                return number_format($price, 2, '.' . '') . ' ' . $currency;
            }
        }
    }


    public function currencyAPI()
    {
        $cacheKey = 'currency_rates';
        $currencyRates = Cache::get($cacheKey);
        if (!$currencyRates) {
            $response = Http::get("https://v6.exchangerate-api.com/v6/726d6df1f51c193bcbdeae17/latest/AED");
            $currencyRates = $response->json();
            Cache::put($cacheKey, $currencyRates, now()->addHour());
        }
        return $currencyRates;
    }
}
