<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Booking;
use App\Models\BookingCustomer;
use App\Models\Charter;
use App\Models\MasterArea;
use App\Models\MasterSpecialArea;
use App\Services\ScheduleQueryService;
use App\Services\StripeTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\MasterSubArea;
use App\Models\Page;
use Illuminate\Support\Carbon;
use App\Models\ScheduleShuttle;
use App\Models\Voucher;

class WelcomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)->get();
        $pages = Page::get();
        $master_area = MasterArea::query()
            ->with(['master_sub_area' => function ($q) {
                $q->where('is_active', '1')->whereIn('is_charter',[0,2]);
            }])->where('is_active', '1')->whereIn('is_charter',[0,2])->get();

        $data = [
            'title' => env('APP_NAME'),
            'master_area' => $master_area,
            'app_name' => env('APP_NAME'),
            'banners' => $banners,
            'pages' => $pages,
        ];

        return view('home', $data);
    }

    public function page($slug)
    {
        $banners = Banner::where('is_active', true)->get();
        $pages = Page::get();

        if (empty($slug)){
            abort('404');
        }

        $isis = Page::where('slug', $slug)->first();

        $data = [
            'title' => env('APP_NAME'),
            'app_name' => env('APP_NAME'),
            'banners' => $banners,
            'pages' => $pages,
            'isis' => $isis,
        ];

        if (!$isis) {
            return view('page_not_found', $data);
        }

        return view('page', $data);
    }

    public function schedule()
    {
        $pages = Page::get();
        $data = [
            'title' => 'schedule',
            'app_name' => env('APP_NAME'),
            'pages' => $pages
        ];
        return view('user.schedule', $data);
    }

    public function search(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'booking_type' => 'required|string',
            'to_master_sub_area_id' => 'required|integer',
            'area_type' => 'required|string',
        ]);
    
        // Determine charter types based on booking type
        $charterTypes = $request->booking_type !== 'shuttle' ? [1, 2] : [0, 2];
    
        // Get master area with sub areas
        $master_area = MasterArea::query()
            ->with(['master_sub_area' => function ($q) use ($charterTypes) {
                $q->where('is_active', '1')->whereIn('is_charter', $charterTypes);
            }])
            ->where('is_active', '1')
            ->whereIn('is_charter', $charterTypes)
            ->get();
    
        // Get the sub area
        $sub_area = MasterSubArea::find($request->to_master_sub_area_id);
    
        // Get arrival area with sub areas
        $arrival_area = MasterArea::query()
            ->where('area_type', '<>', $request->area_type)
            ->with(['master_sub_area' => function ($q) use ($charterTypes) {
                $q->where('is_active', '1')->whereIn('is_charter', $charterTypes);
            }])
            ->where('is_active', '1')
            ->whereIn('is_charter', $charterTypes)
            ->get();
    
        // Generate schedule data
        $schedule = ScheduleQueryService::generate_data($request);
    
        // Get pages
        $pages = Page::all();
    
        // Prepare data for the view
        $data = [
            'title' => config('app.name'),
            'app_name' => config('app.name'),
            'master_area' => $master_area,
            'arrival_area' => $arrival_area,
            'request' => $request,
            'schedule' => $schedule,
            'pages' => $pages,
        ];
    
        // Return the view with data
        return view('search', $data);
    }
    

    public function booking(Request $request)
    {
        $pages = Page::get();

        $from_type = $request->from_type;
        $from_master_area_id = $request->from_master_area_id;
        $from_master_sub_area_id = $request->from_master_sub_area_id;
        $to_master_area_id = $request->to_master_area_id;
        $to_master_sub_area_id = $request->to_master_sub_area_id;
        $booking_type = $request->booking_type;
        $date_departure = $request->date_departure;
        $passanger_adult = empty($request->passanger_adult) ? 1 : $request->passanger_adult;
        $passanger_baby = empty($request->passanger_baby) ? 0 : $request->passanger_baby ;
        $schedule_id = $request->schedule_id;

        session([
            'from_type' => $from_type,
            'from_master_area_id' => $from_master_area_id,
            'from_master_sub_area_id' => $from_master_sub_area_id,
            'to_master_area_id' => $to_master_area_id,
            'to_master_sub_area_id' => $to_master_sub_area_id,
            'booking_type' => $booking_type,
            'date_departure' => $date_departure,
            'passanger_adult' => $passanger_adult,
            'passanger_baby' => $passanger_baby,
            'schedule_id' => $schedule_id,
        ]);

        if ($booking_type == "shuttle") {
            $schedule = ScheduleShuttle::where('is_active', true)->where('id', $schedule_id)->first();
            $base_price = $schedule->price;
            $luggage_price = $schedule->luggage_price;
            $datetime_format = 'Y M d h:i A';
        } else {
            // $schedule = Charter::where('is_available', true)->where('id', $schedule_id)->first();
            $schedule = Charter::where('id', $schedule_id)->first();
            $base_price = $schedule->price;
            $luggage_price = 0;
            $datetime_format = 'Y M d';
        }

        if (!$schedule) {
            $data = [
                'title' => 'Booking Check',
                'app_name' => env('APP_NAME'),
                'pages' => $pages,
            ];
            return view('schedule_not_found', $data);
        }

        if ($from_type == "airport") {
            $from_main_name = MasterArea::where('id', $from_master_area_id)->first()->name;

            $arr_master_sub_area = MasterSubArea::where('id', $from_master_sub_area_id)->first();
            $from_sub_name = ($arr_master_sub_area) ? $arr_master_sub_area->name : "";

            $to_main_name = MasterArea::where('id', $to_master_area_id)->first()->name;
            $to_sub_name = MasterSubArea::where('id', $to_master_sub_area_id)->first()->name;

            $date_time_departure = Carbon::parse($date_departure . " " . $schedule->time_departure)->format($datetime_format);

            $special_areas = MasterSpecialArea::where('is_active', true)->where('master_sub_area_id', $schedule->to_master_sub_area_id)->orderBy('regional_name', 'asc')->get();
        } elseif ($from_type == "city") {
            $from_main_name = MasterArea::where('id', $from_master_area_id)->first()->name;

            $arr_master_sub_area = MasterSubArea::where('id', $from_master_sub_area_id)->first();
            $from_sub_name = ($arr_master_sub_area) ? $arr_master_sub_area->name : "";

            $to_main_name = MasterArea::where('id', $to_master_area_id)->first()->name;

            $arr_master_sub_area = MasterSubArea::where('id', $to_master_sub_area_id)->first();
            $to_sub_name = ($arr_master_sub_area) ? $arr_master_sub_area->name : "";

            $date_time_departure = Carbon::parse($date_departure . " " . $schedule->time_departure)->format($datetime_format);

            $special_areas = MasterSpecialArea::where('is_active', true)->where('master_sub_area_id', $schedule->from_master_sub_area_id)->orderBy('regional_name', 'asc')->get();
        } else {
            $special_areas = collect([]);
        }

        $destination_type = MasterArea::where('id', $to_master_area_id)->first();
        $passanger_total = $passanger_adult + $passanger_baby;
        $base_price_total = $base_price * $passanger_total;

        $pajak = env('PAJAK');
        if(empty($pajak)){
            $pajak=0;
        }



        $data = [
            'title'               => env('APP_NAME'),
            'app_name'            => env('APP_NAME'),
            'request'             => $request,
            'pages'               => $pages,
            'schedule'            => $schedule,
            'special_areas'       => $special_areas,
            'from_main_name'      => $from_main_name,
            'from_sub_name'       => $from_sub_name,
            'to_main_name'        => $to_main_name,
            'to_sub_name'         => $to_sub_name,
            'destination_type'    => $destination_type->area_type,
            'date_time_departure' => $date_time_departure,
            'passanger_adult'     => $passanger_adult,
            'passanger_baby'      => $passanger_baby,
            'passanger_total'     => $passanger_total,
            'base_price_total'    => $base_price_total,
            'luggage_price'       => $luggage_price,
            'pajak'               => $pajak,
        ];

        return view('booking', $data);
    }

    // stripe logic starts here
    public function booking_check(Request $request)
    {
        $encode = $request->code;
        $decode = urldecode($encode);
        $pages = Page::get();

        $bookings = Booking::where('booking_number', $decode)->first();

        if (!$bookings) {
            $data = [
                'title' => 'Booking Check',
                'app_name' => env('APP_NAME'),
                'pages' => $pages,
                'bookings' => $bookings,
            ];
            return view('booking_not_found', $data);
        }

        $vouchers = Voucher::where('id', $bookings->voucher_id)->first();

        $data = [
            'title' => 'Booking Check',
            'app_name' => env('APP_NAME'),
            'pages' => $pages,
            'bookings' => $bookings,
            'vouchers' => $vouchers,
            'hashed_code' => encrypt($bookings->booking_number),
        ];

        return view('check', $data);
    }

    public function booking_ticket(Request $request)
    {
        $encode = $request->code;
        $decode = urldecode($encode);
        $pages = Page::get();

        $bookings = Booking::where('booking_number', $decode)->first();
        $booking_customers = BookingCustomer::where('booking_id', $bookings->booking_number)->get();
        $charter = null;
        if ($bookings->schedule_type) {
            $charter = Charter::where('id', $bookings->schedule_id)->first();
        }

        $data = [
            'title' => 'E - Ticket',
            'app_name' => env('APP_NAME'),
            'pages' => $pages,
            'bookings' => $bookings,
            'charter' => $charter,
            'booking_customers' => $booking_customers,
            'hashed_code' => encrypt($bookings->booking_number),
        ];

        $pdf = PDF::loadview('ticket', $data);
        // return $pdf->download('e-ticket.pdf');
        return $pdf->setPaper('a4', 'potrait')->stream();
    }

    public function booking_payment(Request $request)
    {
        $pages = Page::get();

        try {
            $decryptNumberBooking = decrypt($request->hcode);
        } catch (DecryptException $e) {
            $data = [
                'title' => 'Booking process',
                'app_name' => env('APP_NAME'),
                'pages' => $pages,
                'bookings' => null,
            ];
            return view('booking_not_found', $data);
        }


        $bookings = Booking::where('booking_number', (string)$decryptNumberBooking)->first();

        if (!$bookings) {
            $data = [
                'title' => 'Booking Payment',
                'app_name' => env('APP_NAME'),
                'pages' => $pages,
                'bookings' => $bookings,
            ];

            return view('booking_not_found', $data);
        }


        if ($bookings->payment_status == 'paid' || $bookings->payment_status !== 'waiting') {
            $data = [
                'title' => 'Booking Payment',
                'app_name' => env('APP_NAME'),
                'pages' => $pages,
                'bookings' => $bookings,
            ];

            return view('booking_not_found', $data);
        }

        $vouchers = Voucher::where('id', $bookings->voucher_id)->first();

        $stripe = new StripeTransaction();

        $response = $stripe->create_intent($bookings);

        if ($response->status !== 'requires_payment_method') {
            try {
                $decryptNumberBooking = decrypt($request->hcode);
            } catch (DecryptException $e) {
                abort(401);
            }

            return redirect()->route("booking_check", ["code" => $decryptNumberBooking])->with("message", "<div class='alert alert-warning' role='alert'><span class='font-weight-bold'><i class='fas fa-exclamation-triangle'></i> Something wrong happened, please contact the admin !</span> </div>");
        }

        $data = [
            'title' => 'Booking Payment',
            'app_name' => env('APP_NAME'),
            'pages' => $pages,
            'bookings' => $bookings,
            'vouchers' => $vouchers,
            'hcode' => encrypt($decryptNumberBooking),
            'client_secret' => $response->client_secret,
            'intent_id' => $response->id
        ];

        return view('payment', $data);
    }

    public function booking_process(Request $request)
    {
        try {
            $decryptNumberBooking = decrypt($request->hcode);
        } catch (DecryptException $e) {
            abort(401);
        }

        $bookings = Booking::where('booking_number', (string)$decryptNumberBooking)->first();

        $stripe = new StripeTransaction();
        $response = $stripe->retrive_payment_intent($request->intent_id);

        if ($response->status !== 'succeeded') {
            return redirect()->route("booking_check", ["code" => $decryptNumberBooking])->with("message", "<div class='alert alert-warning' role='alert'><span class='font-weight-bold'><i class='fas fa-exclamation-triangle'></i> Payment has been processed !</span> </div>");
        }

        if (!$bookings) {
            abort(404);
        }

        if ($bookings->payment_status == 'paid' || $bookings->payment_status !== 'waiting') {
            abort(404);
        }

        Booking::where('id', $bookings->id)->update([
            'payment_status' => 'paid',
            'booking_status' => 'active',
            'payment_method' => $response->payment_method,
            'payment_token' => $response->id,
        ]);

        return redirect()->route("booking_check", ["code" => $decryptNumberBooking])->with("message", "<div class='alert alert-success' role='alert'><span class='font-weight-bold'><i class='fas fa-check-circle'></i> Payment Succeeded !</span> </div>");
    }

    public function payment_venmo(Request $request)
    {
        try {
            $decryptNumberBooking = decrypt($request->hcode);
        } catch (DecryptException $e) {
            abort(401);
        }

        $decode = $decryptNumberBooking;

        $bookings = Booking::where('booking_number', $decryptNumberBooking)->update([
            'payment_status' => 'paid',
            'booking_status' => 'active',
            'payment_method' => 'venmo',
        ]);
        $text = urlencode("Please confirm if Venmo payment has been accepted.\nYour Booking number : *$decryptNumberBooking*");

        return redirect()->route("booking_check", ["code" => $decryptNumberBooking])->with("message", "<div class='alert alert-success' role='alert'><span class='font-weight-bold'><i class='fas fa-check-circle'></i> Please confirm if Venmo payment has been accepted ! <br> inform us via <a href='https://wa.me/+12152718381?text=$text' target='_blank'> Whatsapp Message<i class='fab fa-whatsapp'></i></a></span> </div>");
    }

    public function payment_bank(Request $request)
    {
        try {
            $decryptNumberBooking = decrypt($request->hcode);
        } catch (DecryptException $e) {
            abort(401);
        }

        $decode = $decryptNumberBooking;

        $bookings = Booking::where('booking_number', $decryptNumberBooking)->update([
            'payment_status' => 'paid',
            'booking_status' => 'active',
            'payment_method' => 'bank',
        ]);

        $text = urlencode("Please confirm if bank transfer payment has been accepted.\nYour Booking number : *$decryptNumberBooking*");

        return redirect()->route("booking_check", ["code" => $decryptNumberBooking])->with("message", "<div class='alert alert-success' role='alert'><span class='font-weight-bold'><i class='fas fa-check-circle'></i> Please inform if Bank Transfer payment has been made ! <br>inform us via <a href='https://wa.me/+12152718381?text=$text' target='_blank'> Whatsapp Message <i class='fab fa-whatsapp'></i></a></span> </div>");
    }
}
