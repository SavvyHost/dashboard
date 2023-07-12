<x-layout.default>
    @section('title','Hotels - New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('hotels.show')}}" class="text-primary hover:underline">Hotels</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
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
                     <ul id="progressbar">
                            <li class="active">Step one</li>
                            <li>Step two</li>
                            <li>Step three</li>
                            <li>Step four</li>
                    </ul>
                    <form id="multi-step-form" class="space-y-5" method="POST" action="{{ route('hotel.form.save') }}" enctype="multipart/form-data">
                              {{-- <form id="step-1" class="space-y-5" method="POST" action="{{ route('hotel.form.save') }}" enctype="multipart/form-data"> --}}
                                <ul id="progressbar">
                                    <li class="active">Step one</li>
                                    <li>Step two</li>
                                    <li>Step three</li>
                                    <li>Step four</li>
                            </ul>
                                @csrf
                        <div id="step-1" class="form-step">
                            <div class="flex sm:flex-row flex-col ">
                                <label for="HotelName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Name</label>
                                <input id="HotelName" type="text"  placeholder="Enter Hotel Name"
                                    class="form-input flex-1" name="hotel_name" required />
                            </div>
                            <div class="flex sm:flex-row flex-col ">
                                <label for="HotelLocation" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Hotel Location</label>
                                <input id="HotelLocation" type="text"  placeholder="Enter Hotel Location"
                                    class="form-input flex-1" name="hotel_location" required />
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

                            </div>
                            <div class="flex sm:flex-row flex-col ">
                                @foreach ($attrs as $attr)
                                    <div class="w-full" style="margin-right: 10px">
                                        <label for="ctnFile">{{$attr->name}}</label>
                                        <select class="selectize" name="terms[]" multiple='multiple'>
                                            @foreach ($attr->terms as $term)
                                                <option value="{{$term->id}}">{{$term->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-5">
                                <label for="editor">Description</label>
                                <input  style="display:none" name="description">

                                <div id="editor"></div>
                            </div>


                                   {{-- <button type="submit" class="btn btn-primary !mt-6">Submit</button> --}}
                                   <button type="button" class="next-step" data-step="2">Next</button>


                        </div>
                        <div id="step-2" style="display: none" class="form-step">
                                {{-- <form id="step-2" class="space-y-5" method="POST" action="{{route('hotel.policy.form.save',/* $hotel_id */['hotel_id' => $hotel_id])}}" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="flex sm:flex-row flex-col ">
                                <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Policy Name</label>
                                <input id="attrName" type="text"  placeholder="Enter Policy Name"
                                    class="form-input flex-1" name="name" required />
                            </div>
                            <div class="flex sm:flex-row flex-col ">
                                <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Policy Description</label>
                                <input id="attrName" type="text"  placeholder="Enter Description Name"
                                    class="form-input flex-1" name="description" required />
                            </div>
                                    {{-- <button type="submit" class="btn btn-primary !mt-6">Submit</button> --}}
                                {{-- </form> --}}
                                {{-- <button type="button" data-step="3">Next</button>
                                <button type="button" data-step="1">Previous</button> --}}
                                <button type="button" class="next-step" data-step="3">Next</button>
                                <button type="button" class="prev-step" data-step="1">Previous</button>


                        </div>





                        <div id="step-3" style="display: none" class="form-step">
                                {{-- <form id="step-3" class="space-y-5" method="POST" action="{{route('hotel.attr.form.save')}}" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="flex sm:flex-row flex-col ">
                                <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Attribute Name</label>
                                <input id="attrName" type="text"  placeholder="Enter Attribute Name"
                                    class="form-input flex-1" name="name" required />
                            </div>
                                    {{-- <button type="submit" class="btn btn-primary !mt-6">Submit</button> --}}
                                {{-- </form> --}}

                            {{-- <button type="button" data-step="4">Next</button>
                            <button type="button" data-step="2">Previous</button> --}}
                            <button type="button" class="next-step" data-step="4">Next</button>
                            <button type="button" class="prev-step" data-step="2">Previous</button>



                        </div>





                        <div id="step-4" style="display: none" class="form-step">
                                {{-- <form id="step-4" class="space-y-5" method="POST" action="{{route('hotel.attr.terms.form.save',$attr_id)}}" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="flex sm:flex-row flex-col ">
                                <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Term Name</label>
                                <input id="attrName" type="text"  placeholder="Enter Term Name"
                                    class="form-input flex-1" name="name" required />
                            </div>
                                    {{-- <button type="submit" class="btn btn-primary !mt-6">Submit</button> --}}
                                {{-- </form> --}}
                                <button type="submit">Submit</button>
                                <button type="button" class="prev-step" data-step="3">Previous</button>

                                {{-- <button type="button" data-step="3">Previous</button> --}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            var currentStep = 1;
            showStep(currentStep);

            function showStep(step) {
                // Hide all form steps
                $('.form-step').hide();

                // Show the current step
                $('#step-' + step).show();

                // Update the current step number
                $('#current-step').text(step);
            }

            function prevStep() {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            }

            function nextStep() {
                if (currentStep < 4) {  // Update the value based on the number of steps
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
    </script> --}}

    {{-- <script>
        const form = document.getElementById('multi-step-form');
        const steps = form.querySelectorAll('[id^="step-"]');
        const buttons = form.querySelectorAll('button[data-step]');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const step = button.dataset.step;
                showStep(step);
            });
        });

        function showStep(step) {
            steps.forEach(stepElement => {
                stepElement.style.display = stepElement.id === `step-${step}` ? 'block' : 'none';
            });
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            var currentStep = 1;
            showStep(currentStep);

            function showStep(step) {
                $('.form-step').hide();
                $('#step-' + step).show();

                // Remove 'active' class from all step labels
                $('.nav-link').removeClass('active');

                // Add 'active' class to the corresponding step label
                $('.step-' + step).addClass('active');
            }

            $('.next-step').click(function() {
                var step = $(this).data('step');
                showStep(step);
            });

            $('.prev-step').click(function() {
                var step = $(this).data('step');
                showStep(step);
            });
        });
    </script>



    <style>
    .step-navigation {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
    }

    .step-navigation a {
        position: relative;
    }

    .step-navigation a:before {
        content: '';
        position: absolute;
        top: 50%;
        left: -100%;
        height: 2px;
        width: 100%;
        background-color: #ddd;
        transform: translateY(-50%);
    }

    .step-navigation a:first-child:before {
        display: none;
    }

    .step-navigation a.active:before {
        background-color: #4caf50;
    }

    .step-navigation a:not(.active):hover:before {
        background-color: #e0e0e0;
    }

    .step-navigation label {
        display: inline-block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        background-color: #fff;
        border: 1px solid #ddd;
        color: #555;
        font-size: 12px;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    .step-navigation label.active {
        background-color: #4caf50;
        color: #fff;
        border-color: #4caf50;
    }




    </style>

</x-layout.default>
