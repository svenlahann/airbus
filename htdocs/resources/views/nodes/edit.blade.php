@extends('layouts.app')

@section('title', 'Nodes View')

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
                    <a href="/nodes/new" class="btn btn-primary btn-xs">New node</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{url('nodes/create')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_id" value="@if(!empty($node) && $node->id){{$node->id}}@endif">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name"
                               value="@if(!empty($node) && $node->name){{$node->name}}@endif"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="10">@if(!empty($node) && $node->description){{$node->description}}@endif</textarea>
                    </div>
                    <div class="pull-left">
                        <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-toolbar"><i class="glyphicon glyphicon-arrow-left"></i> Back to list</a>
                        <button class="btn btn-primary">Save node</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection