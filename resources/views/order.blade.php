@extends('template')

@section('content')
        <!-- Order Form Section -->
        <form id="myForm">
        <div class="grid grid-cols-3 gap-4">
            <section class="bg-white shadow-lg rounded-lg p-6 md:col-span-2">
                <h2 class="text-2xl font-semibold mb-6">Order Data</h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label for="customer-name" class="block text-sm font-medium text-gray-700">Customer Name<span class="text-red-500">*</span></label>
                      <input type="text" id="customer-name" name="customer-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Customer Name" required>
                    </div>
                    <div>
                      <label for="passenger-name" class="block text-sm font-medium text-gray-700">Passenger Name<span class="text-red-500">*</span></label>
                      <input type="text" id="passenger-name" name="passenger-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Passenger Name" required>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700">
                        <input type="checkbox" id="same-name" name="same-name" class="mr-2">
                        Passenger Name is the same with the Customer Name above
                      </label>
                    </div>
                    <div></div>
                    <div>
                      <label for="customer-phone" class="block text-sm font-medium text-gray-700">Customer Phone<span class="text-red-500">*</span></label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <span class="text-gray-500 sm:text-sm">+1</span>
                        </div>
                        <input type="text" id="customer-phone" name="customer-phone" class="pl-7 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Customer Phone" required>
                      </div>
                      <p class="mt-1 text-sm text-gray-500">Please fill in US phone number if available</p>
                    </div>
                    <div>
                      <label for="passenger-phone" class="block text-sm font-medium text-gray-700">Passenger Phone<span class="text-red-500">*</span></label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <span class="text-gray-500 sm:text-sm">+1</span>
                        </div>
                        <input type="text" id="passenger-phone" name="passenger-phone" class="pl-7 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Passenger Phone" required>
                      </div>
                      <p class="mt-1 text-sm text-gray-500">Please fill in US phone number if available</p>
                    </div>
                    <div class="md:col-span-2">
                      <label for="customer-email" class="block text-sm font-medium text-gray-700">Customer Email</label>
                      <input type="email" id="customer-email" name="customer-email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Customer Email">
                    </div>
                    <div>
                      <label for="luggage-qty" class="block text-sm font-medium text-gray-700">Luggage Qty</label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="luggage-qty" name="luggage-qty" class="block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" min="0" placeholder="0">
                        {{-- <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                          Pcs
                        </div> --}}
                      </div>
                      <p class="mt-1 text-sm text-gray-500">Free of charge luggage max 2 pieces and 1 piece hand carry bag. Unusual and fragile luggage must be declared and confirmed. It will be rejected if not declared and confirmed</p>
                    </div>
                    <div>
                      <label for="oversized-luggage-qty" class="block text-sm font-medium text-gray-700">Overweight/Oversized Luggage Qty</label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="oversized-luggage-qty" name="oversized-luggage-qty" class="block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" min="0" placeholder="0">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                          Pcs
                        </div>
                      </div>
                      <p class="mt-1 text-sm text-gray-500">Boxes baggage will be considered as overweight/oversized. Max Weight luggage 50 lbs each, max dimension: L+W+H = 62 inch Hand carry bag max weight 15 lbs, max dimension 22”+14”+9”= 45”</p>
                    </div>
                    <div class="md:col-span-2">
                      <label for="flight-number" class="block text-sm font-medium text-gray-700">Flight Number</label>
                      <input type="text" id="flight-number" name="flight-number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Flight Number">
                    </div>
                    <div class="md:col-span-2">
                      <label for="flight-info" class="block text-sm font-medium text-gray-700">Flight Info</label>
                      <textarea id="flight-info" name="flight-info" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Flight info ie: inform us your departure time or other info"></textarea>
                    </div>
                    <div class="md:col-span-2">
                      <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                      <textarea id="notes" name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Pick up time (for Charter Service). Put your other notes here"></textarea>
                    </div>
                  </div>
        </section>
                <!-- Booking Detail Section -->
                <section class="bg-green-500 text-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Booking Detail</h2>
                    <p class="mb-4">Booking Type: Shuttle</p>
                    <p>From: {{$schedule->fromlocation->area->area_name}} - {{$schedule->fromlocation->address}}</p>
                    <p>To: {{$schedule->tolocation->area->area_name}} - {{$schedule->tolocation->address}}</p>
                    <p>Date: {{$date}} {{$schedule->departure_time}}</p>
                    <p>Adult passenger: {{$adults}} person</p>
                    <p>Child passenger: {{$children}} person</p>
                    <p>Luggage: 0 Pcs</p>
                    <p>Overweight or Oversized Luggage: 0 Pcs</p>
                    <div class="mt-4">
                        <p class="flex justify-between"><span>Base Price:</span><span>$210</span></p>
                        <p class="flex justify-between"><span>Special request drop off Price:</span><span>$0</span></p>
                        <p class="flex justify-between"><span>Extra Luggage Price:</span><span>$0</span></p>
                        <p class="flex"><span id="displayLuggage">0</span> piece(s)</p>
                        <p class="flex justify-between"><span>Overweight or Oversized Luggage Price:</span><span>$0</span></p>
                        <div class="mt-4">
                            <label for="voucher" class="block text-gray-700">Voucher</label>
                            <input type="text" id="voucher" class="w-full border border-gray-300 p-2 rounded text-gray-700" placeholder="Voucher">
                        </div>
                        <div class="mt-4">
                            <p class="flex justify-between"><span>Sub Total:</span><span>${{$schedule->ticket_price}}</span></p>
                            <p class="flex justify-between"><span>Payment Fee (3.7%):</span><span>${{$schedule->ticket_price * 0.037, 2}}</span></p>
                            <p class="flex justify-between"><span>Grand Total:</span><span>$217.77</span></p>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white p-2 mt-4 w-full rounded">Booking</button>
                </section>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                var $luggageQty = $('#luggage-qty');
                var $displayLuggage = $('#displayValue');

                $luggageQty.on('input', function() {
                    $displayLuggage.text($(this).val());
                });

                $('#myForm').on('submit', function(event) {
                    event.preventDefault(); // Prevent the form from submitting
                    $displayElement.text($inputElement.val());
                });
            });
        </script>
@endsection