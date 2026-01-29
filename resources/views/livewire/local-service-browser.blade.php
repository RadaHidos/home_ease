<div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @if($error)
        <div class="col-span-full max-w-4xl mx-auto bg-red-50 border-l-4 border-red-500 p-4 mb-4 rounded-r w-full">
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

        @forelse($services as $service)
        <div article class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-l hover:scale-[1.01]">
            <div>
                <a href="/services/{{ $service['id'] }}" class="text-lg font-semibold text-slate-900 leading-snug mb-3 inline-block hover:text-blue-600 transition-colors duration-200">
                    {{ $service['title'] }}
                </a>

                <div class="mb-3 flex flex-wrap gap-2">
                    @if(isset($service['categories']))
                    @foreach ($service['categories'] as $category)
                    <a href="/categories/{{ $category['id'] }}" class="px-3 py-1 text-xs font-normal rounded-full bg-blue-100 text-blue-700 transition hover:bg-blue-200 hover:-translate-y-[1px]">
                        {{ $category['name'] }}
                    </a>
                    @endforeach
                    @endif
                </div>

                <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                    {{ $service['content'] }}
                </p>
            </div>

            <div class="mt-5 pt-4 border-t border-slate-100">
                <div class="flex items-center justify-between gap-3 mb-4">
                    <p class="text-sm font-medium text-slate-800">
                        {{ $service['author']['name'] ?? 'Unknown' }}
                    </p>

                    @auth
                    @if(isset($service['author_id']) && auth()->id() == $service['author_id'])
                    <a href="/admin/services/{{$service['id']}}/edit" class="text-sm text-blue-600 hover:text-blue-800 font-medium">EDIT</a>
                    @endif
                    @endauth
                </div>
                <p class="text-sm font-semibold text-blue-600 mb-2">
                    €{{ $service['price'] }}
                </p>
            </div>
        </div>
        @empty
        @if(!$error)
        <div class="col-span-full py-12 text-center text-gray-500 italic">
            No services found.
        </div>
        @endif
        @endforelse
    </div>
</div>