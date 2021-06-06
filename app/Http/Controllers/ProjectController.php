<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStore;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProjectResource
     */
    public function index()
    {
        return new ProjectResource(Project::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ProjectStore $request)
    {
        return Project::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return Project|Application|ResponseFactory|Response
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'string',
            'content' => 'string',
            'visible' => 'boolean',
            'is_event' => 'boolean',
            'start_time' => 'date',
            'end_time' => 'date',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $project->update($request->all());

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
