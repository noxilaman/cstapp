 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-4">
                
                @php
                    // dd($jclObj)
                @endphp
                <div class="col-md-12 py-3">
                  <a href="{{ url('/learns/course/'.$jclObj->join_course_id) }}" class='btn btn-success' >ย้อนกลับ</a>
                </div>
                <div class="col-md-12">
                <h3>รายการบทเรียนของ {{ $jclObj->lesson->name }}</h3>  
                </div>
                
              </div>
         
              
              <div class='row'>
                
                    @foreach ($jclObj->lesson->sections()->get() as $item)



                    <div class="col-12 col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-tale left-b-bd">
                    <div class="card-body">
                      <h3 class="mb-4">{{  $item->name }}</h3>
                      <p class="py-0 m-0">
                        @if (isset($jclSectionFlags[$item->id]) && $jclSectionFlags[$item->id])
                            
                        @if ($jclSections[$item->id]->progress == 'Pass')
                            <a href="{{ url('learns/section/'.$jclObj->id.'/'.$jclSections[$item->id]->id) }}/Y" class='btn btn-success'>ทบทวนบทเรียน</a>

                            @if ($jclQuizFlags[$item->id])
                            @else
                                <a href="{{ url('exams/play/'.$jclSections[$item->id]->id) }}" class='btn btn-info'>ทดสอบ</a>
                            @endif
                            
                        @else 
                            <a href="{{ url('learns/section/'.$jclObj->id.'/'.$jclSections[$item->id]->id) }}/N" class='btn btn-info'>เข้าเรียน</a>
                        @endif
                      @else
                      <a href="{{ url('join/selectedsection/'.$jclObj->id.'/'.$item->id) }}/N" class='btn btn-info'>เข้าเรียน</a>
                        
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