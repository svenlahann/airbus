@extends('layouts.app')

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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Project</th>
                        <th>Node</th>
                        <th>User</th>
                        <th>Active</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td><a href="/jobs/{{$job->id}}">{{$job->name}}</a></td>
                            <td>{{str_limit($job->description, 20)}}</td>
                            <td>@if($job->project)<a href="/projects/{{$job->id}}">{{$job->project->name}}</a>@endif</td>
                            <td>@if($job->node)<a href="/nodes/{{$job->node->id}}">{{$job->node->name}}</a>@endif</td>
                            <td>@if($job->user){{$job->user->name}}@endif</td>
                            <td>
                                @if($job->active)
                                    <a href="/jobs/{{$job->id}}/update"><i
                                                class="glyphicon glyphicon-ok"></i></a>
                                @else
                                    <a href="/jobs/{{$job->id}}/update"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                @endif
                            </td>
                            <td><a href="/jobs/{{$job->id}}/delete"><i
                                            class="glyphicon glyphicon-trash"></i></a></td>
                            <td><a href="#" class="btn btn-success btn-xs btn-execute">Go</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection
