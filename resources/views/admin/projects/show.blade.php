@extends('layouts.admin')


@section('content')


<h1>{{$project->project_title}}</h1>
<h5>{{$project->slug}}</h5>
<div class="types">
    <strong>Types:</strong>
    {{$project->type ? $project->type->name : 'Uncategorized'}}
</div>
<div class="content">

    {{$project->body}}

</div>


@endsection