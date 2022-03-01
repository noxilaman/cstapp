 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-4">
                <h3>รายการบทเรียน</h3>
              </div>
              <div class='row'>
                    @foreach ($joincourseObj->course->lessons()->get() as $item)
                    <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">{{  $item->course->name }}</p>
                      <p class="fs-30 mb-2">{{  $item->name }}</p>
                      <p>
                          @if (isset($joinlessons[$item->id]))
                            <a href="http://">Joined</a>   
                          @else
                            <a href="{{ url('join/lesson/'.$joincourseObj->id.'/'.$item->id) }}">Join</a>
                          @endif
                      </p>
                    </div>
                  </div>
                </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
@endsection