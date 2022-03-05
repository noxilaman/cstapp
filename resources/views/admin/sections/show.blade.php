@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Section # {{ $section->id }}</h4>
        <p class="card-description">
          Section
        </p>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="course_id">Lesson: </label>
                      {{ $section->lesson->name }}
                    </div>
                    <div class="form-group col-3">
                      <label for="seq">Seq: </label>
                      {{$section->seq}}
                  </div>
                    <div class="form-group col-3">
                      <label for="limit_quiz">จำนวนคำถาม: </label>{{$section->limit_quiz}}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name: </label>{{$section->name}}
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status: </label>
                      {{$section->status}}   
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>{!! $section->desc !!}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="limit_quiz">Link Clip</label>
                        <div class="youtube-video-container">
                        <iframe width="720" height="405" id="player" src="https://www.youtube.com/embed/{{$section->link_clip}}?controls=1" allowfullscreen></iframe>
                        </div>  
                      </div>

            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      @if(isset($section->image))
                      <img src='{{url($section->image)}}' height="100px" />
                      @endif
                     </div>
        </div>
    

 <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
   tinymce.init({
     selector: 'textarea'// Replace this CSS selector to match the placeholder element for TinyMCE
    });
 </script>
@endsection