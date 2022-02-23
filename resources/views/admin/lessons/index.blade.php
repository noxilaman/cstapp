@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Lesson </h4>
        <p class="card-description">
          Lesson
        </p>
        <a href="{{url('admin/lessons/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Seq</th>
                <th scope="col">Name</th>
                <th scope="col">course</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lessons as $lesson)
                <tr>
                    <th scope="row">{{ $lesson->id }}</th>
                    <td>{{ $lesson->seq }}</td>
                    <td>{{ $lesson->name }}</td>
                    <td>{{ $lesson->course->name }}</td>
                    <td>{{ $lesson->status }}</td>
                    <td>
                        <a href="{{ url('/admin/lessons/'.$lesson->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/lessons/'.$lesson->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/lessons/'.$lesson->id) }}" method="POST">
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