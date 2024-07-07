@extends('template')

@section('content')
 <!-- Schedule List -->
 <section class="mt-8">
    <h2 class="text-2xl font-bold text-green-600 mb-4">Schedule List</h2>
    @foreach($schedules as $schedule)
    <div class="bg-white shadow-lg rounded-lg p-4 mb-4 flex justify-between items-center">
        <div>
            <p><strong>Adults:</strong>{{$adults}}</p>
            <p><strong>Children:</strong> {{$children}}</p>
            <p><strong>From:</strong>{{$schedule->fromlocation->address}}</p>
            <p><strong>To:</strong> {{$schedule->tolocation->address}}</p>
            <p><strong>Date Departure:</strong> <span class="text-red-500">{{$date}}</span></p>
            <p><strong>Time Departure:</strong> <span class="text-red-500 text-2xl font-bold">{{$schedule->departure_time}}</span></p>
        </div>
        <div class="text-right">
            <p class="text-blue-500 text-xl font-bold">{{$schedule->ticket_price}}</p>
            <form method="POST" action="{{ route('ticket.book') }}">
                @csrf
                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="schedule" value="{{$schedule->schedule_id}}">
                <input type="hidden" name="adults" value="{{$adults}}">
                <input type="hidden" name="children" value="{{$children}}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3">Book Now</button>
            </form>
        </div>
    </div>
    @endforeach
</section>
@endsection