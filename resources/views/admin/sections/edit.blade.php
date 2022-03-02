@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Section # {{ $section->id }}</h4>
        <p class="card-description">
          Section
        </p>
        <form action="{{ url('admin/sections/'.$section->id)}}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="course_id">Lesson</label>
                      {!! Form::select('lesson_id',$lessonlist,$section->lesson_id,['class' => 'form-control','id'=>'lesson_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-3">
                      <label for="seq">Seq</label>
                      <input type="number" class="form-control" id="seq" placeholder="seq" name='seq' value='{{$section->seq}}'>
                    </div>
                    <div class="form-group col-3">
                      <label for="limit_quiz">จำนวนคำถาม</label>
                      <input type="number" class="form-control" id="limit_quiz" placeholder="limit_quiz" name='limit_quiz' value='{{$section->limit_quiz}}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{$section->name}}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$section->status,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'>{{$section->desc}}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="limit_quiz">Link Clip</label>
                      <input type="text" class="form-control" id="link_clip" placeholder="limit_quiz" name='link_clip' value='{{$section->link_clip}}'>
                    </div>

                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                      @if(isset($section->image))
                      <img src='{{url($section->image)}}' height="100px" />
                      @endif
                     </div>
            <div class='row'>
                    
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>

        </form>
        </div>
    

 <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
   tinymce.init({
     selector: 'textarea'// Replace this CSS selector to match the placeholder element for TinyMCE
    });
 </script>
@endsection