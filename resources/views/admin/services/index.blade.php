<x-site-layout title="Services">

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
        @foreach ($services as $service)

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5
                    transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <div class="flex items-center justify-between mb-2">

                <div>
                    <a href="/admin/services/{{ $service->id }}"
                        class="text-lg font-semibold text-slate-900 hover:text-blue-600 transition-colors">
                        {{ $service->title }}
                    </a>
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

                </div>
            </div>

        </div>

        @endforeach
    </div>




</x-site-layout>