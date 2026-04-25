<nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center h-16">

            <!-- LEFT: LOGO + TITLE -->
            <div class="flex items-center gap-3">
                
                <!-- ICON -->
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-6 w-6 text-blue-600" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 17v-2a4 4 0 014-4h4M7 7h10M7 3h10M7 21h10"/>
                    </svg>
                </div>

                <!-- TITLE -->
                <div>
                    <h1 class="text-sm font-bold text-gray-800">
                        Pemeliharaan Alat RS
                    </h1>
                    <p class="text-xs text-gray-400">
                        Dashboard
                    </p>
                </div>

            </div>

            <!-- CENTER: MENU -->
            <div class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ route('dashboard') }}" 
                    class="text-gray-700 hover:text-blue-600 font-medium">
                    Dashboard
                </a>
            </div>

            <!-- RIGHT: USER -->
            <div class="relative">
                <button onclick="toggleDropdown()" 
                    class="flex items-center gap-2 text-sm text-gray-700 hover:text-blue-600">

                    <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <span class="hidden sm:block">
                        {{ Auth::user()->name }}
                    </span>
                </button>

                <!-- DROPDOWN -->
                <div id="dropdownUser" 
                    class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-md">

                    <a href="{{ route('profile.edit') }}" 
                        class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div class="md:hidden px-4 pb-3">
        <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700">
            Dashboard
        </a>
    </div>
</nav>

<!-- SCRIPT -->
<script>
function toggleDropdown() {
    const el = document.getElementById('dropdownUser');
    el.classList.toggle('hidden');
}
</script>