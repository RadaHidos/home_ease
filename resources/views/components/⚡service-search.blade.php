<div>
    <div class="mb-6">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Search services..."
            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($services as $service)
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-l hover:scale-[1.01]">

            <div>
                <a href="/services/{{ $service->id }}" class="text-lg font-semibold text-slate-900 leading-snug mb-3 inline-block hover:text-blue-600 transition-colors duration-200">
                    {{ $service->title }}
                </a>

                <div class="mb-3 flex flex-wrap gap-2">
                    @foreach ($service->categories as $category)
                    <a href="/categories/{{ $category->id }}" class="px-3 py-1 text-xs font-normal rounded-full bg-blue-100 text-blue-700 transition hover:bg-blue-200 hover:-translate-y-[1px]">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>

                <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                    {{ Str::limit($service->content, 100) }}
                </p>
            </div>

            <div class="mt-5 pt-4 border-t border-slate-100">
                <div class="flex items-center justify-between gap-3 mb-4">
                    <p class="text-sm font-medium text-slate-800">
                        {{ $service->author->name }}
                    </p>

                    @if($service->canBeManagedBy(auth()->user()))
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

    @if($services->isEmpty())
    <div class="text-center text-gray-500 py-10">
        No services found matching "{{ $search }}"
    </div>
    @endif
</div>