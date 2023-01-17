@extends('layouts.admin')


@section('content')
    <h1>Create a new Project</h1>

    @include('partials.errors')


    <form action="{{ route('admin.projects.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="project_title" class="form-label">Project project title</label>
            <input type="text" name="project_title" id="project_title"
                class="form-control @error('project_title') is-invalid @enderror" placeholder="learning laravel"
                aria-describedby="project_titleHelper" value="{{ old('project_title') }}">
            <small id=" project_titleHelper" class="text-muted">Add a project title for the current post, max 100
                characters,
                must be
                unique</small>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror  " name="type_id"
                id="type_id">

                <option selected>Seelect a type</option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach


            </select>

        </div>


        <div class="mb-3">
            <label for="technologies" class="form-label"></label>
            <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                <option value="" disabled>Select a technology</option>

                @forelse ($technologies as $technology)
                    @if ($errors->any())
                        <option value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                            {{ $technology->name }}
                        </option>
                    @else
                        <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                    @endif
                @empty
                    <option value="" disabled>Sorry no technology avaible yet</option>
                @endforelse

            </select>

        </div>



        <div class="mb-3">
            <label for="body" class="form-label">Project description and goals</label>
            <textarea class="form-control" name="body" id="body" rows="10" value="{{ old('body') }}"></textarea>
        </div>

        <button type="submit" class="btn btn-prymary">Create</button>
    </form>
@endsection
