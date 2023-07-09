<x-layout.default>
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/swiper-bundle.min.css') }}">
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    @section('title',$hotel->name.' Edit')
    <div >
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('hotels.show')}}" class="text-primary hover:underline">Hotels</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>{{$hotel->name}}</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    
                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Hotel Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif
                
                <div class="mb-5">
                    
                    <form class="space-y-5" method="POST" action="{{route('hotel.edit.form.save',$hotel->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Name</label>
                            <input id="HotelName" type="text" value="{{$hotel->name}}"
                                class="form-input flex-1" name="hotel_name" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelLocation" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Location</label>
                            <input id="HotelLocation" type="text"  value="{{$hotel->location}}"
                                class="form-input flex-1" name="hotel_location" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Price</label>
                            <input id="HotelPrice" type="text"  value="{{$hotel->price}}"
                                class="form-input flex-1" name="hotel_price" required />
                        </div>
                        
                         <!-- basic -->
                         @if ($hotel->images != [''])
                         @php
                            $images = explode(',', $hotel->images);
                        @endphp
                            
                         
    <div class="swiper max-w-3xl mx-auto mb-5" id="slider1">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
            <div class="swiper-slide">
                <img src="{{asset('assets/hotel-photos/'.$image)}}" class="w-full max-h-80 object-cover" alt="image" />
            </div>
            @endforeach
            
        </div>
        <div class="swiper-pagination"></div>
    </div>
    

    <!-- script -->
    <script>
    const swiper1 = new Swiper("#slider1", {
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
    @endif
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

    </div>
                        @if ($hotel->terms != [''])
                            @php
                            $terms = explode(',', $hotel->terms);
                            @endphp
                        @endif
                        <div class="flex sm:flex-row flex-col ">
                            @foreach ($attrs as $attr)
                                <div class="w-full" style="margin-right: 10px">
                                    <label >{{$attr->name}}</label>
                                    <select class="selectize" name="terms[]" multiple='multiple'>
                                        @foreach ($attr->terms as $term)
                                            <option @if (in_array($term->id, $terms))
                                                selected
                                            @endif value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-5">
                            <label for="editor">Description</label>
                            <input  style="display:none" value="{{$hotel->description}}" name="description">
                                
                            <div id="editor">
                                {!! $hotel->description !!}
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary !mt-6">Submit</button>
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
