@extends('layouts.app')

@section('title')
Single Todo: {{ $todos->name }}
@endsection

@section('content')
<h1 class="text-center my-5">
  {{ $todos->name }}
</h1>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card card-default">
      <div class="card-header">
        Details
      </div>

      <div class="card-body">
        {{ $todos->description }}
      </div>
    </div>
    <a href="/todos/{{ $todos->id }}/edit" class="btn btn-info my-2">Edit</a>
    <a href="/todos/{{ $todos->id }}/delete" class="btn btn-danger my-2">Delete</a>
  </div>
</div>
@endsection