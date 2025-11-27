<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:10'],
            'service_id' => ['required', 'integer', 'exists:services,id']
        ]);
        Comment::create($validated);

        return redirect()->back();
    }
    //
}
