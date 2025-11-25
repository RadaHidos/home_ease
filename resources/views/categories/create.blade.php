<x-site-layout title='Create a new category'>

    <form action="/categories" method="post">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="text-sm text-slate-600">Category name</label>
            <input
                type="text"
                placeholder="Add a new category"
                name="name"
                class="rounded-lg border border-slate-200 px-3 py-2 text-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                required>
            </input>
        </div>

        <button
            type="submit"
            class="w-full mt-4 bg-blue-500 text-white py-2.5 rounded-lg text-sm font-medium 
               hover:bg-blue-600 transition cursor-pointer">
            Create
        </button>
    </form>



</x-site-layout>