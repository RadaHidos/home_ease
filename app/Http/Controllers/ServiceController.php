<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Comment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    function index()
    {
        $services = \App\Models\Service::all();

        return view('services.index', compact('services'));
    }

    function show(int $id)
    {
        $service = Service::find($id);

        if (!$service) {
            abort(404);
        }

        if (!$service->is_published && (!auth()->check() || !$service->canBeManagedBy(auth()->user()))) {
            abort(404);
        }

        //$comments = Comment::where('service_id', $service->id)->get();

        return view('services.show', compact('service'));
    }
}
