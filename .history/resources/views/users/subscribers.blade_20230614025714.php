<x-layout.default>
    @section('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
          });
          calendar.render();
        });

      </script>
    @endsection
    @section('title','Subscribers')
    <div x-data="contacts">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Subscribers</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <a href="{{route('subscribers.add.form.show')}}" role="button" class="btn btn-primary" >
                            <svg class="group-hover:!text-primary" style="margin-right: 10px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="6" r="4" fill="currentColor"/>
                                <path d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z" fill="currentColor"/>
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>

                            Add Subscriber
                            </a>
                    </div>
                </div>
                <div class="relative ">
                    <input type="text" placeholder="Search By Name"
                        class="form-input py-2 ltr:pr-11 rtl:pl-11 peer"  />
                    <div
                        class="absolute ltr:right-[11px] rtl:left-[11px] top-1/2 -translate-y-1/2 peer-focus:text-primary">

                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </svg>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>
                                        <div class="flex items-center w-max">
                                            <div >{{$subscriber->name}}</div>
                                        </div>
                                    </td>

                                    <td >{{$subscriber->email}}</td>
                                    <td  class="whitespace-nowrap">{{$subscriber->created_at}}</td>
                                    <td>
                                        <div class="flex gap-4 items-center ">
                                            <a href="{{ url('/subscribers', $subscriber->id) }}" role="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach


                        </tbody>
                    </table>
                </div>
                <div id='calendar'></div>
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
                searchUser: '',
                contactList: {!! $subscribers !!},
            }));
        });
    </script>
</x-layout.default>
