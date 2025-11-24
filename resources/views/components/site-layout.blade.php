<!DOCTYPE html>
<html lang="en">

<head>
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
            <nav class="space-x-8">
                <a href="/" class="hover:text-blue-600 transition">Home</a>
                <a href="/services" class="hover:text-blue-600 transition">Services</a>
                <a href="/contact" class="hover:text-blue-600 transition">Contact</a>
            </nav>

        </div>
    </header>


    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto px-4 py-10">
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