<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('author_id', Auth::id())->get();

        if (Auth::user()->is_admin) {
            $services = Service::all();
        }

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'content' => ['required', 'string', 'min:40'],
            'price' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'string'], 
        ]);

        // SSL FIX: Added withoutVerifying() for production stability
        $response = Http::withHeaders([
            'User-Agent' => 'HomeEase-App-Registration' 
        ])
        ->withoutVerifying() 
        ->get("https://nominatim.openstreetmap.org/search", [
            'q' => $request->address,
            'format' => 'json',
            'limit' => 1
        ]);

        $data = $response->json();

        //error message
        if (empty($data)) {
            return back()
                ->withErrors(['address' => 'We could not find coordinates for that address. Please try being more specific.'])
                ->withInput();
        }

        $lat = $data[0]['lat'] ?? null;
        $lng = $data[0]['lon'] ?? null;

        Service::create($validated + [
            'author_id' => Auth::id(),
            'lat' => $lat,
            'lng' => $lng,
            'address' => $request->address
        ]);

        return redirect('/admin/services');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);

        if (!$service->canBeManagedBy(Auth::user())) {
            abort(403);
        }

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);

        if (!$service->canBeManagedBy(Auth::user())) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'content' => ['required', 'string', 'min:40'],
            'price' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'string'],
        ]);

        if ($request->address !== $service->address) {
            // SSL FIX: Added withoutVerifying() for production stability
            $response = Http::withHeaders([
                'User-Agent' => 'HomeEase-App-Update' 
            ])
            ->withoutVerifying()
            ->get("https://nominatim.openstreetmap.org/search", [
                'q' => $request->address,
                'format' => 'json',
                'limit' => 1
            ])->json();

            if (!empty($response)) {
                $validated['lat'] = $response[0]['lat'];
                $validated['lng'] = $response[0]['lon'];
            }
        }

        $service->update($validated);

        return redirect('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);

        if (!$service->canBeManagedBy(Auth::user())) {
            abort(403);
        }
        
        $service->delete();

        return redirect('/admin/services');
    }
}