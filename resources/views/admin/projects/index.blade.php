@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Project</h4>
        <p class="card-description">
          Project 
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Start / End</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->start_date }} / {{ $project->end_date }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ url('/admin/projects/'.$project->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/projects/'.$project->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/projects/'.$project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="delete" class="btn btn-danger">Delete
                        </button>
                      </form>
                      </td>
                  </tr>
                @endforeach 
              </tbody>
            </table>
          </div>
        </div>
    


@endsection