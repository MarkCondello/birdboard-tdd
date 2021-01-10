<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    
    public function index()
    {
        $projects =  Project::all();
        return view('projects.index', compact('projects'));
    }
    
    public function create(){

        $attrs = request()->validate(['title' => 'required', 'description' => 'required']);
        Project::create($attrs);
        return redirect('/projects');
    } 
    
}
