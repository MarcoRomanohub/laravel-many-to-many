<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Functions\Helper;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('technologies', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $form_data['slug'] = Helper::generateSlug($form_data['title'], Project::class);

        $new = new Project();
        $new->fill($form_data);
        $new->save();


        if (array_key_exists('types', $form_data)) {
            $new->types()->attach($form_data['types']);
        }


        return redirect()->route('admin.projects.show', $new);
    }



    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'technologies', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if ($form_data['title'] !== $project->title) {
            $form_data['slug'] = Helper::generateSlug($form_data['title'], Project::class);
        } else {
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        if (array_key_exists('types', $form_data)) {
            $project->types()->sync($form_data['types']);
        } else {
            $project->types()->detach();
        }


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted', 'Il progetto ' . $project->title . 'è stato eliminato');
    }
}
