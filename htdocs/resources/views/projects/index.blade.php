@extends('layouts.app')

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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Active</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td><a href="/projects/{{$project->id}}">{{$project->name}}</a></td>
                            <td>{{str_limit($project->description, 20)}}</td>
                            <td>@if($project->user){{$project->user->name}}@endif</td>
                            <td>
                                @if($project->active)
                                    <a href="/projects/{{$project->id}}/update"><i
                                                class="glyphicon glyphicon-ok"></i></a>
                                @else
                                    <a href="/projects/{{$project->id}}/update"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                @endif
                            </td>
                            <td><a href="/projects/{{$project->id}}/delete"><i
                                            class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection
