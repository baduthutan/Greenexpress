<?php

// app/Http/Controllers/FormController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Schedule;

class TicketController extends Controller
{
    public function search(Request $request)
    {
        $fromLocationId = $request->input('from');
        $toLocationId = $request->input('to');
        $date = $request->input('date');
        $adults = $request->input('adults');
        $children = $request->input('children');

        Log::info('Search Request Data:', [
            'from_location_id' => $fromLocationId,
            'to_location_id' => $toLocationId,
            'date' => $date,
            'adults' => $adults,
            'children' => $children,
        ]);

        $tickets = Schedule::where('from_location_id', $fromLocationId)
                        ->where('to_location_id', $toLocationId)
                        ->get();

        Log::info('Found Tickets:', ['tickets' => $tickets]);

        return view('tickets', [
            'tickets' => $tickets,
            'date' => $date,
            'adults' => $adults,
            'children' => $children
        ]);
    }
}


        // $validated = $request->validate([
        //     'from' => 'required|int',
        //     'to' => 'required|int',
        //     'date' => 'required|date',
        //     'adults' => 'required|int|min:1',
        //     'children' => 'required|int|min:0',
        // ]);