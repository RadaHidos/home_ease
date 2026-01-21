<x-app-layout title='Create a new service'>

    <form action="/admin/services" method="POST">
        @csrf



        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
            <x-formtext name="title" label="Add service name" placeholder="What service do you provide?" />

            <x-form-text-area name="content" label="Add service description" placeholder="Describe your service and give important details" rows="10" />
            
            <x-formtext name="address" label="Service Location" placeholder="e.g. 123 Main St, New York" />
            
            <x-formtext name="price" label="Price (€)" placeholder="Enter price"></x-formtext>



            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                Save Changes
            </button>

        </div>


    </form>



</x-app-layout>