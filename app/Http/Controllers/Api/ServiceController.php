<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $services = Service::where('is_published', true)
                ->with(['categories', 'author'])
                ->latest()
                ->paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Services retrieved successfully',
                'data' => $services
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve services',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $service = Service::with(['categories', 'author'])->findOrFail($id);

            if (!$service->is_published) {
                // Return 404 for unpublished services via API to match frontend behavior
                // Unless we want to support a preview mode, but standard public API should usually hide them
                return response()->json([
                    'success' => false,
                    'message' => 'Service not found or not published',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Service retrieved successfully',
                'data' => $service
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
                'error' => 'Resource with ID ' . $id . ' could not be found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the service',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
