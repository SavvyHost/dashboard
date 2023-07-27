<x-layout.auth>
    @section('title','Hotels - Login')
    <div
        class="flex justify-center items-center min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
        <div class="panel sm:w-[480px] m-6 max-w-lg w-full">
            <h2 class="font-bold text-2xl mb-3">Sign In</h2>
            <p class="mb-7">Enter your email and password to login</p>
            @if (session()->get('success'))
            <p class="text-center" style="color: #bd1f36;">{{ session()->get('success') }}</p>
            @endif
            <form class="space-y-5"  method="POST" action="{{route('login')}}">
                @csrf
                {{-- <div>
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-input" name="username" placeholder="Enter Username" />
                </div> --}}
                <div>
                    <label for="login">Email or Phone</label>
                    <input id="login" type="text" class="form-input" name="login" placeholder="Enter Email or Phone" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-input" name="password" placeholder="Enter Password" />
                </div>
                <button type="submit" class="btn btn-primary w-full">SIGN IN</button>
            </form>
            <p class="text-center mt-3">Dont't have an account ? <a href="{{route('register')}}"
                    class="text-primary font-bold hover:underline">Sign Up</a></p>
        </div>
    </div>



</x-layout.auth>
