<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.services.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'content' => ['required', 'string', 'min:40'],

        ]);

        Service::create($validated + ['author_id' => Auth::id()]);

        return redirect('/admin/services');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $service = Service::find($id);

        return view('admin.services.show', compact('service'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $service = Service::find($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'content' => ['required', 'string', 'min:40']
        ]);

        $service->update($validated);
        return redirect('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        //
    }
}
