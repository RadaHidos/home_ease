<x-app-layout title='Edit {{$service->title}}'>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            You are now editing: {{$service->title}}
        </h2>
    </x-slot>

    <form action="/admin/services/{{$service->id}}" method="POST">
        @csrf
        @method('PUT')


        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-4">
            <x-formtext name="title" label="Change service name" placeholder="What service do you provide?" value='{{$service->title}}' />

            <x-form-textarea name="content" label="Change service description" placeholder="Describe your service and give important details" rows="10" value='{{$service->content}}' />

<div class="space-y-1">
    <label for="address" class="block text-sm font-medium text-slate-700">
        Service Location
    </label>
    <input 
        type="text" 
        name="address" 
        id="address" 
        value="{{ old('address', $service->address) }}" 
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
        required
    >
    @error('address')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
            <x-formtext name="price" label="Price (€)" value="{{ $service->price }}"></x-formtext>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                Save Changes
            </button>

        </div>


    </form>



</x-app-layout>