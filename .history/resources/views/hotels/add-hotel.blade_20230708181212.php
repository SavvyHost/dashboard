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
                     {{-- <ul id="progressbar">
                            <li class="active">Step one</li>
                            <li>Step two</li>
                            <li>Step three</li>
                            <li>Step four</li>
                    </ul> --}}

                    <form id="multi-step-form" class="space-y-5" method="POST" action="{{ route('hotel.form.save') }}" enctype="multipart/form-data">
                        <div id="progressbar">
                            <ul>
                                <li data-step-name="Hotel" class="active">Step 1</li>
                                <li data-step-name="Policies" >Step 2</li>
                                <li data-step-name="Attributes">Step 3</li>
                                <li data-step-name="Terms">Step 4</li>
                            </ul>
                        </div>
                        {{-- <form id="step-1" class="space-y-5" method="POST" action="{{ route('hotel.form.save') }}" enctype="multipart/form-data"> --}}
                                @csrf

                        <fieldset  class="form-step" id="step-1">
                                {{-- <div id="step-1" class="form-step"> --}}
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
                                    <div class="flex sm:flex-row flex-col">
                                        @foreach ($attrs as $ar)
                                            <div class="w-full" style="margin-right: 10px">
                                                <label>{{$ar->name}}</label>
                                                <div class="flex">
                                                    @foreach ($ar->terms as $term)
                                                        <div class="mr-2">
                                                            <input type="radio" id="{{$term->id}}" name="terms[]" value="{{$term->id}}">
                                                            <label for="{{$term->id}}">{{$term->name}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
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


                                {{-- </div> --}}
                                </fieldset >

                        <fieldset  id="step-2" style="display: none" class="form-step">
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


                        </fieldset >





                        <fieldset  id="step-3" style="display: none" class="form-step">
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



                        </fieldset >





                        <fieldset  id="step-4" style="display: none" class="form-step">
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
                        </fieldset >


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

    {{-- <script>
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

                // Additional code for multi-step form
                $(".next").click(function() {
                    if (animating) return false;
                    animating = true;

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    // Activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    // Show the next fieldset
                    next_fs.show();
                    // Hide the current fieldset with style
                    current_fs.animate(
                        { opacity: 0 },
                        {
                            step: function(now, mx) {
                                // As the opacity of current_fs reduces to 0 - stored in "now"
                                // 1. Scale current_fs down to 80%
                                scale = 1 - (1 - now) * 0.2;
                                // 2. Bring next_fs from the right (50%)
                                left = (now * 50) + "%";
                                // 3. Increase opacity of next_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({
                                    transform: "scale(" + scale + ")",
                                    position: "absolute"
                                });
                                next_fs.css({ left: left, opacity: opacity });
                            },
                            duration: 800,
                            complete: function() {
                                current_fs.hide();
                                animating = false;
                            },
                            // This comes from the custom easing plugin
                            easing: "easeInOutBack"
                        }
                    );
            });

            $(".previous").click(function() {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                // De-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                // Show the previous fieldset
                previous_fs.show();
                // Hide the current fieldset with style
                current_fs.animate(
                    { opacity: 0 },
                    {
                        step: function(now, mx) {
                            // As the opacity of current_fs reduces to 0 - stored in "now"
                            // 1. Scale previous_fs from 80% to 100%
                            scale = 0.8 + (1 - now) * 0.2;
                            // 2. Take current_fs to the right (50%) - from 0%
                            left = ((1 - now) * 50) + "%";
                            // 3. Increase opacity of previous_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({ left: left });
                            previous_fs.css({ transform: "scale(" + scale + ")", opacity: opacity });
                        },
                        duration: 800,
                        complete: function() {
                            current_fs.hide();
                            animating = false;
                        },
                        // This comes from the custom easing plugin
                        easing: "easeInOutBack"
                    }
                );
            });
        });

    </script> --}}

    <script>
        $(document).ready(function() {
        var currentStep = 1;
        showStep(currentStep);

        function showStep(step) {
            $('.form-step').hide();
            $('#step-' + step).show();

            // Remove 'active' class from all step labels
            $('#progressbar li').removeClass('active');

            // Add 'active' class to the corresponding step label
            $('#progressbar li:nth-child(' + step + ')').addClass('active');
        }

        $('.next-step').click(function() {
            var step = $(this).data('step');
            showStep(step);
        });

        $('.prev-step').click(function() {
            var step = $(this).data('step');
            showStep(step);
        });

        $('.next-step').click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            // Activate next step on progressbar
            $('#progressbar li:nth-child(' + (currentStep + 1) + ')').addClass('active');

            // Show the next fieldset
            next_fs.show();
            // Hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
            step: function(now, mx) {
                // As the opacity of current_fs reduces to 0 - stored in "now"
                // 1. Scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                // 2. Bring next_fs from the right(50%)
                left = (now * 50) + "%";
                // 3. Increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                transform: "scale(" + scale + ")",
                position: "absolute"
                });
                next_fs.css({ left: left, opacity: opacity });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack" // Custom easing plugin
            });
        });

        $('.prev-step').click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            // De-activate current step on progressbar
            $('#progressbar li:nth-child(' + currentStep + ')').removeClass('active');

            // Show the previous fieldset
            previous_fs.show();
            // Hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
            step: function(now, mx) {
                // As the opacity of current_fs reduces to 0 - stored in "now"
                // 1. Scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                // 2. Take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                // 3. Increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ left: left });
                previous_fs.css({ transform: "scale(" + scale + ")", opacity: opacity });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack" // Custom easing plugin
            });
        });
        });
    </script>

    <style>
            /* Progressbar */
            #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step; /* CSS counters to number the steps */
            }

            #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 25%;
            float: left;
            position: relative;
            }

            #progressbar li:before {
            content: attr(data-step-name);
            counter-increment: step;
            width: fit-content;
            line-height: 20px;
            display: block;
            font-size: 20px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
            position: relative; /* Add position relative for arrow positioning */
            padding: 0 10px; /* Add padding to create some spacing around the step name */
            }

            /* Progressbar connectors */
            /* Progressbar */
            #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step; /* CSS counters to number the steps */
            }

            #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 25%;
            float: left;
            position: relative;
            }

            #progressbar li:before {
            content: attr(data-step-name);
            counter-increment: step;
            width: fit-content;
            line-height: 20px;
            display: block;
            font-size: 20px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
            position: relative; /* Add position relative for arrow positioning */
            padding: 0 10px; /* Add padding to create some spacing around the step name */
            }

            /* Progressbar connectors */
            #progressbar li:after {
            content: '';
            width: calc(100% - 20px); /* Adjust the width based on the step name padding */
            height: 30px;
            background: blue; /* Set the arrow color to blue */
            position: absolute;
            left: 50%;
            bottom: 10px; /* Adjust the position based on the step name padding */
            transform: translateX(-50%);
            z-index: -1;
            }

            #progressbar li:not(:last-child):after {
            width: calc(100% - 40px); /* Adjust the width for the arrow spacing */
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
            background: #27AE60; /* Set the active step color to green */
            color: white;
            }



    </style>


</x-layout.default>
