<x-site-layout title="{{$service->title}}">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold text-slate-900">
            {{ $service->title }}
        </h1>

        <span class="text-2xl font-bold text-blue-600">
            €{{ number_format($service->price, 2) }}
        </span>
    </div>

    <div class="mt-8 mb-10 border-l-4 border-blue-500 pl-4">
        <p class="text-sm text-slate-500">Service provided by</p>
        <p class="text-lg font-semibold text-blue-600">
            {{ $service->author->name }}
        </p>
    </div>

    <div class="flex gap-2 mt-4 mb-4">
        @foreach ($service->categories as $category)
        <a href="/categories/{{ $category->id }}"
            class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 transition hover:bg-blue-200 hover:-translate-y-[1px]">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    <p class="text-base leading-relaxed text-slate-700 mb-10">
        {{ $service->content }}
    </p>

    <x-service-comments :service="$service"></x-service-comments>

</x-site-layout>