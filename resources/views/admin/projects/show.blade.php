@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Project # {{ $project->id }}</h4>
        <p class="card-description">
          Project
        </p>
        <div class="table-responsive">
          <table class="table">
            
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $project->id }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Name</th>
                    <td>{{ $project->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Desc</th>
                    <td>{{ $project->desc }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td>{{ $project->status }}</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
    


@endsection