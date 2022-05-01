<?php

namespace App\Http\Controllers;

use App\Providers\CovidStatisticProvider;
use Carbon\Carbon;
use Inertia\Inertia;

class CovidController extends Controller
{
    public function index(CovidStatisticProvider $covidStatisticService) {
        $today = Carbon::now()->subDays(30)->toDateString();
        $yesterday = Carbon::now()->subDays(90)->toDateString();                
        $UKCovidData = $covidStatisticService->getTotalCasesByCountry('');
        $countries = $covidStatisticService->getCountryList();

        return Inertia::render('Data/CovidStats', [                                    
            'countries' => $countries,
            'covidData' => $UKCovidData,            
        ]); 
    }
}