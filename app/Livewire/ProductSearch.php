<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;

#[Layout('components.site-layout', ['title' => 'External Product Search'])]
class ProductSearch extends Component
{
    public $search = '';
    public $products = [];
    public $error = null;

    public function updatedSearch()
    {
        $this->fetchProducts();
    }

    public function mount()
    {
        $this->fetchProducts();
    }

    public function fetchProducts()
    {
        $this->error = null;

        try {
            // Fetch all products (limit=200 to get everything from dummyjson)
            // Then filter locally for "cleaning" and "gardening" related items
            $response = Http::timeout(5)->get('https://dummyjson.com/products', [
                'limit' => 200
            ]);

            if ($response->successful()) {
                $allProducts = collect($response->json('products'));

                // Define allowed categories as requested
                $allowedCategories = [
                    'home-decoration',
                    'kitchen-accessories'
                ];

                $this->products = $allProducts->filter(function ($product) use ($allowedCategories) {
                    return in_array($product['category'], $allowedCategories);
                })->filter(function ($product) {
                    // Apply user search on top of the category filter
                    if (empty($this->search)) return true;
                    $searchText = strtolower($product['title'] . ' ' . $product['description']);
                    return \Illuminate\Support\Str::contains($searchText, strtolower($this->search));
                })->values()->all();
            } else {
                $this->error = 'Failed to load data from external API.';
            }
        } catch (\Exception $e) {
            $this->error = 'Unable to connect to product service. Please check your internet connection.';
        }
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
