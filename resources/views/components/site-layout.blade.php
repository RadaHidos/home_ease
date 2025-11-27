<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 text-gray-900 font-sans">

    <!-- This is the NAVBAR  -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="text-2xl font-semibold text-blue-600">
                HomeEase
            </a>

            <!-- Navigation links .. Home has the welcome page, services is the list of services in show/services and contact will have the contact page-->
            <nav class="space-x-6">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <a href="/services" class="hover:text-blue-600 transition">Services</a>
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
    </header>


    <!-- MAIN CONTENT -->
    <main class="w-4/5 mx-auto px-4 py-10">

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