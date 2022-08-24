 @extends('layouts.student')

 @section('content')
 <div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
       <h3 class="pb-2">แบบทดสอบ {{ $jclsection->jcl->lesson->name }}</h3>
       <h2 class="themefontb1">{{ $jclsection->section->name }}</h2>
    </div>
       
   
       <form action="{{ url('exams/playAction/'.$jclsection->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @foreach ($jclquizs as $jclquiz)
         <div class="card mb-3">
           <div class="card-body">
     
            <p class="pb-2">{!! $jclquiz->quiz->name !!}</p>
            
    
             <h4>{{ strip_tags($jclquiz->quiz->desc) }}</h4>
             <div class="row">
               @foreach ($jclquiz->quiz->choices()->inRandomOrder()->get() as $choice)
               <div class="col-md-6">
                 {{ Form::radio('choice-'.$jclquiz->id,$choice->id,false) }}
                 {{ $choice->name }}
               </div>
               @endforeach
             </div>
           </div>
         </div>
         @endforeach

         <div class="col-12 justify-content-between d-flex p-0">
          <a href="{{ url('/learns/lesson/'.$jclsection->jcl->lesson_id) }}" class='btn themebgy1'>ย้อนกลับ</a>

          {{ Form::submit('ส่งคำตอบ',['class'=>'btn btn-primary']) }}
         </div>
       </form>
     </div>
     @endsection