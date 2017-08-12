@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Nodes View <small>Subtext for header</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="/nodes/new" class="btn btn-primary btn-xs">New Node</a>
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
                        <th>Active</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nodes as $node)
                        <tr>
                            <td>{{$node->id}}</td>
                            <td><a href="/nodes/{{$node->id}}">{{$node->name}}</a></td>
                            <td>{{str_limit($node->description, 20)}}</td>
                            <td>
                                @if($node->active)
                                    <a href="/nodes/{{$node->id}}/update"><i
                                                class="glyphicon glyphicon-ok"></i></a>
                                @else
                                    <a href="/nodes/{{$node->id}}/update"><i
                                                class="glyphicon glyphicon-remove"></i></a>
                                @endif
                            </td>
                            <td><a href="/nodes/{{$node->id}}/delete"><i
                                            class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
@endsection
