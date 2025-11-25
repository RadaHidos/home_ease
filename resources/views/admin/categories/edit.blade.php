<x-site-layout title='Edit {{$category->name}}'>

    <form action="/admin/categories/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-1">
            <label class="text-sm text-slate-600">Change category name</label>
            <input
                type="text"
                placeholder="Add a new category"
                name="name"
                value="{{old('name', $category->name)}}"
                class="rounded-lg border border-slate-200 px-3 py-2 text-sm 
                   focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                required>
            </input>
        </div>

        @error('name')
        <div class='text-red-500'>{{$message}}</div>
        @enderror

        <button
            type="submit"
            class="w-full mt-4 bg-blue-500 text-white py-2.5 rounded-lg text-sm font-medium 
               hover:bg-blue-600 transition cursor-pointer">
            Update
        </button>
    </form>



</x-site-layout>