<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="/" class="main-logo flex items-center shrink-0">
                    <img class="w-8 ml-[5px] flex-none" src="/assets/images/logo.svg"
                        alt="image" />
                    <span
                        class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline dark:text-white-light">SavvyDash</span>
                </a>
                <a href="javascript:;"
                    class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0"
                x-data="{ activeDropdown: null }">
                {{--
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'dashboard' }"
                        @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'">
                        <div class="flex items-center">

                            <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    fill="currentColor" />
                                <path
                                    d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                    fill="currentColor" />
                            </svg>

                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'dashboard' }">

                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'dashboard'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="/">Sales</a>
                        </li>
                        <li>
                            <a href="/analytics">Analytics</a>
                        </li>
                        <li>
                            <a href="/finance">Finance</a>
                        </li>
                        <li>
                            <a href="/crypto">Crypto</a>
                        </li>
                    </ul>
                </li>
                --}}
                <h2
                    class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Pages</span>
                </h2>

                <li class="nav-item">
                    <ul>

                        <li class="nav-item">
                            <a href="{{route('dashboard.show')}}" class="group">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    fill="currentColor" />
                                <path
                                    d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                    fill="currentColor" />
                            </svg>

                                    <span
                                        class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        @if (auth()->user()->role_id == 1)
                        <li class="menu nav-item">
                                <button type="button" class="nav-link group"
                                    :class="{ 'active': activeDropdown === 'users' }"
                                    @click="activeDropdown === 'users' ? activeDropdown = null : activeDropdown = 'users'">
                                    <div class="flex items-center">

                                        <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.5" cx="15" cy="6" r="3"
                                        fill="currentColor" />
                                    <ellipse opacity="0.5" cx="16" cy="17" rx="5" ry="3"
                                        fill="currentColor" />
                                    <circle cx="9.00098" cy="6" r="4" fill="currentColor" />
                                    <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                        fill="currentColor" />
                                </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Users</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'users' }">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'users'" x-collapse class="sub-menu text-gray-500">
                                    <li>

                                        <a href="{{route('admins.show')}}">Admins</a>
                                        <a href="{{route('users.show')}}">Users</a>
                                        <a href="{{route('roles.show')}}">Role Mangement</a>
                                        <a href="{{route('subscribers.show')}}">Subscribers</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <li class="menu nav-item">
                                <button type="button" class="nav-link group"
                                    :class="{ 'active': activeDropdown === 'hotels' }"
                                    @click="activeDropdown === 'hotels' ? activeDropdown = null : activeDropdown = 'hotels'">
                                    <div class="flex items-center">

                                        <svg class="group-hover:!text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5H11C12.8856 5 13.8284 5 14.4142 5.58579C15 6.17157 15 7.11438 15 9V21.25H16.5H21H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3V9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5ZM5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H12C12.4142 7.25 12.75 7.58579 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8ZM5.25 11C5.25 10.5858 5.58579 10.25 6 10.25H12C12.4142 10.25 12.75 10.5858 12.75 11C12.75 11.4142 12.4142 11.75 12 11.75H6C5.58579 11.75 5.25 11.4142 5.25 11ZM5.25 14C5.25 13.5858 5.58579 13.25 6 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H6C5.58579 14.75 5.25 14.4142 5.25 14ZM9 18.25C9.41421 18.25 9.75 18.5858 9.75 19V21.25H8.25V19C8.25 18.5858 8.58579 18.25 9 18.25Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M15 2H17C18.8856 2 19.8284 2 20.4142 2.58579C21 3.17157 21 4.11438 21 6V21.25H15V9C15 7.11438 15 6.17157 14.4142 5.58579C13.8416 5.01319 12.9279 5.0003 11.126 5.00001V3.49999C11.2103 3.11275 11.351 2.82059 11.5858 2.58579C12.1715 2 13.1144 2 15 2Z" fill="currentColor"/>
                                            </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Hotels</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'hotels' }">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'hotels'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="{{route('hotels.show')}}">All Hotels</a>
                                        <a href="{{route('hotels.availabilty.show')}}">Availabilty</a>
                                        <a href="{{route('hotel.attr.show')}}">Attributes</a>

                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item">
                                <button type="button" class="nav-link group"
                                    :class="{ 'active': activeDropdown === 'rooms' }"
                                    @click="activeDropdown === 'rooms' ? activeDropdown = null : activeDropdown = 'rooms'">
                                    <div class="flex items-center">

                                        <svg class="group-hover:!text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5H11C12.8856 5 13.8284 5 14.4142 5.58579C15 6.17157 15 7.11438 15 9V21.25H16.5H21H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3V9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5ZM5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H12C12.4142 7.25 12.75 7.58579 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8ZM5.25 11C5.25 10.5858 5.58579 10.25 6 10.25H12C12.4142 10.25 12.75 10.5858 12.75 11C12.75 11.4142 12.4142 11.75 12 11.75H6C5.58579 11.75 5.25 11.4142 5.25 11ZM5.25 14C5.25 13.5858 5.58579 13.25 6 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H6C5.58579 14.75 5.25 14.4142 5.25 14ZM9 18.25C9.41421 18.25 9.75 18.5858 9.75 19V21.25H8.25V19C8.25 18.5858 8.58579 18.25 9 18.25Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M15 2H17C18.8856 2 19.8284 2 20.4142 2.58579C21 3.17157 21 4.11438 21 6V21.25H15V9C15 7.11438 15 6.17157 14.4142 5.58579C13.8416 5.01319 12.9279 5.0003 11.126 5.00001V3.49999C11.2103 3.11275 11.351 2.82059 11.5858 2.58579C12.1715 2 13.1144 2 15 2Z" fill="currentColor"/>
                                            </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Rooms</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'rooms' }">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'rooms'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="{{route('rooms.show')}}">All rooms</a>
                                        <a href="{{route('room.category.show')}}">Categories</a>
                                        <a href="{{route('room.attr.show')}}">Attributes</a>

                                    </li>
                                </ul>
                            </li>


                            <li class="menu nav-item">
                                <button type="button" class="nav-link group"
                                    :class="{ 'active': activeDropdown === 'tours' }"
                                    @click="activeDropdown === 'tours' ? activeDropdown = null : activeDropdown = 'tours'">
                                    <div class="flex items-center">

                                        <svg class="group-hover:!text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5H11C12.8856 5 13.8284 5 14.4142 5.58579C15 6.17157 15 7.11438 15 9V21.25H16.5H21H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3V9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5ZM5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H12C12.4142 7.25 12.75 7.58579 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8ZM5.25 11C5.25 10.5858 5.58579 10.25 6 10.25H12C12.4142 10.25 12.75 10.5858 12.75 11C12.75 11.4142 12.4142 11.75 12 11.75H6C5.58579 11.75 5.25 11.4142 5.25 11ZM5.25 14C5.25 13.5858 5.58579 13.25 6 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H6C5.58579 14.75 5.25 14.4142 5.25 14ZM9 18.25C9.41421 18.25 9.75 18.5858 9.75 19V21.25H8.25V19C8.25 18.5858 8.58579 18.25 9 18.25Z" fill="currentColor"/>
                                            <path opacity="0.5" d="M15 2H17C18.8856 2 19.8284 2 20.4142 2.58579C21 3.17157 21 4.11438 21 6V21.25H15V9C15 7.11438 15 6.17157 14.4142 5.58579C13.8416 5.01319 12.9279 5.0003 11.126 5.00001V3.49999C11.2103 3.11275 11.351 2.82059 11.5858 2.58579C12.1715 2 13.1144 2 15 2Z" fill="currentColor"/>
                                            </svg>
                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Tours</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'tours' }">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'tours'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="{{route('tours.show')}}">All Tours</a>
                                        <a href="{{route('tour.category.show')}}">Categories</a>
                                        <a href="{{route('tour.attr.show')}}">Attributes</a>

                                    </li>
                                </ul>
                            </li>

                            <li class="menu nav-item">
                                <button type="button" class="nav-link group"
                                    :class="{ 'active': activeDropdown === 'booking' }"
                                    @click="activeDropdown === 'booking' ? activeDropdown = null : activeDropdown = 'booking'">
                                    <div class="flex items-center">

                                        <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.46447 1.46447C0 2.92893 0 5.28595 0 10C0 14.714 0 17.0711 1.46447 18.5355C2.92893 20 5.28595 20 10 20C14.714 20 17.0711 20 18.5355 18.5355C20 17.0711 20 14.714 20 10C20 5.28595 20 2.92893 18.5355 1.46447C17.8515 0.780431 16.9727 0.415901 15.75 0.221638V9.83102C15.75 10.2986 15.75 10.6821 15.7326 10.9839C15.7155 11.2816 15.6786 11.5899 15.5563 11.8652C15.1149 12.859 14.0259 13.3949 12.9691 13.1383C12.6764 13.0673 12.4096 12.9084 12.1633 12.7404C11.9136 12.57 11.6097 12.336 11.2392 12.0508L11.2207 12.0365C10.7513 11.6751 10.6192 11.5804 10.4981 11.5277C10.1804 11.3897 9.81962 11.3897 9.50191 11.5277C9.38076 11.5804 9.24867 11.6751 8.77934 12.0365L8.7608 12.0508C8.39033 12.336 8.08645 12.57 7.83672 12.7404C7.59039 12.9084 7.32356 13.0673 7.03087 13.1383C5.97413 13.3949 4.88513 12.859 4.44371 11.8652C4.32145 11.5899 4.28454 11.2816 4.26739 10.9839C4.24999 10.6821 4.25 10.2986 4.25 9.831L4.25 0.221638C3.02727 0.415901 2.1485 0.780431 1.46447 1.46447ZM5 15.25C4.58579 15.25 4.25 15.5858 4.25 16C4.25 16.4142 4.58579 16.75 5 16.75H15C15.4142 16.75 15.75 16.4142 15.75 16C15.75 15.5858 15.4142 15.25 15 15.25H5Z" fill="currentColor"/>
                                            <path d="M5.75 0.0687364V9.8076C5.75 10.3043 5.7503 10.6442 5.7649 10.8976C5.78003 11.1601 5.80769 11.2408 5.81457 11.2563C5.96171 11.5876 6.32471 11.7662 6.67695 11.6807C6.69342 11.6767 6.77428 11.6493 6.99148 11.5012C7.20112 11.3582 7.47062 11.151 7.86419 10.848L7.93119 10.7964C8.30138 10.511 8.58991 10.2885 8.90419 10.152C9.60317 9.84828 10.3968 9.84828 11.0958 10.152C11.4101 10.2885 11.6986 10.5109 12.0688 10.7964L12.1358 10.848C12.5294 11.151 12.7989 11.3582 13.0085 11.5012C13.2257 11.6493 13.3066 11.6767 13.323 11.6807C13.6753 11.7662 14.0383 11.5876 14.1854 11.2563C14.1923 11.2408 14.22 11.1601 14.2351 10.8976C14.2497 10.6442 14.25 10.3043 14.25 9.8076V0.0687364C13.0942 0 11.7004 0 10 0C8.29955 0 6.9058 0 5.75 0.0687364Z" fill="currentColor"/>
                                            </svg>

                                        <span
                                            class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Booking</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'booking' }">

                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'booking'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="{{route('booking.show')}}">Booking Reports</a>
                                    </li>
                                </ul>
                            </li>
            </ul>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>
