@extends('layouts.frontend.app')
@section('page_content')
    <section id="home" class="home d-flex align-items-center" data-scroll-index="0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center mt-5">Search Airport Shuttle & Charter Booking Schedule</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="booking" class="booking section-padding" data-scroll-index="1">
        <!--        <img src="img/8493.jpg" class="bg" loading="lazy"/>-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 mb-5">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="text-center font-weight-bold mb-4">Airport Shuttle & Charter Booking</h5>
                            {{--
                            <form action="{{ route('search') }}" method="get">--}}
                            {{-- <input type="hidden" name="area_type" id="area_type"
                                        value="{{ $request->area_type }}"/>--}}

                            {{--
                            <div class="row">--}}
                            {{--
                            <div class="col-sm-12">--}}
                            {{--
                            <div class="row">--}}
                            {{--
                            <div class="col-sm-3">--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label class="form-text font-weight-bold">Type</label>--}}
                            {{--
                            <div class="form-check form-check-inline">--}}
                            {{-- <input class="form-check-input" type="radio"
                                        name="booking_type" --}}
                            {{-- id="shuttle" value="shuttle" --}}
                            {{-- {{ $request->booking_type == 'shuttle' ? 'checked'
                : '' }}>--}}
                            {{-- <label class="form-check-label" for="shuttle">Shuttle</label>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="form-check form-check-inline">--}}
                            {{-- <input class="form-check-input" type="radio"
                                        name="booking_type" --}}
                            {{-- id="charter" value="charter" --}}
                            {{-- {{ $request->booking_type == 'charter' ? 'checked'
                : '' }}>--}}
                            {{-- <label class="form-check-label" for="charter">Charter</label>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="col-sm-3">--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label for="from_master_sub_area_id" --}}
                            {{-- class="form-text font-weight-bold">From
                    <small--
                    }}
                    {{-- class="text-danger font-weight-bolder">*</small></label>--}}
                            {{-- <select class="form-control select2" id="from_master_sub_area_id"
                                         --}}
                            {{-- name="from_master_sub_area_id" --}}
                            {{-- data-placeholder="Select from location" --}}
                            {{-- style="width: 100%;">--}}
                            {{--
                            <option value=""></option>
                            --}}
                            {{-- @foreach ($master_area as $item)--}}
                            {{--
                            <optgroup label="{{ $item->name }}">--}}
                            {{-- @foreach ($item->master_sub_area as $subItem)--}}
                            {{-- @if ($request->from_master_sub_area_id == $subItem->id)--}}
                            {{--
                            <option value="{{ $subItem->id }}" --}}
                            {{-- data-area-type="{{ $item->area_type }}" --}}
                            {{--
                            data-master-area-id="{{ $subItem->master_area_id }}"
                            --}}
                            {{-- selected>{{ $subItem->name }}
                    </option>
                    --}}
                            {{-- @else--}}
                            {{--
                            <option value="{{ $subItem->id }}" --}}
                            {{-- data-area-type="{{ $item->area_type }}" --}}
                            {{--
                            data-master-area-id="{{ $subItem->master_area_id }}">
                        --}}
                            {{-- {{ $subItem->name }}
                        </option>
                        --}}
                            {{-- @endif--}}
                            {{-- @endforeach--}}
                            {{--
                        </optgroup>
                        --}}
                            {{-- @endforeach--}}
                            {{-- </select>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="col-sm-3">--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label for="to_master_sub_area_id" --}}
                            {{-- class="form-text font-weight-bold">To--}}
                            {{-- <small class="text-danger font-weight-bolder">*</small></label>--}}
                            {{--
                            <!--                                                    <select class="form-control select2" id="to_master_sub_area_id"-->
                            --}}
                            {{--
                            <!--                                                            name="to_master_sub_area_id" data-placeholder="Select to location"-->
                            --}}
                            {{--
                            <!--                                                            disabled style="width: 100%;" required>-->
                            --}}
                            {{--
                            <!--                                                        <option value=""></option>-->
                            --}}
                            {{--
                            <!--                                                    </select>-->--}}
                            {{-- <select class="form-control select2" id="to_master_sub_area_id"
                                         --}}
                            {{-- name="to_master_sub_area_id" --}}
                            {{-- data-placeholder="Select to location" --}}
                            {{-- style="width: 100%;">--}}
                            {{--
                            <option value=""></option>
                            --}}
                            {{-- @foreach ($arrival_area as $item)--}}
                            {{--
                            <optgroup label="{{ $item->name }}">--}}
                            {{-- @foreach ($item->master_sub_area as $subItem)--}}
                            {{-- @if ($request->to_master_sub_area_id == $subItem->id)--}}
                            {{--
                            <option value="{{ $subItem->id }}" --}}
                            {{-- data-area-type="{{ $item->area_type }}" --}}
                            {{--
                            data-master-area-id="{{ $subItem->master_area_id }}"
                            --}}
                            {{-- selected>{{ $subItem->name }}
                    </option>
                    --}}
                            {{-- @else--}}
                            {{--
                            <option value="{{ $subItem->id }}" --}}
                            {{-- data-area-type="{{ $item->area_type }}" --}}
                            {{--
                            data-master-area-id="{{ $subItem->master_area_id }}">
                        --}}
                            {{-- {{ $subItem->name }}
                        </option>
                        --}}
                            {{-- @endif--}}
                            {{-- @endforeach--}}
                            {{--
                        </optgroup>
                        --}}
                            {{-- @endforeach--}}
                            {{-- </select>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="alert alert-warning" role="alert" --}}
                            {{-- id="alert-charter" {!! $request->booking_type == 'charter' ?
                           "style='display: block;'" : "style='display: none;'" !!}>--}}
                            {{-- <small>--}}
                            {{-- Private Charter for other destination, please send us your--}}
                            {{-- itinerary (date and time, from, to, visiting places if any,--}}
                            {{-- estimated visiting time)
                            <a--
                            }}
                            {{-- class="font-weight-bold text-success"--}}
                            {{--
                            href="https://wa.me/+12152718381?text=Please%20send%20us%20your%20Date
                            and time:%0Ano of people%0AFrom:%0ATo:%0AVisiting places (if any):
                            Estimated visiting time (if Any):%0A"--}}
                            {{-- target="_blank">Whatsapp.
                            <i--
                            }}
                            {{-- class='fab fa-whatsapp'></i></a>--}}
                            {{-- </small>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="col-sm-3">--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label for="date_departure" class="form-text font-weight-bold">Departure--}}
                            {{-- or Arrival Date
                            <small
                            }}
                            {{-- class="text-danger font-weight-bolder">*</small></label>--}}
                            {{-- <input type="text" class="form-control form-control-sm" --}}
                            {{-- id="date_departure" name="date_departure" --}}
                            {{-- placeholder="Departure / Arrival Date" --}}
                            {{-- value="{{ $request->date_departure }}" required/>--}}
                            {{-- <small class="form-text text-muted">Booking within one day
                                before--}}
                            {{-- departure / arrival date please call us or send text--}}
                            {{-- messages</small>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}

                            {{--
                            <div class="col-sm-6 passenger_adult_input" --}}
                            {{-- {{ $request->booking_type == 'charter' ? 'style=display:none;' : ''
                           }}>--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label for="passanger_adult" class="form-text font-weight-bold">Adult--}}
                            {{-- Passengers
                            <small
                            }}
                            {{-- class="text-danger font-weight-bolder">*</small></label>--}}
                            {{--
                            <div class="input-group">--}}
                            {{-- --}}{{-- <input type="number" class="form-control"
                                                 id="passanger_adult" --}}
                            {{-- --}}{{-- name="passanger_adult"
                            placeholder="Adult Passangers" --}}
                            {{-- --}}{{-- min="1"
                            value="{{ $request->passanger_adult }}" --}}
                            {{-- --}}{{-- required/>--}}
                            {{-- <select class="form-control" id="passanger_adult" --}}
                            {{-- name="passanger_adult" required>--}}
                            {{-- @for ($i = 1; $i <= 20; $i++)--}}
                            {{-- @if($request->passanger_adult == $i)--}}
                            {{--
                            <option value="{{$i}}" selected>{{$i}}</option>
                            --}}
                            {{-- @else--}}
                            {{--
                            <option value="{{$i}}">{{$i}}</option>
                            --}}
                            {{-- @endif--}}
                            {{-- @endfor--}}
                            {{-- </select>--}}
                            {{--
                            <div class="input-group-append bg-light">--}}
                            {{-- <span class="input-group-text">Adult</span>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                            <div class="col-sm-6 passenger_baby_input" --}}
                            {{-- {{ $request->booking_type == 'charter' ? 'style=display:none;' : ''
                           }}>--}}
                            {{--
                            <div class="form-group">--}}
                            {{-- <label for="passanger_baby" class="form-text font-weight-bold">Child--}}
                            {{-- Passengers
                            <small
                            }}
                            {{-- class="text-danger font-weight-bolder">*</small></label>--}}
                            {{--
                            <div class="input-group">--}}
                            {{-- --}}{{-- <input type="number" class="form-control"
                                                 id="passanger_baby" --}}
                            {{-- --}}{{-- name="passanger_baby"
                            placeholder="0" --}}
                            {{-- --}}{{-- min="0"
                            aria-describedby="inputGroup-sizing-sm" --}}
                            {{-- --}}{{-- max="9" --}}
                            {{-- --}}{{--
                            value="{{ empty($request->passanger_baby) ? 0 : $request->passanger_baby }}"
                            --}}
                            {{-- --}}{{--/>--}}
                            {{-- <select class="form-control" id="passanger_baby" --}}
                            {{-- name="passanger_baby" required>--}}
                            {{-- @for ($i = 0; $i <= 20; $i++)--}}
                            {{-- @if($request->passanger_baby == $i)--}}
                            {{--
                            <option value="{{$i}}" selected>{{$i}}</option>
                            --}}
                            {{-- @else--}}
                            {{--
                            <option value="{{$i}}">{{$i}}</option>
                            --}}
                            {{-- @endif--}}
                            {{-- @endfor--}}
                            {{-- </select>--}}
                            {{--
                            <div class="input-group-append bg-light" --}}
                            {{-- id="inputGroup-sizing-sm">--}}
                            {{-- <span class="input-group-text text-sm">Child</span>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{-- <small class="form-text text-muted">--}}
                            {{-- Child is up to 8 years old--}}
                            {{-- </small>--}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}

                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </div>
                        --}}

                            {{--
                            <div class="form-group">--}}
                            {{--
                            <button type="submit" class="btn btn-primary btn-block">--}}
                            {{-- <i class="fas fa-search fa-fw"></i> Search--}}
                            {{--
                        </button>
                        --}}
                            {{--
                        </div>
                        --}}
                            {{--
                        </form>
                        --}}

                            <div class="form-group">
                                <a href="/" class="btn btn-primary btn-block">
                                    <i class="fas fa-exchange"></i> Change Schedule
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card card-semi shadow">
                        <div class="card-body">
                            <div class="section-title">
                                <h1>Schedule List</h1>
                                @if($request->booking_type == 'charter')
                                    <div class="alert alert-warning" role="alert">
                                        Please send us your itinerary (Date and Time, Number of people, From, To,
                                        Visiting
                                        places (if any), Estimated visiting time (if any):
                                        <br>
                                        <a class="font-weight-bold text-success"
                                           href="https://wa.me/+12152718381?text=Please%20send%20us%20your%20Date and time:%0ANumber of people%0AFrom:%0ATo:%0AVisiting places (if any): Estimated visiting time (if Any):%0A"
                                           target="_blank">Contact us via Whatsapp message <i
                                                class='fab fa-whatsapp'></i></a>
                                    </div>
                                @endif
                                <div class="row" id="list_jadwal">
                                    @forelse($schedule as $item)
                                        <div class="col-12 my-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-7 pr-2 d-flex align-items-center
                                                                    justify-content-center flex-column">
                                                                    <h5 style="font-size: 1rem; font-weight: 700;">From
                                                                        {{ $item->from_master_area->name }}
                                                                        @if($request->booking_type == 'shuttle')
                                                                            {{ $item->from_master_sub_area->name }}
                                                                        @endif
                                                                        <br>
                                                                        <br>
                                                                        To
                                                                        {{ $item->to_master_area->name }}
                                                                        @if($request->booking_type == 'shuttle')
                                                                            {{ $item->to_master_sub_area->name }}
                                                                        @endif
                                                                    </h5>
                                                                </div>
                                                                <div
                                                                    class="col-sm-5 text-left d-flex align-items-center
                                                                    sm:justify-content-start">
                                                                    <div>
                                                                        <span class="font-weight-bold">Date Departure :
                                                                            <br>
                                                                            <span
                                                                                class="text-danger">{{ \Carbon\Carbon::parse($request->date_departure)->format('d M Y') }}</span>
                                                                            </span>
                                                                        <br>
                                                                        @if ($request->booking_type == 'shuttle')
                                                                            <span class="font-weight-bold">Time Departure :
                                                                            </span>
                                                                            <br>
                                                                            <h3 class="font-weight-bold text-danger">
                                                                                {{ date('h:i A', strtotime($item->time_departure))
                                                                                }}
                                                                            </h3>
<!--                                                                        <span class="font-weight-bold">Available seat :-->
<!--                                                                             <h3 class="font-weight-bold text-danger">{{ $item->total_seat - $item->seat_booked }}</h3>-->
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 d-flex align-items-center">
                                                            <div class="row">
                                                                <div
                                                                    class="col-sm-12 col-md-12 d-flex align-items-center">
                                                                    <div>
                                                                        <p>
                                                                            @if($request->booking_type ==
                                                                            'charter')
                                                                                Vehicle data: <span
                                                                                    class="font-weight-bold">{{
                                                                                    $item->vehicle_name }} , Max :{{
                                                                                    $item->total_seat }} Passenger)
                                                                                    </span>
                                                                                <br>
                                                                            @endif
                                                                            Ticket Price :
                                                                            <span
                                                                                class="font-weight-bold text-primary">${{ $item->price }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-1 my-auto">
                                                                <?php
//                                                                echo $item;
//                                                                $is_available = true;
                                                                $btn_type = 'submit';
                                                                if (!$item->is_available)  $btn_type = 'button';
//                                                                if ($item->total_seat - $item->seat_booked <= 0 && $request->booking_type !== 'charter') {
//                                                                    $is_available = false;
//                                                                    $btn_type = 'button';
//                                                                } elseif (($request->passanger_adult + $request->passanger_baby) > $item->total_seat && $request->booking_type !== 'charter') {
//                                                                    $is_available = false;
//                                                                    $btn_type = 'button';
//                                                                } elseif($request->booking_type == 'charter') {
//                                                                    $is_available = $item->is_available;
//                                                                    if (!$item->is_available) {
//                                                                        $btn_type = 'button';
//                                                                    }
//                                                                }
                                                                ?>
                                                            <form method="post" action="/booking">
                                                                @csrf
                                                                <input type="hidden" name="from_type"
                                                                       value="{{ $item->from_type }}"/>
                                                                <input type="hidden" name="from_master_area_id"
                                                                       value="{{ $item->from_master_area_id }}"/>
                                                                <input type="hidden" name="from_master_sub_area_id"
                                                                       value="{{ $request->from_master_sub_area_id }}"/>
                                                                <input type="hidden" name="to_master_area_id"
                                                                       value="{{ $item->to_master_area_id }}"/>
                                                                <input type="hidden" name="to_master_sub_area_id"
                                                                       value="{{ $request->to_master_sub_area_id }}"/>
                                                                <input type="hidden" name="booking_type"
                                                                       value="{{ $request->booking_type }}"/>
                                                                <input type="hidden" name="date_departure"
                                                                       value="{{ $request->date_departure }}"/>
                                                                <input type="hidden" name="passanger_adult"
                                                                       value="{{ $request->passanger_adult }}"/>
                                                                <input type="hidden" name="passanger_baby"
                                                                       value="{{ $request->passanger_baby }}"/>
                                                                <input type="hidden" name="special_area_id"
                                                                       value="{{ $item->special_area_id }}"/>
                                                                <input type="hidden" name="schedule_id"
                                                                       value="{{ $item->id }}"/>
                                                                <input type="hidden" name="is_available"
                                                                       value="{{ $item->is_available }}"/>

                                                                {{--
                                                                <button type="{{$btn_type}}" --}}
                                                                {{--
                                                                class="btn btn-info font-weight-bold sm:btn-block {{ ($item->is_available ? '' : 'disabled')}}">
                                                            --}}
                                                                {{-- <i class="fas fa-shuttle-van"></i> Choose --}}
                                                                {{--
                                                            </button>
                                                            --}}
                                                                <button type="{{ $btn_type }}"
                                                                        class="btn btn-info font-weight-bold sm:btn-block"
                                                                        @if (!$item->is_available && $request->booking_type
                                                                         !== 'charter' )
                                                                            onclick="show_swal('This booking doesn\'t have any available seat at moment, Please contact admin, so that can immediately provide info when seats are available.')"
                                                                        @endif
                                                                        @if (!$item->is_available && $request->booking_type
                                                                                 == 'charter' )
                                                                            onclick="show_swal('This charter car ' +
                                                                             'isn\'t ' +
                                                                             'available at moment, Please contact ' +
                                                                              'admin, so that can immediately provide' +
                                                                               ' info when this car is available.')"
                                                                    @endif
                                                                >

                                                                    <i class="fas fa-shuttle-van"></i> Choose
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <img src="{{ asset('img/undraw_empty_re_opql.svg') }}" alt="not found"
                                                 style="width: 400px;"/>
                                        </div>
                                        <div class="col-12 text-center">
                                            <h5 class="my-3 font-weight-bold text-info">Please contact us !</h5>
                                            <div class="alert alert-warning" role="alert">
                                                Booking within one day before departure / arrival date please call us or
                                                send text messages
                                                <br>
                                                <a class="font-weight-bold text-success"
                                                   href="https://wa.me/+12152718381?text=Please%20inform%20us%20the%20seat%20availability%20for%0AName:%0AFrom:%0ATo:%0ADate and time:%0ANo. of people:%0APhone number (Preferably Whatsapp phone number):"
                                                   target="_blank">Contact us via Whatsapp <i
                                                        class='fab fa-whatsapp'></i></a>
                                            </div>
                                        </div>
                                    @endforelse

                                    <div class="col-sm-12 mt-2 d-flex justify-content-center">
                                        <div> {{ $schedule->links() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('vitamin')
<!--    <script src="{{ asset('js/booking.js') }}"></script>-->

    <script>
        function show_swal(message) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: message,
                showConfirmButton: false,
                toast: true,
                timer: 3000,
            });
        }
    </script>
@endsection
