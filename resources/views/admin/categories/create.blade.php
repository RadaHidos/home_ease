<x-app-layout title='Create a new category'>

    <form action="/admin/categories" method="post">
        @csrf



        <x-form-text name="name" label="Add a category name" placeholder="Add a category name" />


        <button
            type="submit"
            class="w-full mt-4 bg-blue-500 text-white py-2.5 rounded-lg text-sm font-medium 
               hover:bg-blue-600 transition cursor-pointer">
            Create
        </button>
    </form>



</x-app-layout>