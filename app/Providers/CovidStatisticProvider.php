<?php

namespace App\Providers;

use Carbon\Carbon;

class CovidStatisticProvider
{
    public function getTotalCasesByCountry($country)
    {
        $today = Carbon::now()->toDateString();
        $yesterday = Carbon::now()->subDays(90)->toDateString();

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                // ->get("https://api.covid19api.com/total/country/${country}/status/${type}?from=${yesterday}&to=${today}");
                // ->get("https://corona.lmao.ninja/v2/countries/${country}");       
                    ->get("https://corona.lmao.ninja/v2/countries?yesterday&sort");
                
                $response = json_decode($request->getBody()->getContents());

        return $response;
        // return $response[count($response) - 1];

    }

    public function getCountryList()
    {
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("https://api.covid19api.com/countries");
        
        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

}