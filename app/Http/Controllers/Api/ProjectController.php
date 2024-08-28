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

        $projects = Project::with('category', 'technologies')->get();
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }
}
