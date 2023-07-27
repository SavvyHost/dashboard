<x-layout.default>
    @section('title', 'Hotel Details')

    <div>
        <h1>{{ $hotel->hotel_name }}</h1>
        <p>Location: {{ $hotel->hotel_location }}</p>
        <p>Price: {{ $hotel->hotel_price }}</p>

        <h2>Banner Image</h2>
        <img src="{{ asset($hotel->banner) }}" alt="Banner Image">

        {{-- <h2>Images</h2>
        @foreach ($hotel->images as $image)
            <img src="{{ asset($image->image_path) }}" alt="Hotel Image">
        @endforeach --}}

        <h2>Attributes</h2>
        <ul>
            @foreach ($hotel->attributes as $attribute)
                <li>
                    <h3>{{ $attribute->name }}</h3>
                    <ul>
                        @foreach ($attribute->terms as $term)
                            <li>{{ $term->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

        <h2>Description</h2>
        <div>{!! $hotel->description !!}</div>
    </div>
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
