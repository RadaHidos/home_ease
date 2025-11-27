<x-site-layout title="Services provided">
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">


        <!-- cards with title and content  -->
        @foreach ($services as $service)
        <div article class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between
    transition-all duration-300 hover:shadow-l hover:scale-[1.01]">

            <div>
                <a href="/services/{{ $service->id }}" class="text-lg font-semibold text-slate-900 
                leading-snug mb-3 inline-block hover:text-blue-600 transition-colors duration-200">
                    {{ $service->title }}
                </a>


                <div class="mb-3 flex flex-wrap gap-2">
                    @foreach ($service->categories as $category)
                    <a href="/categories/{{ $category->id }}"
                        class="px-3 py-1 text-xs font-normal rounded-full bg-blue-100 text-blue-700
                                  transition hover:bg-blue-200 hover:-translate-y-[1px]">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>

                <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                    {{ $service->content }}
                </p>
            </div>

            <div class="mt-5 pt-4 border-t border-slate-100">
                <!-- Name of the author -->
                <div class="flex items-center justify-between gap-3 mb-4">

                    <p class="text-sm font-medium text-slate-800">
                        {{$service->author->name}}
                    </p>

                    @if($service -> canBeManagedBy(auth()->user()))
                    <a href="/admin/services/{{$service->id}}/edit" class="text-sm text-blue-600 hover:text-blue-800 font-medium">EDIT</a>
                    @endif
                </div>
                <p class="text-sm font-semibold text-blue-600 mb-2">
                    €{{ $service->price }}
                </p>

            </div>


        </div>
        @endforeach

    </div>

</x-site-layout>