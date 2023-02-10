@extends('layouts.main-layout')

@section('content')
    
    <h1>Projects</h1>
    @auth
        <a href="{{ route('admin.project.store') }}">
            CREATE NEW PROJECT
        </a>
    @endauth
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('project.show', $project) }}">
                    <h2>
                        {{ $project -> name }}
                    </h2>
                    <img class="project-img" src="{{ $project -> main_image }}" alt="">
                </a>
                <div>{{ $project -> release_date }} </div>
            
            </li>
        @endforeach
    </ul>

@endsection