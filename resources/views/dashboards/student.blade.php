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
                    <div class="col-md-12 ">
                    <div class="card-body">
                      <p class="mb-4 fs-30">โครงการ: {{ $project->name }}</p>
                      <p class="fs-30 mb-2">หลักสูตร: {{ $course->name }}</p>
                      <p>@if (empty($joincourse))
                          <a href="{{ url('join/course/'.$projectcompstudent->id.'/'.$course->id) }}">สมัคร</a>
                      @else
                          <a href="{{ url('learns/course/'.$joincourse->id) }}" class='btn btn-warning'>สมัครเข้าเรียนเมื่อ  {{ $joincourse->join_date }}</a>
                          <a href="{{ url('learns/course/'.$joincourse->id) }}" class='btn btn-warning'>ความสำเร็จ  {{ number_format($progress['pass']*100/$progress['count'],2,'.',',') }} %</a>
                          
                      @endif</p>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="card-body">
                      @foreach ($course->lessons()->get() as $item)
                          <p class="mb-1">
                            @if (isset($jcls[$item->id]))
                            <a class="
                            @if($jcls[$item->id]->progress == 'Pass')
                            btn-success 
                            @else
                            btn-secondary
                            @endif
                            
                            btn  btn-block" href="{{ url('/join/lesson/'.$jcls[$item->id]->join_course_id.'/'.$item->id) }}">
                            Lesson: {{ $item->name }}<br/>Status: 
                              {{ $jcls[$item->id]->progress }}
                            </a>
                          @else
                            @if (!empty($joincourse))
                            <a  class="btn-warning btn  btn-block"  href="{{ url('/join/lesson/'.$joincourse->id.'/'.$item->id) }}">
                            Lesson: {{ $item->name }}<br/>Status: -
                            </a>
                            @else
                            <a  class="btn-warning btn  btn-block"  href="#" >
                            Lesson: {{ $item->name }}<br/>Status:   
                             </a>
                            @endif
                          @endif
                          </p>
                      @endforeach
                    </div>
                  </div></div>

                    
                  
                  
                </div>
                

              </div>
            </div>
          </div>
        </div>
@endsection