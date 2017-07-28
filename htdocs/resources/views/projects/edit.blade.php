@extends('layouts.app')

@section('title', 'Projects View')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Projects View <small>Subtext for header</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="/projects/new" class="btn btn-primary btn-xs">New Project</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('projects/create')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_id" value="@if(!empty($project) && $project->id){{$project->id}}@endif">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name"
                               value="@if(!empty($project) && $project->name){{$project->name}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="10">@if(!empty($project) && $project->description){{$project->description}}@endif</textarea>
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