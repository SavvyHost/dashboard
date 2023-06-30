





<x-layout.default>
    @section('title','Rooms - New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        {{-- <a href="{{route('room.at.form.show',$id)}}" class="text-primary hover:underline">Rooms</a> --}}

        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('rooms.show')}}" class="text-primary hover:underline">Rooms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Room Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action="{{route('room.form.save',$id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="name" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Room Name</label>
                            <input id="name" type="text"  placeholder="Enter Room Name"
                                class="form-input flex-1" name="name" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="max_adult" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Max Adult</label>
                            <input id="max_adult" type="text"  placeholder="Enter Max Adult"
                                class="form-input flex-1" name="max_adult" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="max_child" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Max Child</label>
                            <input id="max_child" type="text"  placeholder="Enter Max Child"
                                class="form-input flex-1" name="max_child" required />
                        </div>

                        <div class="flex sm:flex-row flex-col ">
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Banner Image</label>
                                <input id="ctnFile" type="file"  name="banner" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Images</label>
                                <input id="ctnFile" type="file" multiple="multiple" name="image[]" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>


                                {{-- <div class="flex sm:flex-row flex-col ">
                                    @foreach ($attrs as  $attr)
                                        <div class="w-full" style="margin-right: 10px">
                                            <label for="ctnFile">{{$attr->name}}</label>
                                            <select class="selectize" name="terms[]" multiple='multiple'>
                                                @foreach ($attr->terms as $term)
                                                    <option value="{{$term->id}}">{{$term->name}}{{$term->price}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div> --}}


                        </div>
                        <div class="flex sm:flex-row flex-col">

                        </div>
                        {{-- <div class="flex sm:flex-row flex-col">
                            <div class="w-full" style="margin-right: 10px">
                                <label for="ctnFile">Suppliements</label>
                                <select class="selectize" name="sups[]" multiple='multiple'>
                                    @foreach ($sups as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->name }} {{$sup->price}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div>
                            <div class="flex sm:flex-row flex-col">
                                @foreach ($attrs as $attr)
                                    <div class="w-full" style="margin-right: 10px">
                                        <label for="ctnFile">{{$attr->name}}</label>
                                        <select class="selectize" name="terms[]" multiple='multiple' onchange="calculateTotal()">
                                            @foreach ($attr->terms as $term)
                                                <option value="{{$term->id}}">{{$term->name}}{{$term->price}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex sm:flex-row flex-col">
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">Type</label>
                                    <select class="selectize" name="type"   onchange="calculateTotal()">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }} {{$type->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex sm:flex-row flex-col">
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">Suppliements</label>
                                    <select class="selectize" name="sups[]" multiple='multiple' onchange="calculateTotal()">
                                        @foreach ($sups as $sup)
                                            <option value="{{ $sup->id }}">{{ $sup->name }} {{$sup->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div> --}}

                        <div>
                                <button onclick="calculateButtonClicked()">Calculate Total Price</button>

                                <div>
                                    <div class="flex sm:flex-row flex-col">
                                        @foreach ($attrs as $attr)
                                            <div class="w-full" style="margin-right: 10px">
                                                <label for="ctnFile">{{$attr->name}}</label>
                                                <select class="selectize" name="terms[]" multiple='multiple' onchange="calculateTotal()">
                                                    @foreach ($attr->terms as $term)
                                                        <option value="{{$term->id}}">{{$term->name}}{{$term->price}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="flex sm:flex-row flex-col">
                                        <div class="w-full" style="margin-right: 10px">
                                            <label for="ctnFile">Type</label>
                                            <select class="selectize" name="type" onchange="calculateTotal()">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }} {{$type->price}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex sm:flex-row flex-col">
                                        <div class="w-full" style="margin-right: 10px">
                                            <label for="ctnFile">Supplements</label>
                                            <select class="selectize" name="sups[]" multiple='multiple' onchange="calculateTotal()">
                                                @foreach ($sups as $sup)
                                                    <option value="{{ $sup->id }}">{{ $sup->name }} {{$sup->price}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Display the total price -->
                                </div>
                                <div id="totalPrice"></div>
                        </div>
                        <div class="mb-5">
                            <label for="editor">Description</label>
                            <input  style="display:none" name="description">

                            <div id="editor"></div>
                        </div>


                        <div>
                            <div id="totalPrice"></div>
                        </div>
                        {{-- <div>
                            <div> is : {{$totalPrice}}</div>
                        </div> --}}
                        <div>
                            <div class="flex sm:flex-row flex-col">
                                <label for="price" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Room Price</label>
                                <input id="price" type="text"  placeholder="Enter Room Price"
                                    class="form-input flex-1" name="price" required />
                            </div>
                        </div>


                        <div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                        </div>



                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>



    <script>
        function calculateTotal() {
            var selectElements = document.getElementsByTagName('select');
            var totalPrice = 0;

            for (var i = 0; i < selectElements.length; i++) {
                var select = selectElements[i];
                var selectedOptions = select.selectedOptions;

                for (var j = 0; j < selectedOptions.length; j++) {
                    var priceText = selectedOptions[j].textContent.match(/\d+(\.\d+)?/);

                    if (priceText) {
                        var price = parseFloat(priceText[0]);
                        if (!isNaN(price)) {
                            totalPrice += price;
                        }
                    }
                }
            }

            document.getElementById('totalPrice').textContent = 'Suggested Price: ' + totalPrice.toFixed(2);
        }

        function calculateButtonClicked() {
            calculateTotal();
        }
    </script>

    {{-- <script>
        function calculateTotal() {
            var selectElements = document.getElementsByTagName('select');
            var totalPrice = 0;

            for (var i = 0; i < selectElements.length; i++) {
                var select = selectElements[i];
                var selectedOptions = select.selectedOptions;

                for (var j = 0; j < selectedOptions.length; j++) {
                    var priceText = selectedOptions[j].textContent.match(/\d+(\.\d+)?/);

                    if (priceText) {
                        var price = parseFloat(priceText[0]);
                        if (!isNaN(price)) {
                            totalPrice += price;
                        }
                    }
                }
            }

            document.getElementById('totalPrice').textContent = 'Suggested Price: ' + totalPrice.toFixed(2);
        }

        // Attach onchange event listener to each select element
        var selectElements = document.getElementsByTagName('select');
        for (var i = 0; i < selectElements.length; i++) {
            selectElements[i].addEventListener('change', calculateTotal);
        }
    </script> --}}


    {{-- <script>
        function calculateTotal() {
            var selectElements = document.getElementsByTagName('select');
            var totalPrice = 0;

            for (var i = 0; i < selectElements.length; i++) {
                var select = selectElements[i];
                var selectedOptions = select.selectedOptions;

                for (var j = 0; j < selectedOptions.length; j++) {
                    var priceText = selectedOptions[j].textContent.match(/\d+(\.\d+)?/);

                    if (priceText) {
                        var price = parseFloat(priceText[0]);
                        if (!isNaN(price)) {
                            totalPrice += price;
                        }
                    }
                }
            }

            document.getElementById('totalPrice').textContent = 'Suggested Price: ' + totalPrice.toFixed(2);
        }
    </script> --}}

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

</x-layout.default>
