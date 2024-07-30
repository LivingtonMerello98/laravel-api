<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counter = 1;
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies', 'counter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | max:30'
        ]);

        $technology_name = $request->name;

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')->with('success', $technology_name . '-created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $technology = Technology::with('projects')->find($id);

        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $technology = Technology::findOrFail($id);
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required | max:30'
        ]);

        $technology = Technology::findOrFail($id);
        $technology_name = $request->name;
        $technology->update($validated);

        return redirect()->route('admin.technologies.index')->with('success',  $technology_name . '-technology updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {

        $technology_name = $technology->name;
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', $technology_name . '-Technology deleted');
    }
}
