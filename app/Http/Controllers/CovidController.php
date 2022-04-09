<?php

namespace App\Http\Controllers;

use App\Providers\CovidStatisticProvider;
use Carbon\Carbon;
use Inertia\Inertia;

class CovidController extends Controller
{
    public function index(CovidStatisticProvider $covidStatisticService) {
        $today = Carbon::now()->toDateString();
        $covid = 'covid';
        $countryDynamic = '';
                
        $confirmedCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType($countryDynamic, 'confirmed');
        $recoveredCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'recovered');
        $deadCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'deaths');
        $countries = $covidStatisticService->getCountryList();
        
        return Inertia::render('CovidStats', [
                                    
            'countries' => $countries,
            'country' => $countryDynamic,

            $covid => [
            'today' => $today,
            'confirmedCovidCasesUntilToday' => $confirmedCovidCasesUntilToday,
            'recoveredCovidCasesUntilToday' => $recoveredCovidCasesUntilToday,
            'deadCovidCasesUntilToday' => $deadCovidCasesUntilToday,
            ],
        ]);

    }
}