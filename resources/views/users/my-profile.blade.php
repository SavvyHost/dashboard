<x-layout.default>
    @section('title','My Profile')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    
    <div>
        
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">My Profile</h5>
            </div>
            <div x-data="{ tab: 'home' }">
                <ul
                    class="sm:flex font-semibold border-b border-[#ebedf2] dark:border-[#191e3a] mb-5 whitespace-nowrap overflow-y-auto">
                    <li class="inline-block">
                        <a href="#"
                            class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary"
                            :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                            Home
                        </a>
                    </li>
                </ul>
                <template x-if="tab === 'home'">
                    <div>
                        <form method="POST" action="{{route('user.edit.save',auth()->user()->id)}}"
                            class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
                            @csrf
                            <h6 class="text-lg font-bold mb-5">General Information</h6>
                            @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif
                            <div class="flex flex-col sm:flex-row">
                                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label for="name">Full Name</label>
                                        <input id="name" type="text" name="name" value="{{auth()->user()->name}}"
                                            class="form-input"   required/>
                                    </div>
                                    <div>
                                        <label for="username">Username</label>
                                        <input id="username" type="text" value="{{auth()->user()->username}}"
                                            class="form-input" name="username" required />
                                    </div>
                                    <div>
                                        <label for="email">Email</label>
                                        <input id="email" type="text" value="{{auth()->user()->email}}"
                                            class="form-input" name="email" required />
                                    </div>
                                    <div>
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" value="{{auth()->user()->phone}}"
                                            class="form-input" name="phone" required />
                                    </div>
                                    <div>
                                        <label for="seachable-select">Country</label>
                                        <select id="seachable-select" name="country" required>
                                            @foreach ($countries as $country)
                                                <option @if (auth()->user()->country == $country->country_name)
                                                    selected
                                                @endif value="{{$country->country_name}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="gender">Gender</label>
                                        <select class="selectize" id="gender"  name="gender" required>
                                            <option @if (auth()->user()->gender == 1)
                                                selected
                                            @endif value="1">Male</option>
                                            <option @if (auth()->user()->gender == 2)
                                                selected
                                            @endif value="2">Female</option>
                                        </select>
                                    </div>
                                    @if (auth()->user()->role_id == 1)
                                        <div>
                                            <label for="role">Role</label>
                                            <select class="selectize" id="role"  name="role" required>
                                                <option @if (auth()->user()->role_id == 1)
                                                    selected
                                                @endif value="1">Admin</option>
                                                <option @if (auth()->user()->role_id == 2)
                                                    selected
                                                @endif value="2">User</option>
                                            </select>
                                        </div>
                                    @endif
                                    <div>
                                        <label for="created_at">Created at</label>
                                        <input id="created_at" type="text" value="{{auth()->user()->created_at}}"
                                            class="form-input" disabled />
                                    </div>
                                    
                                    <div style="margin-bottom: 4rem">
                                        <label for="editor">Bio</label>
                                        
                                        <input  style="display:none" value="{{auth()->user()->bio}}" name="bio">
                                        
                                        <div id="editor">
                                            {!! auth()->user()->bio !!}
                                        </div>
                                    </div>
                                    
                                    <div class="sm:col-span-2 mt-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
        var bio = document.querySelector('input[name=bio]');
        bio.value = content;
        };
                            </script>
                        </form>
                    </div>
                </template>

            </div>
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
