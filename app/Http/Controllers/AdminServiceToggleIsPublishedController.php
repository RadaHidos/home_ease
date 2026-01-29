<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AdminServiceToggleIsPublishedController extends Controller
{
    //

    public function __invoke(string $id)
    {
        $service = Service::find($id);


        if (!$service->canBeManagedBy(Auth::user())) {
            abort(403);
        }

        $service->update([
            'is_published' => !$service->is_published,
        ]);
        return redirect()->back();
    }
}
