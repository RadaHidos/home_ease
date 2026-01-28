<div>
    <div class="mt-20 px-4">
        <div class="max-w-6xl mx-auto text-center mb-8">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#1b1b18]">
                Home Decoration & Kitchen
            </h2>
            <p class="text-sm text-[#6b6a68] mt-2">
                Browse our selected range of home decoration and kitchen accessories (External API)
            </p>
        </div>

        <div class="max-w-xl mx-auto mb-8 relative">
            <input
                wire:model.live.debounce.300ms="search"
                type="text"
                placeholder="Search items..."
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

        @if($error)
        <div class="max-w-4xl mx-auto bg-red-50 border-l-4 border-red-500 p-4 mb-4 rounded-r">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ $error }}</p>
                </div>
            </div>
        </div>
        @endif

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $product)
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:scale-[1.02] flex flex-col h-full">

                <div class="relative h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden">
                    @if(isset($product['thumbnail']))
                    <img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover">
                    @endif
                </div>

                <div class="mb-2">
                    <span class="px-2 py-1 text-[10px] uppercase font-bold tracking-wider rounded-full bg-blue-50 text-blue-600">
                        {{ $product['category'] ?? 'Item' }}
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-[#1b1b18] mb-2 line-clamp-1" title="{{ $product['title'] }}">
                    {{ $product['title'] }}
                </h3>

                <p class="text-sm text-[#6b6a68] mb-4 line-clamp-3 flex-grow">
                    {{ $product['description'] }}
                </p>

                <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                    <p class="text-lg font-bold text-blue-600">
                        ${{ $product['price'] }}
                    </p>

                    <button class="inline-flex items-center justify-center px-4 py-2 rounded-full text-xs font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                        View Details
                    </button>
                </div>
            </div>
            @empty
            @if(!$error && $search)
            <div class="col-span-full py-12 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-100 mb-4">
                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-[#1b1b18]">No products found</h3>
                <p class="mt-1 text-[#6b6a68]">We couldn't find any products matching "{{ $search }}".</p>
            </div>
            @elseif(!$error)
            <div class="col-span-full text-center py-12 text-[#9ca3af] italic">
                Start typing to search products...
            </div>
            @endif
            @endforelse
        </div>
    </div>
</div>