<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class CurrencyConverterController extends Controller
{
    public function convertCurrency($fromCurrency, $toCurrency, $amount)
    {
        $apiKey = config('services.exchange_rate_api.key');
        $url = "https://v6.exchangerate-api.com/v6/{$apiKey}/pair/{$fromCurrency}/{$toCurrency}/{$amount}";

        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        // Check if the API request was successful
        if ($data['result'] === 'success') {
            $conversionRate = $data['conversion_rate'];
            $convertedAmount = $data['conversion_result'];

            return [
                'conversion_rate' => $conversionRate,
                'converted_amount' => $convertedAmount,
            ];
        } else {
            return [
                'error' => "{$data['error-type']} - {$data['error-info']}",
            ];
        }
    }

    public function convertOneCurrency($fromCurrency, $toCurrency)
    {
        $apiKey = config('services.exchange_rate_api.key');
        $url = "https://v6.exchangerate-api.com/v6/{$apiKey}/pair/{$fromCurrency}/{$toCurrency}";

        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        // Check if the API request was successful
        if ($data['result'] === 'success') {
            $conversionRate = $data['conversion_rate'];

            return [
                'conversion_rate' => $conversionRate,
            ];
        } else {
            return [
                'error' => "{$data['error-type']} - {$data['error-info']}",
            ];
        }
    }
}
