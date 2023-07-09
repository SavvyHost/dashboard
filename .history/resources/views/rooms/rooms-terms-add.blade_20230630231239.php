<x-layout.default>
    @section('title','Terms - New')
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        <div>
            <h2 class="text-xl">Room Terms</h2>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{route('hotels.show')}}" class="text-primary hover:underline">Hotels</a>            </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <a href="{{route('room.attr.show')}}" class="text-primary hover:underline">Attributes</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <a href="{{route('hotel.room.attr.terms.show',$attr->id)}}" class="text-primary hover:underline">{{$attr->name}}</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>New</span>
                </li>
            </ul>
        </div>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Term Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action={{ url('/rooms/attribute/' . $attr_id . '/term/news') }}  {{-- "{{route('room.attr.terms.form.save',$attr_id)}}" --}} enctype="multipart/form-data">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Term Name</label>
                            <input id="attrName" type="text"  placeholder="Enter Term Name"
                                class="form-input flex-1" name="name" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="attrPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Term Price</label>
                            <input id="attrPrice" type="text"  placeholder="Enter Term Price"
                                class="form-input flex-1" name="price" required />
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
    <!-- end hightlight js -->
</x-layout.default>
