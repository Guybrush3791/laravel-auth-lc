@extends('layouts.main-layout')

@section('content')
    
    <div class="container">
        <h1>{{ $project -> name }}</h1>
        <img class="project-img" src="{{ $project -> main_image }}" alt="">
        <div>{{ $project -> description }}</div>
        <div>{{ $project -> release_date }} </div>
        <div>Link: <a href="{{ $project -> repo_link }}">GitHub</a></div>
        @auth
            <hr>
            <a href="{{ route('admin.project.edit', $project) }}">EDIT</a> 
            - 
            <a href="{{ route('admin.project.delete', $project) }}">DELETE</a>            
        @endauth
    </div>

@endsection