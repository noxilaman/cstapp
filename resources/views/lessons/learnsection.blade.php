 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>Student Page</h3>
              </div>
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $jclObj->lesson->name }}</h5>
              <h4>{{ $jclSection->section->name }} 
                <button id="passblock" 
                @if ($jclSection->progress != 'Pass')
                style="display:none"     
                @endif 
                class='bth btn-success' >ผ่าน</button>
              </h4>
              <div class='row'>
                <div class='col-md-12'>

                     {{ $jclSection->section->desc }}<br/>
                 
                 <iframe width="720" height="405" id="player" src="https://www.youtube.com/embed/{{$jclSection->section->link_clip}}?enablejsapi=1"></iframe>
    

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