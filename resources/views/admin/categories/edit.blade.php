<x-site-layout title='Edit {{$category->name}}'>

    <form action="/admin/categories/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')

        <x-form-text name="name" label="Change category name" placeholder="Add a category name" value='{{$category->name}}' />

        

        <button
            type="submit"
            class="w-full mt-4 bg-blue-500 text-white py-2.5 rounded-lg text-sm font-medium 
               hover:bg-blue-600 transition cursor-pointer">
            Update
        </button>
    </form>



</x-site-layout>