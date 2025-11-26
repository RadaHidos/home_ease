<x-app-layout title='Edit {{$service->title}}'>

    <form action="/admin/services/{{$service->id}}" method="POST">
        @csrf
        @method('PUT')


        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
            <x-form-text name="title" label="Change service name" placeholder="What service do you provide?" value='{{$service->title}}' />

            <x-form-textarea name="content" label="Change service description" placeholder="Describe your service and give important details" rows="10" value='{{$service->content}}' />

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                Save Changes
            </button>

        </div>


    </form>



</x-app-layout>