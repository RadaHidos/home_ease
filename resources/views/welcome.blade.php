<x-site-layout title="HomeEase">
    <div class="min-h-screen text-[#1b1b18] flex flex-col pt-20 md:pt-32">

        <!-- hero section   -->
        <main class="flex items-start justify-center">
            <section class="w-full">
                <div class="max-w-4xl mt-20 mx-auto px-4 text-center">
                    <h1 class="text-3xl md:text-4xl font-semibold text-[#1b1b18] mb-4">
                        Create the outdoor space you love
                    </h1>

                    <p class="text-sm md:text-base text-[#706f6c] max-w-2xl mx-auto mb-8">
                        From plants and lighting to furniture and jacuzzis, HomeEase connects you with services
                        that turn any terrace, balcony, or garden into your favorite place to be.
                    </p>

                    @guest
                    <div class="flex flex-wrap justify-center gap-3">
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-6 py-2 rounded-full text-xs md:text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                            Get started
                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-6 py-2 rounded-full text-xs md:text-sm font-medium border border-slate-300 text-[#1b1b18] hover:bg-slate-100 transition">
                            I already have an account
                        </a>
                    </div>
                    @else
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-6 py-2 rounded-full text-xs md:text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                        Go to your dashboard
                    </a>
                    @endguest
                </div>


                <!-- featured services section  -->
                <section class="mt-50 px-4">
                    <div class="max-w-6xl mx-auto text-center mb-8">
                        <h2 class="text-2xl md:text-3xl font-semibold text-[#1b1b18]">
                            Featured Services
                        </h2>
                        <p class="text-sm text-[#6b6a68] mt-2">
                            A preview of what our providers offer.
                        </p>
                    </div>

                    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($services as $service)
                        <div class="border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                            <h3 class="text-lg font-semibold line-clamp-1 text-[#1b1b18] mb-2">
                                {{ $service->title }}
                            </h3>

                            <p class="text-sm text-[#6b6a68] line-clamp-3 mb-4">
                                {{ $service->content }}
                            </p>

                            <a href="/services/{{ $service->id }}"
                                class="inline-block mt-auto px-4 py-2 rounded-full text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                                View Service
                            </a>
                        </div>

                        @endforeach
                    </div>
                </section>


                <!-- categories section  -->
                <section class="mt-30 px-4">
                    <div class="max-w-6xl mx-auto text-center mb-8">
                        <h2 class="text-2xl md:text-3xl font-semibold text-[#1b1b18]">
                            Explore by Category
                        </h2>
                        <p class="text-sm text-[#6b6a68] mt-2">
                            Find services grouped by what you need for your space.
                        </p>
                    </div>

                    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($categories as $category)
                        <div class="border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition text-center">

                            <h3 class="text-lg font-semibold text-[#1b1b18] mb-4">
                                {{ $category->name }}
                            </h3>

                            <a href="/categories/{{ $category->id }}"
                                class="inline-block px-5 py-2 rounded-full text-xs font-semibold 
                       border border-blue-600 text-blue-600 bg-gray-50
                       hover:bg-blue-600 hover:text-white transition">
                                View services in this category
                            </a>
                        </div>
                        @endforeach
                    </div>

                </section>

            </section>
        </main>
    </div>
</x-site-layout>