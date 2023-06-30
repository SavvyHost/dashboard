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
                    <label for="hotelDropdown">Select a hotel:</label>
                    <select id="hotelDropdown" name="hotel_id">
                        <option value="">Select a hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}" {{ ($hotel->id == $selectedHotelId) ? 'selected' : '' }}>{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="roomDropdown">Select a room:</label>
                    <select id="roomDropdown" name="room_id" {{ empty($selectedHotelId) ? 'disabled' : '' }}>
                        <option value="">Select a room</option>
                        @foreach ($selectedHotelRooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

        </div>

    </div>




    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->

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
        var selectedHotelRooms = {!! $selectedHotelRoomsJson ?? '[]' !!};
        $('#hotelDropdown').on('change', function() {
            var hotelId = $(this).val();
            if (hotelId) {
                $('#roomDropdown').prop('disabled', false);
                $('#roomDropdown').html('<option value="">Select a room</option>');

                // Filter the rooms based on the selected hotel
                var selectedHotelRooms = @json($selectedHotelRooms);
                var filteredRooms = selectedHotelRooms.filter(function(room) {
                    return room.hotel_id == hotelId;
                });

                if (filteredRooms.length > 0) {
                    $.each(filteredRooms, function(key, room) {
                        $('#roomDropdown').append('<option value="' + room.id + '">' + room.name + '</option>');
                    });
                } else {
                    $('#roomDropdown').append('<option value="">No rooms available</option>');
                }
            } else {
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
