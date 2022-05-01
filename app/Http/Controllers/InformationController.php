<?php

namespace App\Http\Controllers;

use App\Providers\CovidStatisticProvider;
use Carbon\Carbon;
use Inertia\Inertia;

class InformationController extends Controller
{
    public function index(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Index', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function overview(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Overview', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function symptoms(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Symptoms', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function prevention(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Prevention', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function vaccine(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Vaccine', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function effectiveness(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/Effectiveness', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function selfCare(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/SelfCare', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
    public function medicalTreatments(CovidStatisticProvider $covidStatisticService) {
        $UKCovidData = $covidStatisticService->getNHSDataOverview('');
        return Inertia::render('Information/MedicalTreatments', [                                    
            'NHSData' => $UKCovidData,            
        ]);
    }
}