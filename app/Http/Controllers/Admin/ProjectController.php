<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'desc')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();

        $project = new Project();

        if ($request->hasFile('img')) {
            $path = Storage::disk('public')->put('img', $form_data['img']);
            $form_data['img'] = $path;
        }

        
        $project->fill($form_data);
        $project['slug'] = Str::slug($form_data['name']);
        $project->save();

        return redirect()->route('admin.projects.show', ['project' => $project['slug']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Request $request)
    {
        $error_message = '';
        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
        }
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'error_message', 'types') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        $exists = Project::where('name', 'LIKE', $form_data['name'])->where('id', '!=', $project['id'])->get();
        if (count($exists) > 0) {
            $error_message = 'Hai inserito un titolo già presente in un altro progetto';
            return redirect()->route('admin.projects.edit', compact('project', 'error_message'));
        }

        if ($request->hasFile('img')) {
            if ($project->img != null) {
                Storage::disk('public')->delete($project->img);
            }

            $path = Storage::disk('public')->put('img', $form_data['img']);
            $form_data['img'] = $path;
        }

        $project['slug'] = Str::slug($form_data['name']);
        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->img != null) {
            Storage::disk('public')->delete($project->img);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
