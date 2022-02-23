 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>Student Page</h3>
              </div>
              <div class='row'>
                <div class='col-md-6'><div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Project: {{ $project->name }}</p>
                      <p class="fs-30 mb-2">Course: {{ $course->name }}</p>
                      <p>@if (empty($joincourse))
                          <a href="{{ url('join/course/'.$projectcompstudent->id.'/'.$course->id) }}">Join </a>
                      @else
                          <a href="{{ url('learns/course/'.$joincourse->id) }}">Joined on  {{ $joincourse->join_date }}</a>
                      @endif</p>
                    </div>
                  </div></div>
                

              </div>
            </div>
          </div>
        </div>
@endsection