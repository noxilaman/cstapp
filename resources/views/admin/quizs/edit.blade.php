@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Quiz # {{ $quiz->id }}</h4>
        <p class="card-description">
          Quiz
        </p>
        <form action="{{ url('admin/quizs/'.$quiz->id)}}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="course_id">Section</label>
                      {!! Form::select('section_id',$lessonlist,$quiz->section_id,['class' => 'form-control','id'=>'section_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-6">
                      <label for="seq">Seq</label>
                      <input type="number" class="form-control" id="seq" placeholder="seq" name='seq' value='{{$quiz->seq}}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{$quiz->name}}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$quiz->status,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'>{{$quiz->desc}}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="ans_desc">Ans desc</label>
                      <textarea class="form-control" id="ans_desc" rows="4" name='ans_desc'>{{$quiz->ans_desc}}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="limit_quiz">Link Clip</label>
                      <input type="text" class="form-control" id="link_clip" placeholder="limit_quiz" name='link_clip' value='{{$quiz->link_clip}}'>
                    </div>

                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                      @if(isset($quiz->image))
                      <img src='{{url($quiz->image)}}' height="100px" />
                      @endif
                     </div>
            @php
                $loopp = 0;
            @endphp
            @foreach ($quiz->choices as $choice)
            @php
                $loopp++;
                $i = $choice->id; 
            @endphp
                
            <div class='row' >
              <div class="form-group col-6">
                <label for="c_name{{$i}}">Choice {{$loopp}} <a href="{{ url('admin/quizs/deleteChoice/'.$quiz->id.'/'.$i) }}">[ Delete ]</a></label>
                <input type="text" name="c_name{{$i}}" id="c_name{{$i}}" class="form-control"  value="{{ $choice->name }}" />
              </div>

                    <div class="form-group col-6">
                      <label for="c_desc">Desc  {{$loopp}}</label>
                       <input type="text" name="c_desc{{$i}}" id="c_desc{{$i}}" class="form-control" value="{{ $choice->desc }}" />
                    </div>
              <div class="form-group col-6">
                <label for="c_result{{$i}}">Result  {{$loopp}}</label>
                 {!! Form::select('c_result'.$i,['1'=>'Correct','0'=>'Incorrect'],$choice->result,array('class' =>'form_control','id'=>'c_result'.$i,'placeholder'=>'====Select====')) !!}
                     
              </div>
              <div class="form-group col-6">
                      <label for="c_image_file{{$i}}">Image  {{$loopp}}</label>
                      {!! Form::file('c_image_file'.$i,array('class' =>'form_control','id'=>'c_image_file'.$i)) !!}
                      @if (!empty($choice->image))
                      <img src="{{ url($choice->image) }}" width="100px" />
                      @endif
                     </div>

            </div>

            
            @endforeach 
            <div class='row' >
              <div class="form-group col-6">
                <label for="c_name_new">Choice New</label>
                <input type="text" name="c_name_new" id="c_name_new" class="form-control"  />
              </div>

                    <div class="form-group col-6">
                      <label for="c_desc_new">Desc  New</label>
                       <input type="text" name="c_desc_new" id="c_desc_new" class="form-control"  />
                    </div>
              <div class="form-group col-6">
                <label for="c_result_new">Result New</label>
                 {!! Form::select('c_result_new',['1'=>'Correct','0'=>'Incorrect'],null,array('class' =>'form_control','id'=>'c_result_new','placeholder'=>'====Select====')) !!}
                     
              </div>
              <div class="form-group col-6">
                      <label for="c_image_file_new">Image New</label>
                      {!! Form::file('c_image_file_new',array('class' =>'form_control','id'=>'c_image_file_new')) !!}
                     </div>

            </div>

            <div class='row'>
                    
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>

        </form>
        </div>
    


@endsection