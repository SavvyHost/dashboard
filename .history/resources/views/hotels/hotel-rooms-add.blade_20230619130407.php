




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
                        <div>
                            <div class="flex sm:flex-row flex-col">
                                @foreach ($attrs as $attr)
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">{{$attr->name}}</label>
                                    <select class="selectize" name="terms[]" multiple='multiple'>
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
                                    <select class="selectize" name="type">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}" data-price="{{ $type->price }}">{{ $type->name }} {{$type->price}}</option>

                                        {{-- <option value="{{ $type->id }}">{{ $type->name }} {{$type->price}}</option> --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex sm:flex-row flex-col">
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">Supplements</label>
                                    <select class="selectize" name="sups[]" multiple='multiple'>
                                        @foreach ($sups as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->name }} {{$sup->price}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="mb-5">
                            <label for="editor">Description</label>
                            <input  style="display:none" name="description">

                            <div id="editor"></div>
                        </div>


                        {{-- <div>
                            <div id="totalPrice"></div>
                        </div> --}}
                        <div>
                            <div class="flex sm:flex-row flex-col">
                                <label for="price" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Room Price</label>
                                <input id="price" type="text"  placeholder="Enter Room Price"
                                    class="form-input flex-1" name="price" required />
                            </div>
                        </div>

                        {{-- <div>
                            <button class="btn btn-primary bg-green-500 text-white !mt-6" onclick="calculateAndShowTotal()">Calculate Total</button>
                            <label for="total">Total:</label>
                            <span id="total">0</span>
                        </div> --}}

                        <div style="display: flex; align-items: center;">
                            <button class="btn btn-primary bg-green-500 text-white !mt-6" onclick="calculateAndShowTotal()">Calculate Total</button>
                            <label for="total" style="margin-left: 10px;">Total:</label>
                            <span id="total" style="margin-left: 5px;">0</span>
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




    <!-- end hightlight js -->


    <script>
        function getTypePrice(typeId) {
            var typeOption = document.querySelector('select[name="type"] option[value="' + typeId + '"]');
            var price = parseFloat(typeOption.getAttribute('data-price'));
            return price;
        }

        function calculateAndShowTotal() {
            var attrsSelects = document.getElementsByName('terms[]');
            var typeSelect = document.getElementsByName('type')[0];
            var supsSelect = document.getElementsByName('sups[]')[0];
            var totalSpan = document.getElementById('total');

            var attrsTotal = 0;
            for (var i = 0; i < attrsSelects.length; i++) {
                attrsTotal += calculateSelectTotal(attrsSelects[i]);
            }

            var typeTotal = getTypePrice(typeSelect.value);
            var supsTotal = calculateSelectTotal(supsSelect);

            var total = attrsTotal + typeTotal + supsTotal;

            totalSpan.textContent = total.toFixed(2);
        }

        function calculateSelectTotal(selectElement) {
            var options = selectElement.selectedOptions;
            var total = 0;

            for (var i = 0; i < options.length; i++) {
                var option = options[i];
                var price = parseFloat(option.textContent.match(/([\d.]+)/)[1]);
                total += price;
            }

            return total;
        }
    </script>
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

</x-layout.default>
