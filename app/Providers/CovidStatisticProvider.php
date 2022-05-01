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

    public function getNHSDataOverview()
    {
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->GET("https://api.nhs.uk/conditions/coronavirus-covid-19?url=localhost:8000&modules=false&subscription-key=6a6487488b1c4dd6abdbe6b011c6eea8");
            $response = json_decode($request->getBody()->getContents());
        return $response;
    }

}