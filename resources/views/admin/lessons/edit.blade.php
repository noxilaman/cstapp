@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Lesson # {{ $lesson->id }}</h4>
        <p class="card-description">
          Lesson
        </p>
        <form action="{{ url('admin/lessons/'.$lesson->id) }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="course_id">Course</label>
                      {!! Form::select('course_id',$courselist,$lesson->course_id,['class' => 'form-control','id'=>'course_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-6">
                      <label for="seq">Seq</label>
                      <input type="number" class="form-control" id="seq" placeholder="seq" name='seq' value='{{$lesson->seq}}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{$lesson->name}}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$lesson->status,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'>{{$lesson->desc}}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="limit_quiz">Limit Quiz</label>
                      <input type="number" class="form-control" id="limit_quiz" placeholder="limit_quiz" name='limit_quiz' value='{{$lesson->limit_quiz}}'>
                    </div>

                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                      @if(isset($lesson->image))
                      <img src='{{url($lesson->image)}}' height="100px" />
                      @endif
                     </div>
            <div class='row'>
                    
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>

        </form>
        </div>
    


@endsection