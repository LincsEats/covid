<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Bookings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function create()
    {
        return Inertia::render('Vaccine/Bookings');
    }
    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'userId' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'niNumber' => ['required', 'string', 'max:10'],
            'vaccine' => ['required', 'string', 'max:255'],
            'bookingDateTime' => ['required', 'string', 'max:255'],
        ]);
        Bookings::create([
                'userId' =>  $postData['userId'],
                'name' => $postData['name'],
                'niNumber' => $postData['niNumber'],
                'vaccine' => $postData['vaccine'],
                'bookingDateTime' => $postData['bookingDateTime'],
            ]);

            return redirect()->route('dashboard');
    }
}