<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ServiceSearch extends Component
{
    public $search = ''; // This variable matches the input box

    public function render()
    {
        // If search is empty, get all services. 
        // If not, search by title or content.
        $services = Service::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%')
            ->with(['categories', 'author']) // Eager load for performance
            ->latest()
            ->get();

        return view('livewire.service-search', [
            'services' => $services
        ]);
    }
}
