<x-site-layout title="{{$service->title}}">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold text-slate-900">
            {{ $service->title }}
        </h1>

        <span class="text-2xl font-bold text-blue-600">
            €{{ number_format($service->price, 2) }}
        </span>
    </div>

    <div class="mt-8 mb-6 border-l-4 border-blue-500 pl-4">
        <p class="text-sm text-slate-500">Service provided by</p>
        <p class="text-lg font-semibold text-blue-600">
            {{ $service->author->name }}
        </p>
    </div>

    <div class="mb-8">
        <p class="text-sm text-slate-500 mb-2 italic">Location: {{ $service->address ?? 'Not specified' }}</p>
        <div id="service-map" 
             style="height: 350px;" 
             class="rounded-xl shadow-md border border-slate-200"
             data-lat="{{ $service->lat }}"
             data-lng="{{ $service->lng }}"
             data-title="{{ $service->title }}"
             data-address="{{ $service->address }}">
        </div>
    </div>

    <div class="flex gap-2 mt-4 mb-4">
        @foreach ($service->categories as $category)
        <a href="/categories/{{ $category->id }}"
            class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700 transition hover:bg-blue-200 hover:-translate-y-[1px]">
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    <p class="text-base leading-relaxed text-slate-700 mb-10">
        {{ $service->content }}
    </p>

    <x-service-comments :service="$service"></x-service-comments>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mapElement = document.getElementById('service-map');
            
            // Read the data from attributes instead of putting PHP inside JS
            const lat = mapElement.getAttribute('data-lat');
            const lng = mapElement.getAttribute('data-lng');
            const title = mapElement.getAttribute('data-title');
            const address = mapElement.getAttribute('data-address');

            if (lat && lng && lat !== "" && lng !== "") {
                const map = L.map('service-map').setView([lat, lng], 14);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                L.marker([lat, lng]).addTo(map)
                    .bindPopup(`<strong>${title}</strong><br>${address}`)
                    .openPopup();
            } else {
                mapElement.style.display = 'flex';
                mapElement.style.alignItems = 'center';
                mapElement.style.justifyContent = 'center';
                mapElement.classList.add('bg-slate-50', 'text-slate-400');
                mapElement.innerHTML = '<p>No map location available for this service.</p>';
            }
        });
    </script>

</x-site-layout>