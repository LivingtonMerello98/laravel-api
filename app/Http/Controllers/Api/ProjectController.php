<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //passiamo a $project il modello Project con category e technologies relazioni stabilite nel modello Project
        //$projects = Project::with('category', 'technologies')->get();

        //impaginazione tirando fuori 3 progetti per volta
        $projects = Project::with('category', 'technologies')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show(string $slug)

    {
        $projects = Project::where('slug', $slug)->with('category', 'technologies')->first();

        //check se il post viene trovato

        if ($projects) {

            return response()->json([
                'success' => true,
                'results' => $projects,
            ]);
        } else {

            return response()->json([
                'success' => false,
                'results' => null,
            ], 404);
        }
    }
}
