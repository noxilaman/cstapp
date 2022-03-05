 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>การเรียนรู้</h3>
              </div>
              <a href="{{ url('/learns/lesson/'.$jclObj->lesson_id) }}" class='btn btn-success' >ย้อนกลับ</a>
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $jclObj->lesson->name }}</h5>
              <h4>{{ $jclSection->section->name }}</h4>
              <div class='row'>
                <div class='col-md-12'>
<div class="youtube-video-container">
                 <iframe width="720" height="405" id="player" src="https://www.youtube.com/embed/{{$jclSection->section->link_clip}}?enablejsapi=1&controls=0" allowfullscreen></iframe>
                 </div><br/>
                     {!! $jclSection->section->desc !!}
                 
                 <br/>
                  <a id="passblock" href="{{ url('exams/play/'.$jclSection->id)  }}"
                @if ($jclSection->progress != 'Pass')
                style="display:none"     
                @endif 
                class="bth btn-success btn-lg">ผ่าน และ ทำแบบทดสอบ</a>
                </div>
              </div>


            </div>
          </div>
        </div>
        <script>
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player( 'player', {
          events: { 'onStateChange': onPlayerStateChange }
        });
      }
      function onPlayerStateChange(event) {
        switch(event.data) {
          case 0:
            $.get("{{url('learns/sectionchangestatus/'.$jclSection->id.'/Pass')}}",showpass());
            break;
        }
      }
      function showpass(){
          $("#passblock").show(1000);
      }
      //showpass();
    </script>
@endsection