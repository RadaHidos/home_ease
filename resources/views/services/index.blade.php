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

                <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                    {{ $service->content }}
                </p>
            </div>



            </article>
            @endforeach

    </div>

</x-site-layout>