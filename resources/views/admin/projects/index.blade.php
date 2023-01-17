@extends('layouts.admin')

@section('content')

<h1>Projects</h1>

@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}

</div>

@endif

<a name="" id="" class="btn  btn-primary position-fixed bottom-0 end-0 m-3" href="{{route('admin.projects.create')}}"
    role="button">
    <i class="fas fa-plus fa-lg fa-fw"> </i></a>

<div class="table-responsive">
    <table class="table table-striped
            table-hover
            table-borderless
            table-primary
            align-middle">
        <thead class="table-light">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>slug</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($projects as $project)
            <tr class="table-primary">
                <td scope="row">{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>

                <td>
                    <a class="btn btn-prymary btn-sm" href="{{route('admin.projects.show',$project->slug)}}"
                        role="button">
                        <i class="fas fa-eye fa-sm fa-fw"></i>
                    </a>

                    <a class="btn btn-secondary btn-sm" href="{{route('admin.projects.edit',$project->slug)}}"
                        role="button">
                        <i class="fas fa-pencil fa-sm fa-fw"></i>
                    </a>


                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#project-{{$project->id}}">

                        <i class="fas fa-trash fa-sm fa-fw"></i>
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="project-{{$project->id}}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="project-{{$project->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="project-{{$project->id}}">Delete
                                        {{$project->project_title}}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete the entire project?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.projects.destroy',$project->slug)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Confimr </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </td>
            </tr>
            @empty
            <tr class="table-primary">
                <td scope="row">Sorry no records to show</td>
            </tr>
            @endforelse

        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>

@endsection