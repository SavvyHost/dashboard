<x-layout.default>
    @section('title','Room - Details')

    <!-- CSS and JS links -->

    <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light"> Room Details</h5>
                <div>
                    <!-- Add Policy button -->
                    @if (auth()->user()->role_id == 1)
                        <div>
                            <a href="{{ route('hotel.policy.form.show', $hotels->id) }}" role="button" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                                <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Add Policy SVG icon -->
                                </svg>
                                Add Policy
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Success message -->
            @if (session()->get('success'))
                <div class="text-center mb-5">
                    <h3 style="font-size: 1.5rem; color: currentColor;">{{ session()->get('success') }}</h3>
                </div>
            @endif

            <div>
                <h1>Hotel Details</h1>
                <h2>Book a Room</h2>
                {{-- <form action="{{ route('booking.store',$room->id) }}" method="POST"> --}}
                <form action="{{ route('booking.store', ['id' => $room->id]) }}" method="POST">

                    <!-- Room details -->
                    @method('POST')
                    <p>Name: {{ $room->name }}</p>
                    <p>Price: {{ $room->price }}</p>
                    <p>Banner: <img src="{{ asset('assets/hotel-photos/' . $room->banner) }}" alt="Hotel Banner"></p>
                    <p>Images:</p>
                    <p>Description: {{ strip_tags($room->description) }}</p>

                    <div>
                        <!-- Room types -->
                        @foreach ($room->types as $type)
                            <p>Type: {{ $type->name }}</p>
                            <p>Type Details: {{ $type->price }}</p>
                        @endforeach
                    </div>

                    <div>
                        <!-- Room meals -->
                        @foreach ($room->meals as $meal)
                            <p>Meal: {{ $meal->name }}</p>
                            <p>Meal Details: {{ $meal->description }}</p>
                        @endforeach
                    </div>

                    <!-- Booking inputs -->
                    @csrf
                    {{-- <input type="hidden" name="room_id" value="{{ $room->id }}"> --}}
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="payment_method" value="1">

                    <div>
                        <label for="check_in">Check-in:</label>
                        <input type="date" name="start_date" id="start_date" required>
                    </div>

                    <div>
                        <label for="check_out">Check-out:</label>
                        <input type="date" name="end_date" id="end_date" required>
                    </div>

                    <button type="submit">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Additional CSS and JS -->

</x-layout.default>
