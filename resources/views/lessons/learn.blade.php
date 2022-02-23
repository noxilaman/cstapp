 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>Student Page</h3>
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
                            <a href="{{ url('learns/section/'.$jclObj->id.'/'.$jclSections[$item->id]->id) }}" class='btn btn-primary'>เข้าเรียน</a>
                            @if ($jclSections[$item->id]->progress == 'Pass')
                                <a href="#" class='btn btn-success'>ผ่าน</a>
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