<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    // Display all hotel services.
    public function index(): View
    {
        $services = Service::latest()->get();

        return view('admin.services.index', compact('services'));
    }

    // Show the form for adding a service.
    public function create(): View
    {
        return view('admin.services.create');
    }

    // Save a new service.
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ]);

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service added successfully!');
    }

    // Display one service.
    public function show(Service $service): View
    {
        return view('admin.services.show', compact('service'));
    }

    // Show the form for editing a service.
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    // Update a service.
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ]);

        $service->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully!');
    }

    // Delete a service if it is not used by any reservation.
    public function destroy(Service $service): RedirectResponse
    {
        if ($service->reservations()->exists()) {
            return redirect()->route('services.index')
                ->with('error', 'This service cannot be deleted because it is linked to reservations.');
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully!');
    }
}
