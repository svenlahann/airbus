<?php

namespace Airbus\Http\Controllers;

use Airbus\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ProjectsController
 * @package Airbus\Http\Controllers
 */
class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * index action
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $projects = Project::all();

        return \view('projects.index', ['projects' => $projects]);
    }

    /**
     * show action
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $project = Project::withTrashed()->find($id);
        $user = $project->user;
        return \view('projects.edit', ['project' => $project]);
    }

    public function delete($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->active = false;
        $project->save();
        $project->delete();

        return redirect()->action('ProjectsController@index')->with('status', 'Project deleted.');
    }

    /**
     * update action
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $project = Project::withTrashed()->find($id);

        if ($project->active) {
            $project->active = false;
        } else {
            $project->active = true;
        }

        $project->save();

        return redirect()->action('ProjectsController@index')->with('status', 'Project saved.');
    }

    /**
     * new action
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function new()
    {
        return \view('projects.edit');
    }


    /**
     * create action
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

        $id = (int)$request->_id;

        if (!empty($request->_id) && is_int($id)) {
            $project = Project::withTrashed()->find($id);
        } else {
            $project = new Project;
        }

        $project->name = $request->name;
        $project->description = $request->description;
        $project->active = true;
        $project->save();

        return redirect()->action('ProjectsController@index')->with('status', 'Project saved.');
    }
}
