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
    public function index()
    {
        $counter = 1;
        //da all() a latest per poter usare il paginator
        //consultare Providers/AppServiceProvider
        $projects = Project::latest()->paginate(5);


        return view('admin.projects.index', compact('projects', 'counter'));
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

        $img_path = Storage::put('uploads', $validated['cover']);

        $validated['cover'] = $img_path;

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
        //recupera l'id del progetto con la
        $project = Project::with('category')->find($id);

        if (!$project) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto non trovato.');
        }

        return view('admin.projects.show', compact('project'));
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
