<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> --}}
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
    {{-- 選單太多，寬度不夠，故拿掉最大寬度設定max-w-7xl --}}

        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    {{-- <a href="{{ route('dashboard') }}"> --}}
                    <a href="{{route('home')}}">
                        {{-- <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> --}}
                        {{ __('回首頁') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- <x-nav-link href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')"> --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('管理中心') }}
                    </x-nav-link>
                </div>
                {{-- add for laratrust --}}
                @role('Admin')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ url('laratrust/roles-assignment') }}">
                            {{ __('權限') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('DislikeFood.index') }}">
                            {{ __('不討喜食物') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('ChainDiner.index') }}">
                            {{ __('知名連鎖餐飲') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('DietGroup.index') }}">
                            {{ __('飲食族群') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('DietBehavior.index') }}">
                            {{ __('飲食習性清單') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('DinerType.index') }}">
                            {{ __('餐廳類別') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('FoodType.index') }}">
                            {{ __('食物類別') }}
                        </x-nav-link>
                    </div>
                @endrole


                @role('Vendor')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('Diner.index') }}">
                            {{ __('餐廳管理') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('Meal.index') }}">
                            {{ __('餐點管理') }}
                        </x-nav-link>
                    </div>
                @endrole

                @role('User')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('OftenDiner.index') }}">
                            {{ __('常光顧餐館') }}
                        </x-nav-link>
                    </div>
                    {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('Meal.index') }}">
                            {{ __('餐點管理') }}
                        </x-nav-link>
                    </div> --}}
                @endrole


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div> {{-- 取得使用者名字固定用法 --}}
                            {{-- @if (Auth::user()->hasRole('Admin'))
<p>admin</p>
 @else
 <p>'not admin'</p>
 @endif --}}

                            @if (Auth::user()->hasRole('Admin') && Auth::user()->hasRole('Vendor'))
                                超級管理員
                            @elseif(Auth::user()->hasRole('Admin'))
                                <p>管理員</p>
                            @elseif(Auth::user()->hasRole('Vendor'))
                                <p>餐飲業者</p>
                                @elseif(Auth::user()->hasRole('User'))
                                <p>會員</p>
                            @endif




                            {{-- @role('Admin')
admin
@endrole
@role('Vendor')
vendor
@endrole --}}




                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <!--右上方下拉選單位置-->
                            <x-dropdown-link :href="route('profile')">
                                {{ __('個人檔案') }}
                            </x-dropdown-link>
                            {{-- <x-dropdown-link :href="route('OftenDiner.index')">
                                {{ __('常去餐館') }}
                            </x-dropdown-link> --}}

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('登出') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('管理中心') }}
            </x-responsive-nav-link>
            {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('yumeal管理中心') }}
            </x-nav-link> --}}
            <hr style=" background-color: rgba(c, c, c, 0.2); height: 0px; border: 1;border-style: solid ;">
            @role('Admin')
               <x-responsive-nav-link href="{{ route('DislikeFood.index') }}">
                    {{ __('權限') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('DislikeFood.index') }}">
                    {{ __('不討喜食物') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('ChainDiner.index') }}">
                    {{ __('知名連鎖餐飲') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('DietGroup.index') }}">
                    {{ __('飲食族群') }}
                    </x-responsive-nav-linkk>

                    <x-responsive-nav-link href="{{ route('DietBehavior.index') }}">
                        {{ __('飲食習性清單') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('DinerType.index') }}">
                        {{ __('餐廳類別') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('FoodType.index') }}">
                        {{ __('食物類別') }}
                    </x-responsive-nav-link>
                @endrole
                <hr style=" background-color: rgba(c, c, c, 0.2); height: 0px; border: 1;border-style: solid ;">
                @role('Vendor')
                    <x-responsive-nav-link href="{{ route('Diner.index') }}">
                        {{ __('餐廳管理') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('Meal.index') }}">
                        {{ __('餐點管理') }}
                    </x-responsive-nav-link>
                @endrole
                <hr style=" background-color: rgba(c, c, c, 0.2); height: 0px; border: 1;border-style: solid ;">
                @role('User')
                    <x-responsive-nav-link href="{{ route('OftenDiner.index') }}">
                        {{ __('常光顧餐館') }}
                    </x-responsive-nav-link>
                    {{-- <x-responsive-nav-link href="{{ route('Meal.index') }}">
                        {{ __('餐點管理') }}
                    </x-responsive-nav-link> --}}
                @endrole
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('個人檔案') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('登出') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
