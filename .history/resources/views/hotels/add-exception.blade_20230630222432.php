<x-layout.default>
    @section('title','Hotels - Exceptions New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/flatpickr.min.css') }}">
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nouislider.min.css') }}">
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <div >
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a class="text-primary hover:underline">Hotels</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <a href="{{route('hotels.availabilty.show')}}" class="text-primary hover:underline">Exception</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Exception Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action="{{route('hotels.availabilty.form.save')}}">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="seachable-select" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Name</label>
                            <select class=" flex-1" id="seachable-select"  name="hotel_id" placeholder = "Choose Hotel" required>
                                @foreach ($hotels as $hotel)
                                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex sm:flex-row flex-col">
                            <label for="basic" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">From</label>
                            <!-- basic -->
                            <div x-data="form" class=" flex-1">
                                <input id="basic" x-model="date1" required name="start_date" class="form-input" />
                            </div>

                            <!-- script -->
                            <script>
                                document.addEventListener("alpine:init", () => {
                                    Alpine.data("form", () => ({
                                        date1: '2022-07-05',
                                        init() {
                                            flatpickr(document.getElementById('basic'), {
                                                dateFormat: 'Y-m-d',
                                                defaultDate: this.date1,
                                            })
                                        }
                                    }));
                                });
                            </script>
                        </div>

                        <div class="flex sm:flex-row flex-col ">
                            <label for="to" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">To</label>
                            <!-- basic -->
                            <div x-data="form1" class=" flex-1">
                                <input id="to" x-model="date2" required name="end_date"  class="form-input" />
                            </div>

                            <!-- script -->
                            <script>
                                document.addEventListener("alpine:init", () => {
                                    Alpine.data("form1", () => ({
                                        date2: '2022-07-05',
                                        init() {
                                            flatpickr(document.getElementById('to'), {
                                                dateFormat: 'Y-m-d',
                                                defaultDate: this.date2,
                                            })
                                        }
                                    }));
                                });
                            </script>
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="exceptionprice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Exception Price</label>
                            <input id="exceptionprice" type="text"  placeholder="Enter Exception Price"
                                class="form-input flex-1" name="new_price" required />
                        </div>

                        <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>
    <script>
         document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });

            // seachable
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });
    </script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                date1: '2022-07-05',
                init() {
                    flatpickr(document.getElementById('basic'), {
                        dateFormat: 'Y-m-d',
                        defaultDate: this.date1,
                    })
                }
            }));
        });
    </script>


</x-layout.default>
