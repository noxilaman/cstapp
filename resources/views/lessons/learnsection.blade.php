 @extends('layouts.student')

 @section('content')
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="pb-3">
                     <h3>การเรียนรู้</h3>
                 </div>
                 @php
                     // dd($jclObj);
                 @endphp
                 <a href="{{ url('/learns/lesson/' . $jclObj->id) }}" class='btn themebgy1'>ย้อนกลับ</a>
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">{{ $jclObj->lesson->name }}</h5>
                         <h4>{{ $jclSection->section->name }}</h4>
                         <div class='row'>
                             <div class='col-md-12'>
                                 <div class="youtube-video-container">
                                     <iframe width="720" height="405" id="player"
                                         src="https://www.youtube.com/embed/{{ $jclSection->section->link_clip }}?enablejsapi=1&controls=0"
                                         allowfullscreen></iframe>
                                 </div>
                                 <br />
                                 @if ($flagpass == 'N')
                                     <a id="passblock" href="{{ url('exams/play/' . $jclSection->id) }}"
                                         @if ($jclSection->progress != 'Pass') style="display:none" @endif
                                         class="bth btn-success btn-lg">เข้าทำการทดสอบ</a>
                                 @endif
                                 <br /> <br />
                                 <div>{!! $jclSection->section->desc !!}</div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-body text-center">
                             <h3>ผ่านการเรียน</h3><br />
                             <a id="passblock" href="{{ url('exams/play/' . $jclSection->id) }}"
                                 class="bth btn-success btn-lg">เข้าทำการทดสอบ</a>
                         </div>
                     </div>
                 </div>
             </div>

             <script>
                 var player;

                 function onYouTubeIframeAPIReady() {
                     player = new YT.Player('player', {
                         events: {
                             'onStateChange': onPlayerStateChange
                         }
                     });
                 }

                 function onPlayerStateChange(event) {
                     switch (event.data) {
                         case 0:
                             $.get("{{ url('learns/sectionchangestatus/' . $jclSection->id . '/Pass') }}", showpass());
                             break;
                     }
                 }

                 function showpass() {
                    @if ($jclSection->progress != 'Pass')
                        $("#passblock").show(1000);

                        setTimeout(() => {
                            $('#exampleModal').modal('show');
                        }, 3000);
                     @endif
                 }

                 $('.closemodal').on('click', () => {
                     $('#exampleModal').modal('hide');
                 });


                 //showpass();
             </script>
         @endsection
