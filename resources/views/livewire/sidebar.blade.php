<nav class="fixed bg-white shadow round py-12 w-56 top-0 h-screen">
    {{-- <ul class="list-none flex h-full flex-col justify-between"> --}}
    <div class="flex justify-center mb-10">
        <a href="{{ route('home') }}" class="">
            <x-application-mark class="block h-12 w-auto" />
        </a>
    </div>
    <ul class="">
        <li class="">
            <x-nav-link href="{{ route('control') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
        </li>
        @if ($this->privileges->can_all)
        {{-- @if (Auth::user()->role->privileges->can_all) --}}
            <li class="">
                <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    {{ __('Admin') }}
                </x-nav-link>
            </li>
        @endif
        @if (Auth::user()->role->privileges->wallet_access &&
                Auth::user()->role->privileges->can_order_service &&
                Auth::user()->role->privileges->can_create_tasks)
            <li class="">
                <x-nav-link href="{{ route('wallet') }}" :active="request()->routeIs('wallet')">
                    {{ __('Wallet') }}
                </x-nav-link>
            </li>
            <li class="">
                <x-nav-link href="{{ route('transactions') }}" :active="request()->routeIs('transactions')">
                    {{ __('Payments') }}
                </x-nav-link>
            </li>
            <li class="">
                <x-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                    {{ __('Solutions for Bussines') }}
                </x-nav-link>
            </li>
            <li class="">
                <x-nav-link href="{{ route('company') }}" :active="request()->routeIs('company')">
                    {{ __('Company profile') }}
                </x-nav-link>
            </li>
            <li class="">
                <x-nav-link href="{{ route('projects') }}" :active="request()->routeIs('projects')">
                    {{ __('Projects') }}
                </x-nav-link>
            </li>
        @endif
    </ul>

    @auth
        <!-- Settings Dropdown -->
        <div class="relative">
            <x-sidebar-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex items-center justify-between w-full"
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                            {{ Auth::user()->name }}

                            <x-heroicon-o-chevron-right class="h-4 w-4" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md w-full">
                            <button type="button" class="flex items-center justify-between w-full">
                                {{ Auth::user()->name }}

                                <x-heroicon-o-chevron-right class="h-4 w-4" />
                            </button>
                        </span>
                    @endif
                </x-slot>
                <x-slot name="content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-sidebar-dropdown>
        </div>
    @endauth
</nav>
