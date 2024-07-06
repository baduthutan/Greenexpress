<!-- resources/views/tickets.blade.php -->

@extends('template')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-64" style="background-image: url('bus_background.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-3xl font-bold mb-2">Let's Have a Better Trip Experience!</h1>
                <p>Booking in Just a Few Clicks</p>
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="bg-white shadow-lg rounded-lg p-6 mt-6 max-w-md mx-auto md:max-w-2xl">
        <form action="{{ route('ticket.search') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="from" class="block text-sm font-medium text-gray-700 mb-2">Choose an option:</label>
                <select id="from" name="from" class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled selected> -- select an option -- </option>
                    @foreach ($areas as $area)
                        <optgroup label="{{ $area->area_name }}">
                            @foreach ($area->locations as $location)
                                <option value="{{ $location->id }}" data-area-id="{{ $location->area_id }}">{{ $location->address }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="to" class="block text-sm font-medium text-gray-700 mb-2">Choose an option:</label>
                <select id="to" name="to" class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                    <option value="" disabled selected> -- select an option -- </option>
                    @foreach ($areas as $area)
                        <optgroup label="{{ $area->area_name }}">
                            @foreach ($area->locations as $location)
                                <option value="{{ $location->id }}" data-area-id="{{ $location->area_id }}">{{ $location->address }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                <input type="date" id="date" name="date" class="w-full border border-gray-300 p-2 rounded" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
            </div>
            <div class="flex mb-4 space-x-4">
                <div class="w-1/2">
                    <label for="adults" class="block text-sm font-medium text-gray-700 mb-2">Adult Passengers</label>
                    <input type="number" id="adults" name="adults" class="w-full border border-gray-300 p-2 rounded" value="1">
                </div>
                <div class="w-1/2">
                    <label for="children" class="block text-sm font-medium text-gray-700 mb-2">Child Passengers</label>
                    <input type="number" id="children" name="children" class="w-full border border-gray-300 p-2 rounded" value="0">
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Search</button>
        </form>
    </section>

    <script>
    $(document).ready(function() {
        const fromSelect = $('#from');
        const toSelect = $('#to');

        fromSelect.on('change', function() {
            const selectedOption = $(this).find('option:selected');
            const selectedAreaId = selectedOption.data('area-id');
            let allowedAreaIds = [];
            if (selectedAreaId == 1 || selectedAreaId == 2) {
                allowedAreaIds = [3, 4];
            }else{
                allowedAreaIds = [1,2];
            }

            enableAndFilterToOptions(allowedAreaIds);
        });

        function enableAndFilterToOptions(allowedAreaIds) {
            toSelect.prop('disabled', false);
            toSelect.find('optgroup').each(function() {
                let hasVisibleOption = false;
                const options = $(this).find('option');
                options.each(function() {
                    const optionAreaId = $(this).data('area-id');
                    if (allowedAreaIds.includes(parseInt(optionAreaId))) {
                        $(this).show();
                        hasVisibleOption = true;
                    } else {
                        $(this).hide();
                    }
                });
                $(this).toggle(hasVisibleOption);
            });
            toSelect.val(''); // Reset the 'to' selection
        }
    });
    </script>
    
@endsection

