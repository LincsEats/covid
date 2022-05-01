<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\CovidTests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class CovidTestsController extends Controller
{
    public function create()
    {
        return Inertia::render('CovidTesting/OrderHomeKit');
    }
    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'userId' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'niNumber' => ['required', 'string', 'max:10'],
            'testType' => ['required', 'string', 'max:255'],
            'streetName' => ['required', 'string', 'max:255'],
            'buildingNumber' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'deliveryStatus' => ['string', 'max:255'],
            'serialNumber' => ['string', 'max:255'],
            'result' => ['string', 'max:255'],
        ]);
        CovidTests::create([
                'userId' =>  $postData['userId'],
                'name' => $postData['name'],
                'niNumber' => $postData['niNumber'],
                'email' => $postData['email'],
                'testType' => $postData['testType'],
                'streetName' => $postData['streetName'],
                'buildingNumber' => $postData['buildingNumber'],
                'postcode' => $postData['postcode'],
                'city' => $postData['city'],
                'deliveryStatus' => '',
                'serialNumber' => '',
                'result' => ''
            ]);

            return redirect()->route('dashboard');
    }
}