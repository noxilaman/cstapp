 @extends('layouts.student')

 @section('content')
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="row">
                     <div class="content-wrapper">
                         <div class="row">
                             <div class="col-md-12 grid-margin">
                                 <div class="row mb-2">
                                     <h3>ข้อมูลการเรียนรู้</h3>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12  card card-tale">
                                         <div class="row">
                                             <div class="col-md-12 ">
                                                 <div class="card-body">

                                                     <div class="row ">
                                                         <div class="col-6 col-md-4 col-xl-2 m-auto ">
                                                             <img src="{{ asset('newver/img/header-book-02.png') }}"
                                                                 alt="" srcset="" class="w-100">
                                                         </div>
                                                         <div class="col-12 col-md-8 col-xl-10 ">
                                                             <h2 class="mb-4">โครงการ: {{ $project->name }}</h2>
                                                             <p class="fs-30 mb-2">หลักสูตร: {{ $course->name }}</p>
                                                             <p class="py-3">

                                                                 @if (empty($joincourse))
                                                                     <a
                                                                         href="{{ url('join/course/' . $projectcompstudent->id . '/' . $course->id) }}">สมัคร</a>
                                                                 @else
                                                                     <a href="{{ url('learns/course/' . $joincourse->id) }}"
                                                                         class='btn  btn btn-outline-info m-1'>สมัครเข้าเรียนเมื่อ
                                                                         {{ $joincourse->join_date }}</a>
                                                                 @endif


                                                             </p>
                                                         </div>
                                                     </div>
                                                     @if (!empty($joincourse) && $progress['count'] > 0)
                                                         <div class="row align-middle">
                                                             <div class="col-md-9 col-xl-10 text-center pb-2">
                                                                 <div class="progress">
                                                                     <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                                                         role="progressbar"
                                                                         aria-valuenow="{{ number_format(($progress['pass'] * 100) / $progress['count'], 0, '.', ',') }}"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width: {{ number_format(($progress['pass'] * 100) / $progress['count'], 0, '.', ',') }}%">
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-3 col-xl-2 pb-2">
                                                                 <a href="https://childsafefriendlytourism.com/learns/course/1"
                                                                     class="btn btn-info w-100">
                                                                     ความสำเร็จ
                                                                     {{ number_format(($progress['pass'] * 100) / $progress['count'], 0, '.', ',') }}%
                                                                 </a>
                                                             </div>
                                                         </div>
                                                     @endif
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-12">
                                                 <div class="row ">
                                                     @foreach ($course->lessons()->get() as $item)
                                                         <div class="col-12 col-xl-6">
                                                             <p class="mb-1"></p>
                                                             <div class="row m-1 ">

                                                                 @if (isset($jcls[$item->id]))
                                                                     <a class="
                                                               @if ($jcls[$item->id]->progress == 'Pass') btn-success 
                                                               @else
                                                               @if ($jcls[$item->id]->progress == 'Join') 
                                                               themebgb1 themefontw  
                                                               @else
                                                               themebgy1 @endif
                                                                @endif
                                                               btn  btn-block"
                                                                         href="{{ url('/join/lesson/' . $jcls[$item->id]->join_course_id . '/' . $item->id) }}">
                                                                         <div class="row">
                                                                             <div class="col-2">
                                                                                 @if ($jcls[$item->id]->progress == 'Pass')
                                                                                     <img src="{{ asset('img/finish.png') }}"
                                                                                         alt="" class="w-100"
                                                                                         srcset="">
                                                                                 @else
                                                                                     @if ($jcls[$item->id]->progress == 'Join')
                                                                                         <img src="{{ asset('img/hold.png') }}"
                                                                                             alt="" class="w-100"
                                                                                             srcset="">
                                                                                     @else
                                                                                         <img src="{{ asset('img/prosess.png') }}"
                                                                                             alt="" class="w-100"
                                                                                             srcset="">
                                                                                     @endif
                                                                                 @endif
                                                                             </div>
                                                                             <div class="col-10 font-weight-bold text-left">
                                                                                 <h4>{{ $item->name }}</h4>
                                                                                 <h4>สถานะ:
                                                                                     {{ config('myconfig.maplang.'.$jcls[$item->id]->progress) }}</h4>
                                                                             </div>
                                                                         </div>
                                                                     </a>
                                                                 @else
                                                                     @if (!empty($joincourse))
                                                                         <a class="themebgb1 themefontw   btn  btn-block"
                                                                             href="{{ url('/join/lesson/' . $joincourse->id . '/' . $item->id) }}">
                                                                             <div class="row">
                                                                                 <div class="col-2">
                                                                                     <img src="{{ asset('img/hold.png') }}"
                                                                                         alt="" class="w-100"
                                                                                         srcset="">
                                                                                 </div>
                                                                                 <div
                                                                                     class="col-10 font-weight-bold text-left">
                                                                                     <h4>{{ $item->name }}</h4>
                                                                                     <h4>สถานะ: Join</h4>
                                                                                 </div>
                                                                             </div>
                                                                         </a>
                                                                     @else
                                                                         <a class="btn-info btn  btn-block" href="#">
                                                                             <h4>Lesson: {{ $item->name }}</h4>
                                                                             <h3>สถานะ: Join</h3>
                                                                         </a>
                                                                     @endif
                                                                 @endif


                                                                 <p></p>
                                                             </div>
                                                         </div>
                                                     @endforeach
                                                 </div>

                                             </div>
                                         </div>




                                     </div>


                                 </div>
                             </div>
                         </div>
                     </div>
                     @if ($progress['pass'] != $progress['count'])
                         <script type="text/javascript">
                             google.charts.load('current', {
                                 'packages': ['gauge']
                             });
                             google.charts.setOnLoadCallback(drawChart);

                             function drawChart() {

                                 var data = google.visualization.arrayToDataTable([
                                     ['Label', 'Value'],
                                     ['Progress (%)', {{ number_format(($progress['pass'] * 100) / $progress['count'], 0, '', '') }}],
                                 ]);

                                 var options = {
                                     width: 150,
                                     height: 150,
                                     redFrom: 90,
                                     redTo: 100,
                                     yellowFrom: 75,
                                     yellowTo: 90,
                                     minorTicks: 5
                                 };

                                 var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                                 chart.draw(data, options);
                             }
                         </script>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 @endsection
