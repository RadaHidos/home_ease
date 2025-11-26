<x-app-layout title="Categories">

    <div class="mb-10">
        <p class="text-sm text-slate-500">
            Browse all categories and discover services that fit your needs.
        </p>
    </div>

    <a href="/admin/categories/create"
        class="inline-flex items-center mb-4 px-3 py-2 rounded-lg text-xs font-medium
                      bg-blue-500 text-white hover:bg-blue-600 transition">
        + New category
    </a>


    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($categories as $category)

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5
                    transition-all duration-200 hover:shadow-md hover:-translate-y-[1px]">

            <div class="flex items-center justify-between mb-2">

                <div>
                    <a href="/admin/categories/{{ $category->id }}"
                        class="text-lg font-semibold text-slate-900 hover:text-blue-600 transition-colors">
                        {{ $category->name }}
                    </a>
                </div>


                <div class="flex items-center gap-3">

                    <a href="/admin/categories/{{ $category->id }}/edit"
                        class="text-xs text-slate-400 hover:text-blue-500 transition-colors">
                        Edit
                    </a>


                    <form action="/admin/categories/{{ $category->id }}" method="POST">
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




</x-app-layout>