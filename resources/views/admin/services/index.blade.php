<x-app-layout title="Services">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Services
        </h2>
    </x-slot>

    <div class="mb-10">
        <p class="text-sm text-slate-500">
            Browse all services and discover what fits your needs.
        </p>
    </div>

    <a href="/admin/services/create"
        class="inline-flex items-center mb-4 px-3 py-2 rounded-lg text-xs font-medium
                      bg-blue-500 text-white hover:bg-blue-600 transition">
        + Add new service
    </a>

    <div class="grid gap-5 md:grid-cols-1 lg:grid-cols-1">

        @forelse ($services as $service)
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5
                        transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <div class="flex items-center justify-between mb-2">
                <div>
                    <a href="/admin/services/{{ $service->id }}"
                        class="text-lg font-semibold text-slate-900 hover:text-blue-600 transition-colors">
                        {{ $service->title }}
                    </a>
                    @if (!$service->is_published)
                    <p class="text-xs font-medium text-amber-600 mt-1">
                        This is a draft
                    </p>
                    @endif
                </div>

                <div class="flex items-center gap-3">
                    <a href="/admin/services/{{ $service->id }}/edit"
                        class="text-xs text-slate-400 hover:text-blue-500 transition-colors">
                        Edit
                    </a>

                    <form action="/admin/services/{{ $service->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-xs text-red-400 hover:text-red-600 transition-colors cursor-pointer">
                            Delete
                        </button>
                    </form>

                    @if (!$service->is_published)
                    <a href="/admin/services/{{$service->id}}/toggle-is-published"
                        class="inline-block text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-md hover:bg-blue-100 transition">
                        Publish
                    </a>
                    @else
                    <a href="/admin/services/{{ $service->id }}/toggle-is-published"
                        class="inline-block text-xs font-medium text-amber-700 bg-amber-100 px-3 py-1 rounded-md hover:bg-amber-200 transition">
                        Unpublish
                    </a>
                    @endif
                </div>
            </div>
        </div>

        @empty
        <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-slate-300">
            <h3 class="mt-2 text-sm font-semibold text-gray-900">No services created yet</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating your first service listing.</p>
            <div class="mt-6">
                <a href="/admin/services/create" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                    </svg>
                    Create new service
                </a>
            </div>
        </div>
        @endforelse
    </div>




</x-app-layout>