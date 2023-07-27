<x-layout.default>
    @section('title','Room - Details')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >


        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light"> Hotel Details</h5>
                    <div>
                        <div class="flex gap-3">
                            @if (auth()->user()->role_id == 1)
                            <div>
                                {{-- <a href="{{ route('hotel.policy.form.show', $hotels->id) }}" role="button" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;"> --}}
                                    <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 2H17C18.8856 2 19.8284 2 20.4142 2.58579C21 3.17157 21 4.11438 21 6V21.25H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3V9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5H11C12.8856 5 13.8284 5 14.4142 5.58579C15 6.17157 15 7.11438 15 9V21.25H16.5V9L16.5 8.91051C16.5001 8.04488 16.5002 7.25121 16.4134 6.60559C16.3178 5.89462 16.0929 5.14317 15.4749 4.52513C14.8568 3.90708 14.1054 3.68219 13.3944 3.5866C12.7579 3.50102 11.9774 3.49991 11.126 3.49999C11.2103 3.11275 11.351 2.82059 11.5858 2.58579C12.1716 2 13.1144 2 15 2ZM5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H12C12.4142 7.25 12.75 7.58579 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8ZM5.25 11C5.25 10.5858 5.58579 10.25 6 10.25H12C12.4142 10.25 12.75 10.5858 12.75 11C12.75 11.4142 12.4142 11.75 12 11.75H6C5.58579 11.75 5.25 11.4142 5.25 11ZM5.25 14C5.25 13.5858 5.58579 13.25 6 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H6C5.58579 14.75 5.25 14.4142 5.25 14ZM9 18.25C9.41421 18.25 9.75 18.5858 9.75 19V21.25H8.25V19C8.25 18.5858 8.58579 18.25 9 18.25Z" fill="currentColor"/>
                                    </svg>
                                    Add Policy
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                        <!-- show.blade.php -->
                <div>
                    <h1>Hotel Details</h1>


                    <p>Name: {{ $room->name }}</p>
                    <p>Price: {{ $room->price }}</p>
                    {{-- <p>Location: {{ $room->location }}</p> --}}
                    <p>Banner: <img src="{{ asset('assets/hotel-photos/' . $room->banner) }}" alt="Hotel Banner"></p>
                    <p>Images:</p>
                            {{-- @if ($room->images)
                                @php
                                    $imageArray = explode(',', $room->images);
                                @endphp
                                @foreach ($imageArray as $image)
                                    <img src="{{ asset('assets/hotel-photos/' . trim($image)) }}" alt="Hotel Image">
                                @endforeach
                            @else
                                <p>No images available</p>
                            @endif
 --}}


                            <div>
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                      @if ($room->images)
                                        @php
                                          $imageArray = explode(',', $room->images);
                                        @endphp
                                        @foreach ($imageArray as $image)
                                          <div class="swiper-slide">
                                            <img src="{{ asset('assets/hotel-photos/' . trim($image)) }}" alt="Hotel Image">
                                          </div>
                                        @endforeach
                                      @else
                                        <div class="swiper-slide">
                                          <p>No images available</p>
                                        </div>
                                      @endif
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                  </div>

                                </div>


                    <p>Description: {{ strip_tags($room->description) }}</p>
                    <div>
                        {{-- @foreach ($hotels->policies as $policy)
                            <p>Policy: {{ $policy->name }}</p>
                            <p>Policy Details: {{ $policy->description }}</p>
                            <td>
                                <form id="delete-form-{{ $policy->id }}" action="{{ route('hotel.policy.destroy', $policy->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <div class="flex gap-4 items-center ">
                                    <a href="{{route('hotel.policy.edit.form.show',$policy->id)}}" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $policy->id }}').submit();">Delete</a>
                                </div>
                            </td>
                        @endforeach --}}



                    </div>





                </div>
                <!-- Include other relevant hotel details as needed -->

        </div>

    </div>
    <style>
        .swiper-slide img {
          width: 50%;
          height: 50%;
        }
      </style>
      <style>
        .swiper-slide {
          position: relative;
        }

        .swiper-button-next,
        .swiper-button-prev {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          width: 30px;
          height: 30px;
          background-color: rgba(255, 255, 255, 0.5);
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 20px;
          color: black;
          z-index: 10;
          cursor: pointer;
        }

        .swiper-button-next {
          right: 10px;
        }

        .swiper-button-prev {
          left: 10px;
        }
      </style>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper('.swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
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
                    hotelsList: {!! $room !!},

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
