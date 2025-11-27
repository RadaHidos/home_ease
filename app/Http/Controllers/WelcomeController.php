<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $services   = Service::take(3)->get();
        $categories = Category::all();

        return view('welcome', compact('services', 'categories'));
        return view('welcome');
    }
    //
}
