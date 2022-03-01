 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-4">
                <h3>รายการบทเรียนของ {{ $jclObj->lesson->name }}</h3>
              </div>
         
              <div class='row'>
                
                    @foreach ($jclObj->lesson->sections()->get() as $item)

                    


                    <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">{{  $item->lesson->name }}</p>
                      <p class="fs-30 mb-2">{{  $item->name }}</p>
                      <p>
                          @if ($jclSectionFlags[$item->id])
                            
                            @if ($jclSections[$item->id]->progress == 'Pass')
                                <a href="{{ url('learns/section/'.$jclObj->id.'/'.$jclSections[$item->id]->id) }}" class='btn btn-success'>ทบทวน</a>

                                @if ($jclQuizFlags[$item->id])
                                    <a href="{{ url('exams/review/'.$jclSections[$item->id]->id) }}" class='btn btn-success'>รีวิวคำตอบ</a>
                                @else
                                    <a href="{{ url('exams/play/'.$jclSections[$item->id]->id) }}" class='btn btn-primary'>ทดสอบ</a>
                                @endif
                                
                            @else 
                                <a href="{{ url('learns/section/'.$jclObj->id.'/'.$jclSections[$item->id]->id) }}" class='btn btn-primary'>เข้าเรียน</a>
                            @endif
                            
                            
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