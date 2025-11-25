<x-site-layout title="Services provided">
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">


        <!-- cards with title and content  -->
        @foreach ($services as $service)
        <a href="/services/{{$service->id}}" article class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between
    transition-all duration-300 hover:shadow-l hover:scale-[1.01] cursor-pointer">

            <div>
                <h2 class="text-lg font-semibold text-slate-900 leading-snug mb-3">
                    {{ $service->title }}
                </h2>

                @foreach ($service->categories as $category)
                <span class="px-3 mr-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 transition
                     hover:bg-blue-200 hover:-translate-y-[1px]">
                    {{ $category->name }}
                </span>
                @endforeach

                <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                    {{ $service->content }}
                </p>
            </div>

            <div class="mt-5 pt-4 border-t border-slate-100">
                <!-- Name of the author -->
                <div class="flex items-center gap-3 mb-4">

                    <p class="text-sm font-medium text-slate-800">
                        {{$service->author->name}}
                    </p>
                </div>

            </div>


        </a>
        @endforeach

    </div>

</x-site-layout>