<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;


class HomeController extends Controller
{
    public function __invoke()
    {   
        $types = Type::all();
        $projects = Project::orderByDesc('created_at')->paginate(5);
        return view('guest.home', compact('projects', 'types'));
    }
}
