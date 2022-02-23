@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Quiz</h4>
        <p class="card-description">
          Quiz
        </p>
        <form action="{{ url('admin/quizs/') }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            
             <div class='row'>
                    <div class="form-group col-6">
                      <label for="lesson_id">Lesson</label>
                      {!! Form::select('lesson_id',$lessonlist,null,['class' => 'form-control','id'=>'lesson_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-6">
                      <label for="seq">Seq</label>
                      <input type="number" class="form-control" id="seq" placeholder="seq" name='seq' value='1'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value=''>
                    </div>

                    <div class="form-group col-6">
                      <label for="link_clip">Link Clip</label>
                      <input type="text" class="form-control" id="link_clip" placeholder="Link Clip" name='link_clip' value=''>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'></textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="ans_desc">Ans desc</label>
                      <textarea class="form-control" id="ans_desc" rows="4" name='ans_desc'></textarea>
                    </div>
            </div>
            <div class='row'>

                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>

                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                     </div>

            @for ($i=1;$i<=6;$i++)
            <div class='row' >
              <div class="form-group col-6">
                <label for="c_name{{$i}}">Choice {{$i}}</label>
                <input type="text" name="c_name{{$i}}" id="c_name{{$i}}" class="form-control"  />
              </div>

                    <div class="form-group col-6">
                      <label for="c_desc">Desc  {{$i}}</label>
                       <input type="text" name="c_desc{{$i}}" id="c_desc{{$i}}" class="form-control"  />
                    </div>
              <div class="form-group col-6">
                <label for="c_result{{$i}}">Result  {{$i}}</label>
                 {!! Form::select('c_result'.$i,['1'=>'Correct','0'=>'Incorrect'],null,array('class' =>'form_control','id'=>'c_result'.$i,'placeholder'=>'====Select====')) !!}
                     
              </div>
              <div class="form-group col-6">
                      <label for="c_image_file{{$i}}">Image  {{$i}}</label>
                      {!! Form::file('c_image_file'.$i,array('class' =>'form_control','id'=>'c_image_file'.$i)) !!}
                     </div>

            </div>

            @endfor

            <div class='row'>
                    
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>
        </form>
        </div>
    


@endsection