<x-layout.default>
    @section('title','Roles')
    <div x-data="contacts">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Roles</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <a href="{{route('role.form.show')}}" role="button" class="btn btn-primary" >
                            <svg class="group-hover:!text-primary" style="margin-right:10px;" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                    fill="currentColor" />
                                <path
                                    d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z"
                                    fill="currentColor" />
                                <path
                                    d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                    fill="currentColor" />
                                <path
                                    d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                    fill="currentColor" />
                                <path
                                    d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.8995 2.75 17.25 5.10051 17.25 8V10.0036C17.8174 10.0089 18.3135 10.022 18.75 10.0546V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z"
                                    fill="currentColor" />
                            </svg>
                            Add Role
                            </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Creation Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <div class="flex items-center w-max">
                                            <div >{{$role->role_name}}</div>
                                        </div>
                                    </td>
                                    <td  class="whitespace-nowrap">{{$role->created_at}}</td>
                                    {{-- <td>
                                        <div class="flex gap-4 items-center ">
                                            <a href="#" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                        </div>
                                    </td> --}}
                                    <td>

                                        <div class="flex gap-4 items-center">
                                            <a href="{{ route('role.update', $role->id) }}" method="POST" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <form id="update-form-{{ $role->id }}" action="{{ route('role.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                {{-- <button type="submit" class="btn btn-sm btn-outline-danger" >Edit</button> --}}
                                                <a href="#" role="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('update-form-{{ $user->id }}').submit();">Delete</a>

                                            </form>
                                            <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" >Delete</button>
                                            </form>
                                        </div>




                                    </td>
                                </tr>

                                @endforeach


                        </tbody>
                    </table>
                </div>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("contacts", () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    email: '',
                    username: '',
                    phone: '',
                },
                displayType: 'list',
                addContactModal: false,
                params: {
                    id: null,
                    name: '',
                    email: '',
                    username: '',
                    phone: '',
                },
                filterdContactsList: [],
                contactList: {!! $roles !!},




            }));
        });
    </script>
</x-layout.default>
