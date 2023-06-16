<x-layout.default>
    @section('title', 'Roles - Edit')
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('roles.show') }}" class="text-primary hover:underline">Roles</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Role</h5>
                </div>
                <div class="mb-5">
                    <form class="space-y-5" method="POST" action="{{ route('role.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex sm:flex-row flex-col">
                            <label for="RoleName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Role Name</label>
                            <input id="RoleName" type="text" placeholder="Enter Role Name"
                                class="form-input flex-1" name="role_name" value="{{ $role->role_name }}" required />
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.default>
