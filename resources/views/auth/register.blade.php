<x-layout.auth>
    @section('title','Hotels - Register')        
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div
        class="flex justify-center items-center min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
        <div class="panel sm:w-[480px] m-6 max-w-lg w-full">
            <h2 class="font-bold text-2xl mb-3">Sign Up</h2>
            <p class="mb-7">Enter your email and password to register</p>
            <form class="space-y-5" id="register-form" method="POST" action="{{route('register')}}">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-input" name="name" placeholder="Enter Name" required />
                </div>
                <div>
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-input" name="username" placeholder="Enter Username" required />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-input" name="email" placeholder="Enter Email" required />
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-input" name="phone" placeholder="Enter Phone" required />
                </div>
                <div class="mb-5">
                    <label for="gender">Gender</label>
                    <select class="selectize" id="gender" placeholder="Choose Gender" name="gender" required>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="seachable-select">Country</label>
                        <select id="seachable-select" name="country" required>
                            @foreach ($countries as $country)
                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-input" name="password" placeholder="Enter Password" required />
                </div>
                <div class="mb-5">
                    <label for="editor">Bio</label>
                    <input  style="display:none" name="bio">

                    <div id="editor"></div>
                </div>
                
                <button type="submit" class="btn btn-primary w-full">SIGN UP</button>
            </form>
            
            <p class="text-center mt-3">Already have an account ? <a href="{{route('login')}}"
                    class="text-primary font-bold hover:underline">Sign In</a></p>
        </div>
    </div>

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>


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
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function() {
        // Populate hidden form on submit
        var content = document.querySelector(".ql-editor").innerHTML;
        var bio = document.querySelector('input[name=bio]');
        bio.value = content;
        };
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

</x-layout.auth>
