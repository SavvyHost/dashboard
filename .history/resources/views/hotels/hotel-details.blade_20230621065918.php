<x-layout.default>
    @section('title','Hotels - New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        {{-- <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('hotels.show')}}" class="text-primary hover:underline">Hotels</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul> --}}
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light"> Hotel Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    {{-- <form class="space-y-5" method="POST" action="{{route('hotel.form.save')}}" enctype="multipart/form-data"> --}}
                        @csrf
                        @foreach ($hotels as $hotel)
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Name</label>
                            {{-- <div >{{$hotel->name}}</div> --}}

                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelLocation" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Location</label>
                            <div >{{$hotel->location}}</div>

                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Price</label>
                            <div >{{$hotel->price}}</div>

                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Banner Image</label>
                                <div >{{$hotel->banner}}</div>
                                <output></output>
                            </div>
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Images</label>
                                <div >{{$hotel->images}}</div>
                                <output></output>
                            </div>

                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            @foreach ($hotel->attrs as $attr)
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">{{$attr->name}}</label>
                                    {{-- <select class="selectize" name="terms[]" multiple='multiple'>
                                        @foreach ($attr->terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-5">
                            <label for="editor">Description</label>
                            <div >{{$hotel->description}}</div>

                            <div id="editor"></div>
                        </div>


                        {{-- <button type="submit" class="btn btn-primary !mt-6">Submit</button> --}}
                    </form>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>

    <!-- end hightlight js -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function() {
        // Populate hidden form on submit
        var content = document.querySelector(".ql-editor").innerHTML;
        var bio = document.querySelector('input[name=description]');
        bio.value = content;
        };
    </script>
    <!-- script -->
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
    </script>
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("hotels", () => ({
                    defaultParams: {
                        id: null,
                        name: '',
                        email: '',
                        username: '',
                        phone: '',
                    },
                    displayType: 'list',
                    params: {
                        id: null,
                        name: '',
                        email: '',
                        username: '',
                        phone: '',
                    },
                    filteredHotelsList: [],
                    searchHotel: '',
                    hotelsList: {!! $hotels !!},

                    init() {
                        this.searchHotels();
                    },

                    searchHotels() {
                        this.filteredHotelsList = this.hotelsList.filter((d) => d.name.toLowerCase()
                            .includes(this.searchHotel.toLowerCase()));
                    },

                }));
            });
        </script>
</x-layout.default>
