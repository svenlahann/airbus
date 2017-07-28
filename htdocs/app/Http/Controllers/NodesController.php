<?php

namespace Airbus\Http\Controllers;

use Airbus\Node;
use Illuminate\Http\Request;

class NodesController extends Controller
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
        $nodes = Node::all();

        return \view('nodes.index', ['nodes' => $nodes]);
    }

    /**
     * show action
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $node = Node::withTrashed()->find($id);

        return \view('nodes.edit', ['node' => $node]);
    }

    public function delete($id)
    {
        $node = Node::withTrashed()->find($id);
        $node->active = false;
        $node->save();
        $node->delete();

        return redirect()->action('NodesController@index')->with('status', 'Node deleted.');
    }

    /**
     * update action
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $node = Node::withTrashed()->find($id);

        if ($node->active) {
            $node->active = false;
        } else {
            $node->active = true;
        }

        $node->save();

        return redirect()->action('NodesController@index')->with('status', 'Node saved.');
    }

    /**
     * new action
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function new()
    {
        return \view('nodes.edit');
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
            $node = Node::withTrashed()->find($id);
        } else {
            $node = new Node;
        }

        $node->name = $request->name;
        $node->description = $request->description;
        $node->active = true;
        $node->save();

        return redirect()->action('NodesController@index')->with('status', 'Node saved.');
    }
}
