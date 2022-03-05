 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-3">
                <h3>ทบทวน แบบทดสอบ {{ $jclsection->jcl->lesson->name }}</h3>
              </div>
              <a href="{{ url('/learns/lesson/'.$jclsection->jcl->lesson_id) }}" class='btn btn-success' >ย้อนกลับ</a>
              
              @foreach ($jclquizs as $jclquiz)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $jclquiz->quiz->name }}</h5>
                  {!! $jclquiz->quiz->desc !!}
                </div>
                <div class="card-body">
                  
                  <h5 class="card-title">รายละเอียดคำตอบ</h5>
                    {!! $jclquiz->quiz->ans_desc !!}
                </div>
              </div>   
              @endforeach
        </div>
@endsection