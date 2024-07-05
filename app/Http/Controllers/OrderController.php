<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PassengerController extends Controller
{
    public function placeOrder(Request $request)
    {
        $passengerCountKey = 'passenger_count_' . session()->getId();
        $selectedTicketKey = 'selected_ticket_' . session()->getId();

        $passengerCount = Cache::get($passengerCountKey);
        $selectedTicket = Cache::get($selectedTicketKey);

        if (!$passengerCount || !$selectedTicket) {
            return response()->json(['message' => 'Passenger count or selected ticket not found'], 404);
        }

        $validated = $request->validate([
            'adults' => 'required|array',
            'children' => 'required|array',
            // Add further validation for each passenger info
        ]);

        // Handle order logic here
        // Save the order and passenger details to the database

        return response()->json(['message' => 'Order placed successfully']);
    }
}
