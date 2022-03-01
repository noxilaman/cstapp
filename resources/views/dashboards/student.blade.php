 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>ข้อมูลการเรียนรู้</h3>
              </div>
              <div class='row'>
                <div class='col-md-12  card card-tale'>
                  <div class='row'>
                    <div class="col-md-6 ">
                    <div class="card-body">
                      <p class="mb-4">Project: {{ $project->name }}</p>
                      <p class="fs-30 mb-2">Course: {{ $course->name }}</p>
                      <p>@if (empty($joincourse))
                          <a href="{{ url('join/course/'.$projectcompstudent->id.'/'.$course->id) }}">Join </a>
                      @else
                          <a href="{{ url('learns/course/'.$joincourse->id) }}">Joined on  {{ $joincourse->join_date }}</a>
                      @endif</p>
                    </div>
                  </div>

                    <div class="col-md-6">
                    <div class="card-body">
                      @foreach ($course->lessons()->get() as $item)
                          <p class="mb-1">
                            @if (isset($jcls[$item->id]))
                            <a href="{{ url('/join/lesson/'.$jcls[$item->id]->join_course_id.'/'.$item->id) }}">
                            Lesson: {{ $item->name }} / Status: 
                              {{ $jcls[$item->id]->progress }}
                            </a>
                          @else
                            @if (!empty($joincourse))
                            <a href="{{ url('/join/lesson/'.$joincourse->id.'/'.$item->id) }}">
                            Lesson: {{ $item->name }} / Status: -
                            </a>
                            @else
                            Lesson: {{ $item->name }} / Status:   
                            @endif
                          @endif
                          </p>
                      @endforeach
                    </div>
                  </div>
                  </div>
                  
                </div>
                

              </div>
            </div>
          </div>
        </div>
@endsection