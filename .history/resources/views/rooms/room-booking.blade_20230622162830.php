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
                        <
                    </div>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                        <!-- show.blade.php -->
                <div>
                    <h1>Room Details</h1>


                    <p>Name: {{ $room->name }}</p>
                    <p>Price: {{ $room->price }}</p>
                    <p>Banner: <img src="{{ asset('assets/hotel-photos/' . $room->banner) }}" alt="Hotel Banner"></p>
                    <p>Images:</p>



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

                    <div> @foreach ($room->types as $type)
                    <p>Type: {{ $type->name }}</p>

                    <div>
                        @foreach ($room->meals as $meal)
                            <p>Meal: {{ $meal->name }}</p>
                            <p>Meal Details: {{ $meal->description }}</p>
                        @endforeach
                    </div>


                    <div>


                    </div>





                </div>
                <!-- Include other relevant hotel details as needed -->

        </div>

    </div>
    <style>
   .swiper-container {
  position: relative;
  width: 50%;
  height: 400px;
  margin: 100 auto;

}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* opacity: 0; */
  transition: opacity 0.3s ease-in-out;
}

.swiper-slide-active {
    opacity: 1;
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

    <script>
     var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      init: function () {
        this.slides[this.activeIndex].style.opacity = 1;
      },
      slideChange: function () {
        for (var i = 0; i < this.slides.length; i++) {
          if (i !== this.activeIndex) {
            this.slides[i].style.opacity = 0;
          }
        }
        this.slides[this.activeIndex].style.opacity = 1;
      },
    },
//   });
      });
    </script>
    <!-- end hightlight js -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function() {
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
