<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-900 font-sans">

    <!-- This is the NAVBAR  -->
    <header x-data="{ open: false }" class="bg-white border-b border-gray-200 relative">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="text-2xl font-semibold text-blue-600">
                HomeEase
            </a>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation links -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <a href="/services" class="hover:text-blue-600 transition">Services</a>
                <a href="/products-search" class="hover:text-blue-600 transition">Products</a>
                <a href="/categories" class="hover:text-blue-600 transition">Categories</a>


                @if (Route::has('login'))

                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-7 py-1.5 text-sm font-medium rounded-full
                   bg-blue-600 text-white hover:bg-blue-700 transition">
                    Dashboard
                </a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="inline-block px-7 py-1.5 text-sm font-medium rounded-full
                   border border-slate-200 text-slate-800 hover:bg-slate-100 transition">
                    Log in
                </a>

                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="inline-block px-7 py-1.5 text-sm font-semibold rounded-full
                       bg-blue-600 text-white hover:bg-blue-700 transition">
                    Register
                </a>
                @endif
                @endauth

                @endif

            </nav>

        </div>

        <!-- Mobile Navigation Menu -->
        <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-200 shadow-lg z-50">
            <div class="flex flex-col space-y-4 px-4 py-6">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="/services" class="text-gray-700 hover:text-blue-600 font-medium">Services</a>
                <a href="/products-search" class="text-gray-700 hover:text-blue-600 font-medium">Product Search (API)</a>
                <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium">Categories</a>

                @if (Route::has('login'))
                <div class="border-t border-gray-100 pt-4 flex flex-col space-y-3">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="text-center w-full px-6 py-2 text-sm font-medium rounded-full
                           bg-blue-600 text-white hover:bg-blue-700 transition">
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="text-center w-full px-6 py-2 text-sm font-medium rounded-full
                           border border-slate-200 text-slate-800 hover:bg-slate-100 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="text-center w-full px-6 py-2 text-sm font-semibold rounded-full
                               bg-blue-600 text-white hover:bg-blue-700 transition">
                        Register
                    </a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </header>


    <!-- MAIN CONTENT -->
    <main class="w-full max-w-6xl mx-auto px-4 py-10">

        {{ $slot }}

    </main>


    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-6 mt-10">
        <div class="max-w-6xl mx-auto text-center text-sm text-gray-600">
            © {{ date('Y') }} HomeEase — All rights reserved.
        </div>
    </footer>

</body>

</html>