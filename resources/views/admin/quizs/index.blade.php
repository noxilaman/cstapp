@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Quiz </h4>
        <p class="card-description">
          Quiz
        </p>
        <a href="{{url('admin/quizs/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Seq</th>
                <th scope="col">Name</th>
                <th scope="col">Section</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($quizs as $quiz)
                <tr>
                    <th scope="row">{{ $quiz->id }}</th>
                    <td>{{ $quiz->seq }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->section->name ?? ''}}</td>
                    <td>{{ $quiz->status }}</td>
                    <td>
                        <a href="{{ url('/admin/quizs/'.$quiz->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/quizs/'.$quiz->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/quizs/'.$quiz->id) }}" method="POST">
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