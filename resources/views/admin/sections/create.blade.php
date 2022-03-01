@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Section</h4>
        <p class="card-description">
          Section
        </p>
        <form action="{{ url('admin/sections/') }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            
             <div class='row'>
                    <div class="form-group col-6">
                      <label for="lesson_id">Lesson</label>
                      {!! Form::select('lesson_id',$lessonlist,null,['class' => 'form-control','id'=>'lesson_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-3">
                      <label for="seq">Seq</label>
                      <input type="number" class="form-control" id="seq" placeholder="seq" name='seq' value='1'>
                    </div>
                    <div class="form-group col-3">
                      <label for="limit_quiz">จำนวนคำถาม</label>
                      <input type="number" class="form-control" id="limit_quiz" placeholder="limit_quiz" name='limit_quiz' value='3'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value=''>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'></textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="link_clip">Link Clip</label>
                      <input type="text" class="form-control" id="link_clip" placeholder="Link Clip" name='link_clip' value=''>
                    </div>

                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                     </div>
            <div class='row'>
                    
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>
        </form>
        </div>
    


@endsection