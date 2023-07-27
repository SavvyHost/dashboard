<x-layout.default>
    @section('title','Room - Details')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >


        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">


                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif




                <div>
                    <select id="hotelDropdown" name="hotel_id">
                        <option value="">Select a hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}" {{ ($hotel->id == $selectedHotelId) ? 'selected' : '' }}>{{ $hotel->name }}</option>
                        @endforeach
                    </select>

                    <select id="roomDropdown" name="room_id" disabled>
                        <option value="">Select a room</option>
                        @foreach ($selectedHotelRooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

        </div>

    </div>
    <style>
   .swiper-container {
  position: relative;
  width: 50%;
  height: 400px; /* Adjust the height as needed */
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
    opacity: 1; /* Display only the image in the current swiper slide */
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
    slidesPerView: 1,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      init: function () {
        // Show the image in the current swiper slide
        this.slides[this.activeIndex].style.opacity = 1;
      },
      slideChange: function () {
        // Hide the images in the previous swiper slides
        for (var i = 0; i < this.slides.length; i++) {
          if (i !== this.activeIndex) {
            this.slides[i].style.opacity = 0;
          }
        }
        // Show the image in the current swiper slide
        this.slides[this.activeIndex].style.opacity = 1;
      },
    },
//   });
      });
    </script>
    <!-- end hightlight js -->

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
        {{-- <script>
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
        </script> --}}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
         $(document).ready(function() {
                    var selectedHotelId = "{{ $selectedHotelId ?? '' }}";

                    $('#hotelDropdown').on('change', function() {
                        var hotelId = $(this).val();
                        if (hotelId) {
                            // Enable and clear the room dropdown
                            $('#roomDropdown').prop('disabled', false);
                            $('#roomDropdown').html('<option value="">Select a room</option>');

                            // Filter the rooms based on the selected hotel
                            var filteredRooms = @json($selectedHotelRooms);

                            if (filteredRooms.length > 0) {
                                $.each(filteredRooms, function(key, room) {
                                    $('#roomDropdown').append('<option value="' + room.id + '">' + room.name + '</option>');
                                });
                            } else {
                                $('#roomDropdown').append('<option value="">No rooms available</option>');
                            }
                        } else {
                            // Disable and clear the room dropdown
                            $('#roomDropdown').prop('disabled', true);
                            $('#roomDropdown').html('<option value="">Select a room</option>');
                        }
                    });

                    // Set the selected hotel on page load
                    if (selectedHotelId) {
                        $('#hotelDropdown').val(selectedHotelId);
                        $('#hotelDropdown').trigger('change');
                    }
                });

        </script>


</x-layout.default>
