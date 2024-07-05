@extends('template')

@section('content')
        <!-- Order Form Section -->
        <section class="bg-white shadow-lg rounded-lg p-6 lg:w-2/3 mb-6 lg:mb-0">
            <!-- Contact Details -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-4">Detail Pemesan</h2>
                <p class="text-gray-600 mb-4">Detail kontak ini akan digunakan untuk pengiriman e-tiket dan keperluan reschedule.</p>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Title</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="title" value="Mr" class="form-radio">
                                <span class="ml-2">Mr</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="title" value="Mrs" class="form-radio">
                                <span class="ml-2">Mrs</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="title" value="Ms" class="form-radio">
                                <span class="ml-2">Ms</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="fullname" class="block text-gray-700">Full Name According to ID/Passport</label>
                        <input type="text" id="fullname" class="w-full border border-gray-300 p-2 rounded" placeholder="Full Name According to ID/Passport">
                    </div>
                    <div class="mb-4">
                        <label for="mobile" class="block text-gray-700">Mobile Number</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l border border-r-0 border-gray-300 bg-gray-200 text-gray-700">+62</span>
                            <input type="tel" id="mobile" class="w-full border border-gray-300 p-2 rounded-r" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email Address</label>
                        <input type="email" id="email" class="w-full border border-gray-300 p-2 rounded" placeholder="Email Address">
                    </div>
                </form>
            </div>

            <!-- Passenger Details -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Detail Penumpang</h2>
                <p class="text-gray-600 mb-4">Pastikan untuk mengisi detail penumpang dengan benar agar perjalananmu lancar.</p>
                <!-- Passenger 1 -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-4">Penumpang 1</h3>
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <p class="font-semibold">Haryanto</p>
                            <p>Kursi 3C</p>
                        </div>
                        <button class="text-blue-500">Ubah kursi</button>
                    </div>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Title</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="passenger1_title" value="Mr" class="form-radio">
                                    <span class="ml-2">Mr</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="passenger1_title" value="Mrs" class="form-radio">
                                    <span class="ml-2">Mrs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="passenger1_title" value="Ms" class="form-radio">
                                    <span class="ml-2">Ms</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="passenger1_fullname" class="block text-gray-700">Full Name According to ID/Passport</label>
                            <input type="text" id="passenger1_fullname" class="w-full border border-gray-300 p-2 rounded" placeholder="Full Name According to ID/Passport">
                        </div>
                        <div class="mb-4">
                            <label for="passenger1_dob" class="block text-gray-700">Date of Birth</label>
                            <input type="date" id="passenger1_dob" class="w-full border border-gray-300 p-2 rounded">
                        </div>
                    </form>
                </div>

                <!-- Passenger 2 -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-xl font-bold mb-4">Penumpang 2</h3>
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <p class="font-semibold">Haryanto</p>
                            <p>Kursi 3D</p>
                        </div>
                        <button class="text-blue-500">Ubah kursi</button>
                    </div>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Title</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="passenger2_title" value="Mr" class="form-radio">
                                    <span class="ml-2">Mr</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="passenger2_title" value="Mrs" class="form-radio">
                                    <span class="ml-2">Mrs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="passenger2_title" value="Ms" class="form-radio">
                                    <span class="ml-2">Ms</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="passenger2_fullname" class="block text-gray-700">Full Name According to ID/Passport</label>
                            <input type="text" id="passenger2_fullname" class="w-full border border-gray-300 p-2 rounded" placeholder="Full Name According to ID/Passport">
                        </div>
                        <div class="mb-4">
                            <label for="passenger2_dob" class="block text-gray-700">Date of Birth</label>
                            <input type="date" id="passenger2_dob" class="w-full border border-gray-300 p-2 rounded">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Booking Detail Section -->
        <section class="bg-green-500 text-white shadow-lg rounded-lg p-6 lg:w-1/3">
            <h2 class="text-2xl font-bold mb-4">Booking Detail</h2>
            <p class="mb-4">Booking Type: Shuttle</p>
            <p>From: Philadelphia - 2800 south 3rd st PA19148 (Oregon Supermarket)</p>
            <p>To: JFK Airport - Terminal 1</p>
            <p>Date: 2024 Jul 04 07:50 AM</p>
            <p>Passenger: 2 Adult 1 Child</p>
            <p>Luggage: 0 Pcs</p>
            <p>Overweight or Oversized Luggage: 0 Pcs</p>
            <div class="mt-4">
                <p class="flex justify-between"><span>Base Price:</span><span>$210</span></p>
                <p class="flex justify-between"><span>Special request drop off Price:</span><span>$0</span></p>
                <p class="flex justify-between"><span>Extra Luggage Price:</span><span>$0</span></p>
                <p class="flex justify-between"><span>Overweight or Oversized Luggage Price:</span><span>$0</span></p>
                <div class="mt-4">
                    <label for="voucher" class="block text-gray-700">Voucher</label>
                    <input type="text" id="voucher" class="w-full border border-gray-300 p-2 rounded text-gray-700" placeholder="Voucher">
                </div>
                <div class="mt-4">
                    <p class="flex justify-between"><span>Sub Total:</span><span>$210</span></p>
                    <p class="flex justify-between"><span>Payment Fee (3.7%):</span><span>$7.77</span></p>
                    <p class="flex justify-between"><span>Grand Total:</span><span>$217.77</span></p>
                </div>
            </div>
            <button class="bg-blue-500 text-white p-2 mt-4 w-full rounded">Booking</button>
        </section>
@endsection