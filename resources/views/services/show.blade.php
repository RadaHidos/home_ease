<x-site-layout title="{{$service->title}}">
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