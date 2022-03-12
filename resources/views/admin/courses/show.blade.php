@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Show Course # {{ $course->id }}</h4>
        <p class="card-description">
          Course
        </p>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="project_id">Project : {{$course->project->name}}</label>
                    </div>
                    <div class="form-group col-6">
                      <label for="seq">Seq : {{$course->seq}}</label>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name : {{$course->name}}</label>
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status : {{$course->status}}</label>  
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      {!!$course->desc!!}
                    </div>
            </div>

            <div class='row'>
                    <div class="form-group col-6">
                      <label for="cert_en_file">Certificate template English</label>
                      @if(!empty($course->cert_img_en))
                      <img  src="{{ url($course->cert_img_en) }}" width="100px" />
                      @endif
                    </div>
                    <div class="form-group col-6">
                      <label for="cert_th_file">Certificate template Thai</label>
                      @if(!empty($course->cert_img_th))
                      <img  src="{{ url($course->cert_img_th) }}" width="100px" />
                      @endif
                    </div>
             </div>
        </div>
    


@endsection