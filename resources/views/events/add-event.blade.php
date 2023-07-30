<x-layout.default>
    <style>
    #facebook {
        display: none;
    }

    #twitter {
        display: none;
    }

    .img {
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: cover;
        margin: 1vh 0;
        padding: 2vh 1vh;
    }
    </style>
    @section('title','Event - New')
    <link rel='stylesheet' type='text/css' href="{{ Vite::asset('resources/css/nice-select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('event.index')}}" class="text-primary hover:underline">Events</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul>
        <div class="pt-5">
            <form method="post" action="{{route('event.store')}}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add new Event</h5>
                </div>
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-9">
                        <div
                            class="border border-gray-200  dark:border-[#191e3a] rounded-md  mb-5 bg-white dark:bg-[#0e1726]">
                            <!-- @csrf
						{{-- <h6 class="text-lg font-bold mb-5">News content</h6> --}}
						@if (session()->get('success'))
							<div class=" text-center mb-5">
								<h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                                        </div>
                                @endif -->
                            <div class=" border-gray-200 border-b p-2 "><strong>News content</strong></div>
                            <div class="grid grid-cols-12 p-4 border-gray-200  ">

                                <div class="col-span-12 py-1">
                                    <div class="">
                                        <label for="name">Title</label>
                                        <input id="title" type="text" name="title" class="form-input " required />
                                    </div>
                                </div>
                                <div class="col-span-12 py-2">
                                    <div class="">
                                        <label for="content">Content</label>
                                        <input id="content" style="display:none " name="content">
                                        <div id="editor"></div>
                                    </div>
                                </div>

                                <div class="col-span-12 py-2">
                                    <div class="">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" class="form-input" name="location">
                                    </div>
                                </div>

                                <div class="col-span-12 py-2">
                                    <div class="">
                                        <label for="start_date">Start date</label>
                                        <input type="date" id="start_date" class="form-input" name="start_date">
                                    </div>
                                </div>

                                <div class="col-span-12 py-2">
                                    <div class="">
                                        <label for="end_date">End date</label>
                                        <input type="date" id="end_date" class="form-input" name="end_date">
                                    </div>
                                </div>


                            </div>

                            <script>
                            var quill = new Quill('#editor', {
                                theme: 'snow'
                            });
                            var form = document.querySelector('form');
                            form.onsubmit = function() {
                                // Populate hidden form on submit
                                var content = document.querySelector(".ql-editor").innerHTML;
                                var bio = document.querySelector('input[name=content]');
                                bio.value = content;
                            };
                            </script>
                        </div>
                        <div
                            class="border border-gray-200  dark:border-[#191e3a] rounded-md  mb-5 bg-white dark:bg-[#0e1726]">
                            <div class=" border-gray-200  border-b p-2 ">
                                <strong>Seo Manager</strong>
                            </div>
                            <p class="px-4 py-3 text-md ">Allow search engines to show this service in search
                                results?</p>
                            <div class="grid grid-cols-12 px-4 pt-1 pb-3 border-gray-200  ">

                                <div class="col-span-12 ">

                                    <select id="boolean-seo" class="selectize" placeholder="Yes"
                                        onchange="return Booleanseo();">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <!-- my section -->
                                <div class="col-span-12" id="seo-details">
                                    <!-- simple tabs -->
                                    <div class="mb-5" x-data="{tab: 'home'}">
                                        <!-- buttons -->
                                        <div>

                                            <ul class="flex flex-wrap mt-3 border-b border-white-light dark:border-[#191e3a]"
                                                id="seoManger">
                                                <li>
                                                    <a href="javascript:"
                                                        class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-b-black"
                                                        :class="{'!border-white-light !border-b-white  text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'home'}"
                                                        onclick="home()" @click="tab = 'home'">General</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:"
                                                        class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                                        :class="{'!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'facebook'}"
                                                        onclick="facebook()" @click="tab = 'facebook'">facebook</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:"
                                                        class="p-3.5 py-2 -mb-[1px] block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                                        :class="{'!border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black' : tab  === 'twitter'}"
                                                        onclick="twitter()" @click="tab = 'twitter'">twitter</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- description -->
                                        <div class="pt-5 flex-1 text-sm">

                                            <div id="home">
                                                <div class="grid grid-cols-12 ">
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="seo_title">Seo Title</label>
                                                            <input id="seo_title" type="text" name="seo_title"
                                                                class="form-input" />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="seo_description">Seo Description</label>
                                                            <textarea name="seo_description" id="seo_description"
                                                                rows="3" class="form-input"
                                                                placeholder="Enter description..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12 py-2 mb-3 ">
                                                        <div class="rounded-lg  ">
                                                            <div class="m-4">
                                                                <!-- home img -->
                                                                <!-- <div class="flex items-center justify-center w-full"> -->
                                                                <div>
                                                                    <!-- <label for="ctnFile">Example file input</label> -->
                                                                    <input id="homeImg" type="file"
                                                                        class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"
                                                                        name="home_image" accept="image/*" />
                                                                    <div id="hImg" class="img">

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- home img -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="facebook">
                                                <div class="grid grid-cols-12 ">
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="facebook_title">Facebook Title</label>
                                                            <input id="facebook_title" type="text" name="facebook_title"
                                                                class="form-input " />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="facebook_description">Facebook
                                                                Description</label>
                                                            <textarea name="facebook_description"
                                                                id="facebook_description" rows="3" class="form-input"
                                                                placeholder="Enter description..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12 py-2 mb-3 ">
                                                        <div class="rounded-lg  ">
                                                            <div class="m-4">
                                                                <!-- home img -->
                                                                <!-- <div class="flex items-center justify-center w-full"> -->
                                                                <div>
                                                                    <!-- <label for="ctnFile">Example file input</label> -->
                                                                    <input id="facebookImg" type="file"
                                                                        class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"
                                                                        name="facebook_image" accept="image/*" />
                                                                    <div id="faceImg" class="img">

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- home img -->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="twitter">
                                                <div class="grid grid-cols-12 ">
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="name">Twitter Title</label>
                                                            <input id="twitter_title" type="text" name="twitter_title"
                                                                class="form-input " />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 py-1">
                                                        <div class="">
                                                            <label for="name">Twitter Description</label>
                                                            <textarea name="twitter_description" rows="3"
                                                                class="form-input"
                                                                placeholder="Enter description..."></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12 py-2 mb-3 ">
                                                        <div class="rounded-lg  ">
                                                            <div class="m-4">

                                                                <!-- <div class="flex items-center justify-center w-full"> -->
                                                                <div>
                                                                    <!-- <label for="ctnFile">Example file input</label> -->
                                                                    <input id="twitterImg" type="file"
                                                                        class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"
                                                                        name="twitter_image" accept="image/*" />
                                                                    <div id="twitImg" class="img">

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-3">
                        <div
                            class="border border-gray-200  dark:border-[#191e3a] rounded-md  mb-5 bg-white dark:bg-[#0e1726]">
                            <div class=" border-gray-200 border-b p-2 "><strong class="p-1">Publish</strong></div>
                            <div class="grid grid-cols-12 p-4 border-gray-200  ">

                                <div class="col-span-12 py-1 ">
                                    <!-- radio -->
                                    <div class="flex flex-col ">
                                        <div class="p-1">
                                            <label class="">
                                                <input type="radio" name="status" value="publish" class="form-radio"
                                                    checked />
                                                <span>Publish</span>
                                            </label>
                                        </div>
                                        <div class="p-1">
                                            <label class="">
                                                <input type="radio" name="status" value="draft" class="form-radio" />
                                                <span> Draft</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-right px-2 py-2">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save
                                            Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="border border-gray-200  dark:border-[#191e3a] rounded-md  mt-3 mb-5 bg-white dark:bg-[#0e1726]">
                            <div class=" border-gray-200 border-b p-2 "><strong class="p-1">Feature Image</strong></div>
                            <!-- side img -->
                            <div class="grid-cols-12 p-4 border-gray-200" style="width:100%;">
                                <div>
                                    <!-- <label for="ctnFile">Example file input</label> -->
                                    <input id="featureImg" type="file"
                                        class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"
                                        name="featured_image" accept="image/*" />
                                    <div id="sideImg" class="img">

                                    </div>
                                </div>
                                <!-- side img -->
                            </div>
                            <!-- side img -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>
    <!--imgs + seo manger -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview/dist/style.css" />
    <script src="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
    <script>
    // imgs
    document.getElementById("featureImg").addEventListener("input", function() {
        document.getElementById("sideImg").innerHTML = `
            <img src="${window.URL.createObjectURL(document.getElementById("featureImg").files[0])}" alt="featuredImg">
            `;
    })
    document.getElementById("facebookImg").addEventListener("input", function() {
        document.getElementById("faceImg").innerHTML = `
            <img src="${window.URL.createObjectURL(document.getElementById("facebookImg").files[0])}" alt="facebookdImg">
            `;
    })
    document.getElementById("homeImg").addEventListener("input", function() {
        document.getElementById("hImg").innerHTML = `
            <img src="${window.URL.createObjectURL(document.getElementById("homeImg").files[0])}" alt="homeImg">
            `;
    })
    document.getElementById("twitterImg").addEventListener("input", function() {
        document.getElementById("twitImg").innerHTML = `
            <img src="${window.URL.createObjectURL(document.getElementById("twitterImg").files[0])}" alt="twitterImg">
            `;
    })
    // imgs
    // task2
    function Booleanseo() {
        if (document.getElementById("boolean-seo").value == "0") {
            document.getElementById('seo-details').style.display = 'none';
        } else {
            document.getElementById('seo-details').style.display = 'block'
        };
    }
    let seo_f = document.querySelectorAll(".form-input");
    for (let i = 0; i < seo_f.length; i++) {
        seo_f[i].innerText = seo_f[i].value
    }

    function home() {
        document.getElementById("home").style.display = "block"
        document.getElementById("facebook").style.display = "none"
        document.getElementById("twitter").style.display = "none"
    }

    function facebook() {
        document.getElementById("home").style.display = "none"
        document.getElementById("facebook").style.display = "block"
        document.getElementById("twitter").style.display = "none"
    }

    function twitter() {
        document.getElementById("home").style.display = "none"
        document.getElementById("facebook").style.display = "none"
        document.getElementById("twitter").style.display = "block"
    }
    // task 2
    </script>
    <!-- img +seo manger  -->

    <script>
    document.addEventListener("DOMContentLoaded", function(e) {
        // default
        var els = document.querySelectorAll(".selectize");
        els.forEach(function(select) {
            NiceSelect.bind(select);
        });

        // seachable
        var options = {
            searchable: true
        };
        NiceSelect.bind(document.getElementById("seachable-select"), options);
    });

    var toolbar = quill.container.previousSibling;
    toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
    toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
    toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
    toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
    toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
    toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
    toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
    toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');
    </script>

</x-layout.default>