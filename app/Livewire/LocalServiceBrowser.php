<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocalServiceBrowser extends Component
{
    public $services = [];
    public $error = null;

    public function mount()
    {
        $this->fetchServices();
    }

    public function fetchServices()
    {
        $this->error = null;

        try {
            // We use the full URL to hit our own API
            // In a real production environment, calling your own API via HTTP is often discouraged 
            // due to latency/overhead (better to use a Service class), but this demonstrates API consumption.

            // We use 127.0.0.1:8000 or the APP_URL to ensure we can hit it.
            // Since we are in Herd, we can try the route() helper which generates the full URL.
            $url = route('api.services.index');

            // Use a short timeout to prevent hanging if the server is busy
            $response = Http::timeout(5)->get($url);

            if ($response->successful()) {
                $data = $response->json();
                // The API returns { success: true, data: { current_page: 1, data: [...] } } because of paginate()
                $this->services = $data['data']['data'] ?? [];
            } else {
                $this->error = 'Failed to load services from API. Status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Unable to connect to internal API. Error: ' . $e->getMessage();
            Log::error('Local API Fetch Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.local-service-browser')->layout('components.site-layout', ['title' => 'Services provided']);
    }
}
