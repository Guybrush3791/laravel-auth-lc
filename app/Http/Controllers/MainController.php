<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{

    public function home() {

        $projects = Project::all();

        return view('pages.home', compact('projects'));
    }

    public function show(Project $project) {

        return view('pages.project.show', compact('project'));        
    }

    public function create() {

        return view('pages.project.create');
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|min:3|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|string|unique:projects,main_image',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link',
        ]);

        $project = Project::create($data);
        
        return redirect() -> route('project.show', $project);
    }

    public function edit(Project $project) {

        return view('pages.project.edit', compact('project'));
    }
    public function update(Request $request, Project $project) {

        $data = $request -> validate([
            'name' => 'required|string|min:3|max:64|unique:projects,name,' . $project -> id,
            'description' => 'nullable|string',
            'main_image' => 'required|string|unique:projects,main_image,' . $project -> id,
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link,' . $project -> id,
        ]);

        $project -> update($data);
        $project -> save();

        return redirect() -> route('project.show', $project);
    }
 
    public function delete(Project $project) {

        $project -> delete();

        return redirect() -> route('home');
    }
}
