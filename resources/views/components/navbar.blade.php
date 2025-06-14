<div>
    <header class="border-base-content/20 bg-base-100 fixed top-0 z-10 w-full border-b py-0.25 shadow-sm">
        <nav class="navbar mx-auto max-w-7xl rounded-b-xl px-4 sm:px-6 lg:px-8">
            <div class="w-full lg:flex lg:items-center lg:gap-2">
                <div class="navbar-start items-center justify-between max-lg:w-full">
                    <a class="text-base-content flex items-center gap-3 text-xl font-bold" href="#">
                        <img src="https://cdn.flyonui.com/fy-assets//logo/logo.png" class="size-8" alt="brand-logo" />
                        UMKMmu
                    </a>
                    <div class="flex items-center gap-3 lg:hidden">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline">Register</a>
                        @endguest
                        @auth
                            <a href="{{ route('cart.index') }}" class="btn btn-outline btn-square">
                                🛒
                            </a>

                        @endauth
                        {{-- Avatar (login) --}}
                        @auth
                            <div
                                class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                                <button type="button" class="dropdown-toggle flex items-center" aria-haspopup="menu"
                                    aria-expanded="false" aria-label="Dropdown">
                                    <div class="avatar">
                                        <div class="size-9.5 rounded-full">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                                alt="avatar" />
                                        </div>
                                    </div>
                                </button>
                                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu">
                                    <li class="dropdown-header gap-2">
                                        <div class="avatar">
                                            <div class="w-10 rounded-full">
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                                                    alt="avatar" />
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-base-content text-base font-semibold">{{ Auth::user()->name }}
                                            </h6>
                                            <small class="text-base-content/50">{{ Auth::user()->role ?? '-' }}</small>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('filament.panel.pages.dashboard') }}">
                                            <span class="icon-[tabler--user]"></span>
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-left w-full">
                                                <span class="icon-[tabler--logout]"></span>
                                                Sign out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                        {{-- Tombol hamburger: hanya tampil di mobile --}}
                        <div class="lg:hidden ml-auto flex items-center">
                            <button type="button" class="collapse-toggle btn btn-outline btn-secondary btn-square"
                                data-collapse="#navbar-block-4" aria-controls="navbar-block-4"
                                aria-label="Toggle navigation">
                                <span class="icon-[tabler--menu-2] collapse-open:hidden size-5.5"></span>
                                <span class="icon-[tabler--x] collapse-open:block hidden size-5.5"></span>
                            </button>
                        </div>
                    </div>

                </div>
                <div id="navbar-block-4"
                    class="lg:navbar-center transition-height collapse hidden grow overflow-hidden font-medium duration-300 lg:flex">
                    <div class="text-base-content flex gap-6 text-base max-lg:mt-4 max-lg:flex-col lg:items-center">
                        <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
                        <a href="{{ route('catalog.index') }}" class="hover:text-primary">Products</a>
                        <a href="#" class="hover:text-primary">About Us</a>
                        <a href="#" class="hover:text-primary">Contacts</a>
                    </div>
                </div>
                <div class="navbar-end hidden lg:flex items-center gap-4">

                    @auth
                        <a href="{{ route('cart.index') }}" class="btn btn-outline btn-square">
                            🛒
                        </a>

                    @endauth

                    {{-- Avatar (login) --}}
                    @auth
                        <div
                            class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                            <button type="button" class="dropdown-toggle flex items-center" aria-haspopup="menu"
                                aria-expanded="false" aria-label="Dropdown">
                                <div class="avatar">
                                    <div class="size-9.5 rounded-full">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                            alt="avatar" />
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu">
                                <li class="dropdown-header gap-2">
                                    <div class="avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                                                alt="avatar" />
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-base-content text-base font-semibold">{{ Auth::user()->name }}</h6>
                                        <small class="text-base-content/50">{{ Auth::user()->role ?? '-' }}</small>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('filament.panel.pages.dashboard') }}">
                                        <span class="icon-[tabler--user]"></span>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-left w-full">
                                            <span class="icon-[tabler--logout]"></span>
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth

                    {{-- Tombol Login & Register (jika belum login) --}}
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline">Register</a>
                    @endguest
                </div>



            </div>
        </nav>
    </header>
</div>
