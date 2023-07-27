<x-layout.default>
    @section('title','Suppliements - New')
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        <div>
            <h2 class="text-xl">Room Suppliements</h2>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{route('hotels.show')}}" class="text-primary hover:underline">Hotels</a>            </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <a href="{{route('hotel.room.sup.show')}}" class="text-primary hover:underline">Suppliements</a>
                </li>
                 <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                        <span>New</span>
                    </li>

            </ul>
        </div>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Suppliements Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action="{{route('hotel.room.edit.sup.save',$attr->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="attrName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Attribute Name</label>
                            <input id="attrName" type="text"  placeholder="Enter Attribute Name"
                                class="form-input flex-1" name="name" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="attrPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Suppliement Price</label>
                            <input id="attrPrice" type="text"  placeholder="Enter Attribute Price"
                                class="form-input flex-1" name="price" required />
                        </div>

                        <button type="submit"  class="btn btn-primary !mt-6">Submit</button>
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
