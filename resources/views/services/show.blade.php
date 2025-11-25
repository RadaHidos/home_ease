<x-site-layout title="{{$service->title}}">

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

    <section class="mt-10">
        <h2 class="text-xl font-semibold text-slate-900 mb-5">Comments</h2>

        @foreach ($service->comments as $comment)
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-4
                    transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <p class="text-sm text-slate-700 leading-relaxed">
                {{ $comment->content }}
            </p>
        </div>
        @endforeach

        @if ($service->comments->count() === 0)
        <p class="text-sm text-slate-500 italic">No comments yet.</p>
        @endif
    </section>


</x-site-layout>