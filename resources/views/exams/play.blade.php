 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row mb-3">
                <h3>แบบทดสอบ {{ $jclsection->jcl->lesson->name }}</h3>
              </div><a href="{{ url('/learns/lesson/'.$jclsection->jcl->lesson_id) }}" class='btn btn-success' >ย้อนกลับ</a>
              
              <form action="{{ url('exams/playAction/'.$jclsection->id) }}"  method="POST"  enctype="multipart/form-data">
              @csrf
              @foreach ($jclquizs as $jclquiz)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $jclquiz->quiz->name }}</h5>
                  <p>{!! $jclquiz->quiz->desc !!}</p>
                  <div class="row">
                  @foreach ($jclquiz->quiz->choices()->inRandomOrder()->get() as $choice)
                  <div class="col-md-6">
                    {{ Form::radio('choice-'.$jclquiz->id,$choice->id,false) }}
                    {{ $choice->name }}</div>    
                  @endforeach
                  </div>
                </div>
              </div>   
              @endforeach
              <div class="card mb-3">
                <div class="card-body">
                  {{ Form::submit('ส่งคำตอบ',['class'=>'btn btn-primary']) }}
                  </div>
              </div>  
              </form>
        </div>
@endsection