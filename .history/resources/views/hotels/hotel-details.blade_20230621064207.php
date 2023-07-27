<x-layout.default>
    @section('title', 'Hotel Details')

    {{-- <div>
        <h1>{{ $hotel->hotel_name }}</h1>
        <p>Location: {{ $hotel->hotel_location }}</p>
        <p>Price: {{ $hotel->hotel_price }}</p>

        <h2>Banner Image</h2>
        <img src="{{ asset($hotel->banner) }}" alt="Banner Image">

        <h2>Images</h2>
        @foreach ($hotel->images as $image)
            <img src="{{ asset($image->image_path) }}" alt="Hotel Image">
        @endforeach

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
    </div> --}}

    <div class="mt-5 panel p-0 border-0 overflow-hidden">
        <template x-if="displayType === 'list'">
            <div class="table-responsive">
                <table class="table-striped table-hover whitespace-nowrap">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th >Hotel</th>
                            <th>Max Adult</th>
                            <th>Max Child</th>
                            <th>Type</th>
                            <th>Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td >{{$hotel->name}}</td>
                            <td >{{$hotel->price}}</td>
                            <td >{{$hotel->location}}</td>
                            {{-- <td >{{$room->types->name}}</td> --}}
                            <td>{{$hotel->terms ? $hotel->terms->name : ''}}</td>

                            <td >{{$room->price}}</td>
                                <td>
                                    <form id="delete-form-{{ $room->id }}" action="{{ route('hotel.room.destroy', $room->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit" class="btn btn-sm btn-outline-danger" >Delete</button> --}}
                                    </form>
                                    <div class="flex gap-4 items-center ">
                                        <a href="{{route('room.edit.form.show',$room->id)}}" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $room->id }}').submit();">Delete</a>

                                    </div>
                                </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </template>
    </div>
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
                hotelsList: {!! $hotel !!},

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
