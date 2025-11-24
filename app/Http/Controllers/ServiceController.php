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
        $comments = Comment::where('service_id', $service->id)->get();

        return view('services.show', compact('service', 'comments'));
    }
}
