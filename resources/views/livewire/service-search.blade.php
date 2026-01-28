<div>
    <div class="mb-8 max-w-xl mx-auto">
        <div class="relative">
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="Search services (e.g. landscaping, cleaning)..."
                class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>

            <div wire:loading class="absolute right-3 top-3">
                <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>

    @if($services->isEmpty())
    <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-200">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No services found</h3>
        <p class="mt-1 text-sm text-gray-500">We couldn't find any services matching "{{ $search }}".</p>
        <button wire:click="$set('search', '')" class="mt-6 text-sm font-medium text-blue-600 hover:text-blue-500">
            Clear search
        </button>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
        @foreach ($services as $service)
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:scale-[1.02] flex flex-col h-full">

            <h3 class="text-lg font-semibold text-[#1b1b18] mb-2 line-clamp-1">
                {{ $service->title }}
            </h3>

            <p class="text-sm text-[#6b6a68] mb-4 line-clamp-3 flex-grow">
                {{ $service->content }}
            </p>

            <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                <p class="text-lg font-bold text-blue-600">
                    €{{ $service->price }}
                </p>

                <a href="/services/{{ $service->id }}" class="inline-flex items-center justify-center px-4 py-2 rounded-full text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                    View Service
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>