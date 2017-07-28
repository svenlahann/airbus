@extends('layouts.app')

@section('title', 'Projects View')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Jobs View <small>Subtext for header</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="/jobs/new" class="btn btn-primary btn-xs">New Job</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('jobs/create')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_id" value="@if(!empty($job) && $job->id){{$job->id}}@endif">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name"
                               value="@if(!empty($job) && $job->name){{$job->name}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="10">@if(!empty($job) && $job->description){{$job->description}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <select name="project" id="project">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" @if(!empty($job->node))@if($job->project->id === $project->id)selected="selected"@endif @endif>{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="node">Node</label>
                        <select name="node" id="node">
                            @foreach($nodes as $node)
                                <option value="{{$node->id}}" @if(!empty($job->node))@if($job->node->id === $node->id)selected="selected"@endif @endif>{{$node->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pull-left">
                        <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-toolbar"><i class="glyphicon glyphicon-arrow-left"></i> Back to list</a>
                        <button class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection