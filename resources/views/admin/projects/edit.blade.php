@extends('layouts.admin')


@section('content')

<h1>Edit a Project</h1>

@include('partials.errors')


<form action="{{route('admin.projects.update',$project->slug)}}" method="post">

    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="project_title" class="form-label">Project project title</label>
        <input type="text" name="project_title" id="project_title"
            class="form-control @error('project_title') is-invalid @enderror" placeholder="learning laravel"
            aria-describedby="project_titleHelper" value="{{old('project_title',$project->project_title)}}">
        <small id="project_titleHelper" class="text-muted">Add a project title for the current post, max 100 characters,
            must be
            unique</small>
    </div>


    <div class="mb-3">
        <label for="type_id" class="form-label">Types</label>
        <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror  " name="type_id"
            id="type_id">

            <option value="">Deselect a type</option>

            @forelse ($types as $type)
            <option value="{{$type->id}}"
                {{ $type->id == old('type_id' ,$project->type ? $project->type->id : '') ? 'selected' : '' }}>
                {{$type->name}}
            </option>
            @empty
            <option value="">Sorry, no types in the system</option>
            @endforelse


        </select>

    </div>


    <div class="mb-3">
        <label for="body" class="form-label">Project description and goals</label>
        <textarea class="form-control" name="body" id="body" rows="10">{{old('body',$project->body)}}</textarea>
    </div>

    <button type="submit" class="btn btn-prymary">Update</button>
</form>


@endsection