<?php

namespace Airbus\Http\Controllers;

use Airbus\Job;
use Airbus\Node;
use Airbus\Project;
use Illuminate\Http\Request;

class JobsController extends Controller
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
        $jobs = Job::all();
        return \view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * show action
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $job = Job::withTrashed()->find($id);

        $projects = Project::all();
        $nodes = Node::all();

        return \view('jobs.edit', [
            'job' => $job,
            'projects' => $projects,
            'nodes' => $nodes
        ]);
    }

    public function delete($id)
    {
        $job = Job::withTrashed()->find($id);
        $job->active = false;
        $job->save();
        $job->delete();

        return redirect()->action('JobsController@index')->with('status', 'Job deleted.');
    }

    /**
     * update action
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $job = Job::withTrashed()->find($id);

        if ($job->active) {
            $job->active = false;
        } else {
            $job->active = true;
        }

        $job->save();

        return redirect()->action('JobsController@index')->with('status', 'Job saved.');
    }

    /**
     * new action
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function new()
    {
        $projects = Project::all();
        $nodes = Node::all();

        return \view('jobs.edit', [
            'projects' => $projects,
            'nodes' => $nodes
        ]);
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
            $job = Job::withTrashed()->find($id);
        } else {
            $job = new Job;
        }

        $job->name = $request->name;
        $job->description = $request->description;
        $job->active = true;
        $job->project_id = $request->project;
        $job->node_id = $request->node;
        $job->save();

        return redirect()->action('JobsController@index')->with('status', 'Job saved.');
    }
}
