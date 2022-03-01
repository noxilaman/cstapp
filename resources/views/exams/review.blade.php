 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-3">
                <h3>ทบทวน แบบทดสอบ {{ $jclsection->jcl->lesson->name }}</h3>
              </div>
              @foreach ($jclquizs as $jclquiz)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $jclquiz->quiz->name }}</h5>
                  <p>{{ $jclquiz->quiz->desc }}</p>
                </div>
                <div class="card-body">
                  
                  <h5 class="card-title">รายละเอียดคำตอบ</h5>
                    <p>{{ $jclquiz->quiz->ans_desc }}</p>
                </div>
              </div>   
              @endforeach
        </div>
@endsection