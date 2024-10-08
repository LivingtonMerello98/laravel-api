<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//aprire ticket per le request

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $counter = 1;
        $categories = Category::all();
        $projects = Project::latest()->paginate(4);

        // Prepara i dati JSON
        $projectsJson = $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'category_id' => $project->category_id,
                'url' => $project->url,
                'cover' => $project->cover, // Usa l'accessor per l'URL completo
                'title' => $project->title,
                'slug' => $project->slug,
                'description' => $project->description,
                'created_at' => $project->created_at,
                'updated_at' => $project->updated_at,
            ];
        });

        // Passa i dati JSON alla vista
        return view('admin.projects.index', compact('projects', 'counter', 'categories', 'projectsJson'));
    }



    public function create()
    {
        //filtriamo le categories nella pagina create.blade per l'input select
        $categories = Category::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    public function store(Request $request)
    {
        //dd($request->technology_id);
        // Validazione dei dati
        $validated = $request->validate([
            'url' => 'nullable',
            'cover' => 'nullable|image|max:4048', // da rivedere 
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($request->title);

        //$img_path = Storage::put('uploads', $validated['cover']);

        if ($request->hasFile('cover')) {
            $img_path = Storage::put('uploads', $request->file('cover'));
            $validated['cover'] = $img_path;
        }

        //$validated['cover'] = $img_path;

        $project_name = $request->title;

        $project = Project::create($validated);

        // Associa le tecnologie al progetto
        if ($request->has('technology_id')) {
            $project->technologies()->attach($request->technology_id);
        }

        return redirect()->route('admin.projects.index')->with('success', $project_name . '-Project created');
    }




    //dettaglio 
    public function show($id)
    {
        $projects = Project::all();
        //recupera l'id del progetto con la
        $project = Project::with('category')->find($id);


        if (!$project) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto non trovato.');
        }

        return view('admin.projects.show', compact('project', 'projects'));
    }


    //modifiche
    public function edit($id)
    {
        $technologies = Technology::all();
        $project = Project::findOrFail($id);
        $categories = Category::all();

        return view('admin.projects.edit', compact('project', 'categories', 'technologies'));
    }



    //aggiornamento
    public function update(Request $request, $id)
    {


        $validated = $request->validate([
            'url' => 'required',
            'cover' => 'nullable',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $project = Project::findOrFail($id);


        // Controllo se c'è una cover e la aggiorno
        if ($request->hasFile('cover')) {
            // Cancella il vecchio file di copertura se esiste
            if ($project->cover && Storage::exists($project->cover)) {
                Storage::delete($project->cover);
            }

            $img_path = Storage::put('uploads', $validated['cover']);
            $validated['cover'] = $img_path;
        }

        $project_title = $project->title;
        $project->update($validated);

        // Sincronizzare le tecnologie
        if ($request->has('technology_id')) {
            $project->technologies()->sync($request->technology_id);
        }

        return redirect()->route('admin.projects.index')->with('success', $project_title . '-Project updated'); //da rivedere
    }


    public function destroy(Project $project)
    {


        if ($project->cover) {
            Storage::delete($project->cover);
        }

        //dd($project->cover);
        $project_title = $project->title;
        $project->delete();

        return redirect()->route('admin.projects.index')->with('succes', $project_title . '-Project deletedd');
    }
}
