@extends('template')

@section('content')
 <!-- Schedule List -->
 <section class="mt-8">
    <h2 class="text-2xl font-bold text-green-600 mb-4">Schedule List</h2>
    @foreach($tickets as $ticket)
    <div class="bg-white shadow-lg rounded-lg p-4 mb-4 flex justify-between items-center">
        <div>
            <p><strong>Titik Naik:</strong>{{$ticket->from_location_id->address}}</p>
            <p><strong>Titik Turun:</strong> {{$ticket->from_location_id->address}}</p>
            <p><strong>Date Departure:</strong> <span class="text-red-500">{{$date}}</span></p>
            <p><strong>Time Departure:</strong> <span class="text-red-500 text-2xl font-bold">{{$ticket->departure_time}}</span></p>
        </div>
        <div class="text-right">
            <p class="text-blue-500 text-xl font-bold">{{$ticket->ticket_price}}</p>
            <a class="bg-blue-500 text-white px-4 py-2 rounded mt-2" href="order.html">Choose</a>
        </div>
    </div>
    @endforeach
</section>
@endsection