<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(5);
        if (count($projects) == 0 ){
            $empty = 'Não há nenhum projeto.';

            return view('Project.index', compact('empty'));
        }

        return view('Project.index', compact('projects'));
        
    }
    public function create (){

        $clients = Client::all();
        return view('Project.create', compact('clients'));
    }

    public function store (ProjectRequest $request){
        $data = $request->validated();
        
        Project::create($data);
        return redirect()->route('project.create')->with('message', 'Projeto cadastrado com sucesso.');

    }

    public function edit($id){
        $project = Project::find($id);
        $client = Client::where('id', $project->client_id)->first();
        return view('Project.edit', compact('project', 'client'));
        
    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('project.index')->with('message', 'Cliente deletado com sucesso.');
    }
}
