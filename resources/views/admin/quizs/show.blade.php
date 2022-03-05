@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Quiz # {{ $quiz->id }}</h4>
        <p class="card-description">
          Quiz
        </p>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="course_id">Section</label><br/>
                      {{$quiz->section->name}}
                    </div>
                    <div class="form-group col-6">
                      <label for="seq">Seq</label><br/>{{$quiz->seq}}</div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label><br/>{{$quiz->name}}
                    </div>
                    <div class="form-group col-6">
                      <label for="status">Status</label><br/>{{$quiz->status}}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label><br/>
                      {!! $quiz->desc !!}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="ans_desc">Ans desc</label><br/>
                      {!! $quiz->ans_desc !!}
                       </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="limit_quiz">Link Clip</label>
                      @if (!empty($quiz->link_clip))
                          
                        <div class="youtube-video-container">
                        <iframe width="720" height="405" id="player" src="https://www.youtube.com/embed/{{$quiz->link_clip}}?controls=1" allowfullscreen></iframe>
                        </div>  
                      @else
                          -
                      @endif
                    </div>

            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="image_file">Image</label>
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
                $listresult =  ['1'=>'Correct','0'=>'Incorrect'];
            @endphp
                
            <div class='row' >
              <div class="form-group col-6">
                      <label for="c_desc">Choice Name {{ $loopp }}</label>
                 : {{ $choice->name }}
              </div>

                    <div class="form-group col-6">
                      <label for="c_desc">Desc  {{$loopp}}</label>
                 : {{ $choice->desc }}  </div>
              <div class="form-group col-6">
                <label for="c_result{{$i}}">Result  {{$loopp}}</label>
                {{ $listresult[$choice->result]  }}
              </div>
              <div class="form-group col-6">
                      <label for="c_image_file{{$i}}">Image  {{$loopp}}</label>
                      @if (!empty($choice->image))
                      <img src="{{ url($choice->image) }}" width="100px" />
                      @endif
                     </div>

            </div>

            
            @endforeach 

        </form>
        </div>

   <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
   tinymce.init({
     selector: 'textarea'// Replace this CSS selector to match the placeholder element for TinyMCE
    });
 </script>


@endsection