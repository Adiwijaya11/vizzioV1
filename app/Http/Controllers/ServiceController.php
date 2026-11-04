<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display public services catalog.
     */
    public function index()
    {
        try {
            $services = Service::where('status', 'active')->orderBy('id')->get();
        } catch (\Throwable $e) {
            $services = collect();
        }

        return view('services', compact('services'));
    }

    /**
     * Display detailed show page for a specific service.
     */
    public function show($slug)
    {
        try {
            $service = Service::where('status', 'active')
                ->where('slug', $slug)
                ->firstOrFail();

            $relatedServices = Service::where('status', 'active')
                ->where('id', '!=', $service->id)
                ->orderBy('id')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            // If database lookup fails or table does not exist
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                abort(404);
            }
            abort(404);
        }

        return view('services.show', compact('service', 'relatedServices'));
    }
}
