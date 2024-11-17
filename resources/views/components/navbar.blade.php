<nav 
    x-data="{ 
        isOpen: false,
        scrolled: false,
        init() {
            window.addEventListener('scroll', () => this.scrolled = window.pageYOffset > 50)
        }
    }" 
    :class="{ 
        'bg-[#005e84]/95 backdrop-blur-sm shadow-lg': scrolled, 
        'bg-[rgba(0,95,132,0.11)]': !scrolled 
    }" 
    class="navbar fixed top-[40px] left-0 w-full z-50 transition-all duration-500">
    
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
        <div class="relative flex items-center justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0 group">
                <img 
                    class="h-12 w-auto transition-all duration-300 transform group-hover:scale-110" 
                    src="{{ asset('images/logo.png') }}" 
                    alt="SMA 2 PSKD"
                    onerror="this.src='https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500'"
                >
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:block">
                <div class="flex space-x-8">
                    @php
                        $navItems = [
                            ['name' => 'Beranda', 'href' => '#home'],
                            ['name' => 'Profil Guru', 'href' => '#profil'],
                            ['name' => 'Galeri', 'href' => '#galeri'],
                            ['name' => 'Kontak', 'href' => '#kontak']
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <a 
                            href="{{ $item['href'] }}" 
                            class="group relative px-3 py-2 text-lg font-medium text-gray-300 transition-all duration-300"
                        >
                            <span class="relative z-10">{{ $item['name'] }}</span>
                            <span 
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-white transform origin-left scale-x-0 transition-transform duration-300 group-hover:scale-x-100"
                            ></span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="sm:hidden">
                <button 
                    @click="isOpen = !isOpen" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-[#005e84] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition-all duration-300"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg 
                        class="h-6 w-6 transition-transform duration-300" 
                        :class="{'rotate-90': isOpen, 'rotate-0': !isOpen}"
                        stroke="currentColor" 
                        fill="none" 
                        viewBox="0 0 24 24"
                    >
                        <path 
                            :class="{'hidden': isOpen, 'inline-flex': !isOpen }" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path 
                            :class="{'inline-flex': isOpen, 'hidden': !isOpen }" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div 
        x-show="isOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="sm:hidden bg-[#005e84]/95 backdrop-blur-sm
        z-50"
    >
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach($navItems as $item)
                <a 
                    href="{{ $item['href'] }}" 
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-[#005e84] transition-all duration-300"
                >
                    {{ $item['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>