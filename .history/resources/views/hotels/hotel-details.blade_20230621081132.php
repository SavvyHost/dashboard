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

                        <!-- show.blade.php -->
                <div>
                    <h1>Hotel Details</h1>
                    <p>Name: {{ $hotels->name }}</p>
                    <p>Price: {{ $hotels->price }}</p>
                    <p>Location: {{ $hotels->location }}</p>
                    <p>Banner: <img src="{{ asset('assets/hotel-photos/' . $hotels->banner) }}" alt="Hotel Banner"></p>
                    <p>Images:</p>
                            @if ($hotels->images)
                                @php
                                    $imageArray = explode(',', $hotels->images);
                                @endphp
                                @foreach ($imageArray as $image)
                                    <img src="{{ asset('assets/hotel-photos/' . trim($image)) }}" alt="Hotel Image">
                                @endforeach
                            @else
                                <p>No images available</p>
                            @endif




                    <p>Description: {{ strip_tags($hotels->description) }}</p>
                    <div>
                        @foreach ($hotels->policies as $policy)
                            <p>Policy: {{ $policy->name }}</p>
                            <p>Policy Details: {{ $policy->description }}</p>
                        @endforeach


                        <td>
                            <form id="delete-form-{{ $policy->id }}" action="{{ route('hotel.destroy', $policy->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-sm btn-outline-danger" >Delete</button> --}}
                            </form>
                            <div class="flex gap-4 items-center ">
                                <a href="{{route('hotel.edit.form.show',$policy->id)}}" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $hotel->id }}').submit();">Delete</a>
                                <a href="{{route('hotel.rooms.show',$policy->id)}}" role="button" class="btn btn-sm btn-outline-success">Manage Rooms</a>
                                <a href="{{route('hotel.details.show',$policy->id)}}" role="button" class="btn btn-sm btn-outline-warning ">Details</a>


                                {{-- <button type="button" class="btn btn-sm btn-outline-danger">Delete</button> --}}

                            </div>
                        </td>
                    </div>





                </div>
                <!-- Include other relevant hotel details as needed -->

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
