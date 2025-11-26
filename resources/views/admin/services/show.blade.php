<x-app-layout title='{{$service->title}}'>

    <div class="text-xs text-slate-400 italic mt-2">
        Only you as an admin can see this.
    </div>


    <div class="mt-8 mb-10 border-l-4 border-blue-500 pl-4">
        <p class="text-sm text-slate-500">Service provided by</p>
        <p class="text-lg font-semibold text-blue-600">
            {{ $service->author->name}}
        </p>
    </div>

    <div class="flex gap-2 mt-4 mb-4">
        @foreach ($service->categories as $category)
        <a href="/categories/{{ $category->id }}" class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 transition
                     hover:bg-blue-200 hover:-translate-y-[1px]">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    {{$service->content}}


</x-app-layout>