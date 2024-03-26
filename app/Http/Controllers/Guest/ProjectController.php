<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ProjectController extends Controller
{
    
    public function show(string $slug) 
    {
        $project = Project::whereSlug($slug)->first();
        if(!$project) abort(404);
        return view('guest.projects.show', compact('project'));
    }

    
}
