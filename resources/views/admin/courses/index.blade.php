@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Course </h4>
        <p class="card-description">
          Course
        </p>
        <a href="{{url('admin/courses/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Seq</th>
                <th scope="col">Name</th>
                <th scope="col">Project</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->seq }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->project->name }}</td>
                    <td>{{ $course->status }}</td>
                    <td>
                        <a href="{{ url('/admin/courses/'.$course->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/courses/'.$course->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/courses/'.$course->id) }}" method="POST">
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