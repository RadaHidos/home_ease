<x-site-layout title='{{$category->name}}'>


    <div class="mb-8">

        <p class="text-sm text-slate-500">
            {{ $category->services->count() }} service{{ $category->services->count() === 1 ? '' : 's' }} in this category
        </p>
    </div>

    <div class="space-y-4">
        @foreach($category->services as $service)
        <a href="/services/{{$service->id}}"
            class="block bg-white rounded-2xl border border-slate-200 shadow-sm p-5
                          transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <h2 class="text-lg font-semibold text-slate-900">
                {{ $service->title }}
            </h2>

            <p class="mt-1 text-sm text-blue-600 font-light">
                View service →
            </p>
        </a>
        @endforeach
    </div>


</x-site-layout>