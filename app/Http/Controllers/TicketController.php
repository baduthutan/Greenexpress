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
        $schedules = Schedule::where('from_location_id', $fromLocationId)
                        ->where('to_location_id', $toLocationId)
                        ->get();
        // dd($fromLocationId,$toLocationId,$date,$adults,$children,$tickets);

        return view('tickets', [
            'schedules' => $schedules,
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