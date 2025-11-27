<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceToggleIsPublishedController extends Controller
{
    //

    public function __invoke(string $id)
    {
        $service = Service::find($id);

        $service->update([
            'is_published' => !$service->is_published,
        ]);
        return redirect()->back();
    }
}
