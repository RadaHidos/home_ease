<x-app-layout title='Create a new service'>

    <form action="/admin/services" method="POST">
        @csrf



        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
            <x-form-text name="title" label="Add service name" placeholder="What service do you provide?" />

            <x-form-textarea name="content" label="Add service description" placeholder="Describe your service and give important details" rows="10" />


           
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                Save Changes
            </button>

        </div>


    </form>



</x-app-layout>