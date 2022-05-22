 @extends('layouts.student')

 @section('content')
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="row">
                     <h3>ข้อมูลการเรียนรู้</h3>
                 </div>
                 <div class='row'>
                     <div class='col-md-12  card card-tale'>
                         <div class='row'>
                             <div class="col-md-12 ">
                                 <div class="card-body">
                                   
                                     <div class='row'>
                                         <div class="col-md-3 text-center">
                                           <img src="{{ asset('img/ico-book-open.png') }}" alt=""
                                                 srcset="" width="150px">
                                         </div>
                                         <div class="col-md-6">
                                             <p class="mb-4 fs-30">โครงการ: {{ $project->name }}</p>
                                             <p class="fs-30 mb-2">หลักสูตร: {{ $course->name }}</p>
                                             <p class="p-3">
                                                 @if (empty($joincourse))
                                                     <a
                                                         href="{{ url('join/course/' . $projectcompstudent->id . '/' . $course->id) }}">สมัคร</a>
                                                 @else
                                                     <a href="{{ url('learns/course/' . $joincourse->id) }}"
                                                         class='btn btn-warning'>สมัครเข้าเรียนเมื่อ
                                                         {{ $joincourse->join_date }}</a>
                                                     @if ($progress['count'] > 0)
                                                        
                                                         <a href="{{ url('learns/course/' . $joincourse->id) }}"
                                                             class='btn btn-info'>ความสำเร็จ
                                                             {{ number_format(($progress['pass'] * 100) / $progress['count'], 2, '.', ',') }}
                                                             %</a>
                                                     @endif
                                                 @endif
                                             </p>
                                         </div>
                                        <div class="col-md-3 text-center">
                                          @if ($progress['pass']  ==  $progress['count'])
                                              <img src="{{ asset('img/ico-trophy.png') }}" alt=""
                                                 srcset="" width="150px">
                                          @else
                                                
                                              <div id="chart_div" style="width: 150px; height: 150px;"></div>
                                          @endif
                                          
                                         </div>
                                         
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <div class="card-body">
                                    <div class="row">
                                     @foreach ($course->lessons()->get() as $item)
                                     <div class="col-12 col-md-6">
                                     <p class="mb-1">
                                         <div class="row">
                                             @if (isset($jcls[$item->id]))
                                                 <a class="
                            @if ($jcls[$item->id]->progress == 'Pass') btn-success 
                            @else
                            btn-info @endif
                            btn  btn-block"
                                                     href="{{ url('/join/lesson/' . $jcls[$item->id]->join_course_id . '/' . $item->id) }}">
                                                     <div class="col-3" >
                                                     @if ($jcls[$item->id]->progress == 'Pass')
                                                     
                                                     <img src="{{ asset('img/ico-pass.png') }}" alt="" width="50px" srcset="">
                                                     @else
                                                        <img src="{{ asset('img/ico-Inprogress.png') }}" alt="" width="50px" srcset="">
                                                     @endif
                                                    </div>
                                                    <div class="col-9">
Lesson: {{ $item->name }}<br />Status:
                                                     {{ $jcls[$item->id]->progress }}
                                                    </div>
                                                     
                                                 </a>
                                             @else
                                                 
                                                 @if (!empty($joincourse))
                                                     <a class="btn-info btn  btn-block"
                                                         href="{{ url('/join/lesson/' . $joincourse->id . '/' . $item->id) }}">
                                                         <img src="{{ asset('img/ico-join.png') }}" alt="" width="50px" srcset="">
                                                         Lesson: {{ $item->name }}<br />Status: Join
                                                 
                                                     </a>
                                                 @else
                                                     <a class="btn-info btn  btn-block" href="#">
                                                         Lesson: {{ $item->name }}<br />Status: Join
                                                     </a>
                                                 @endif
                                             @endif
                                         </p>
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
     </div>
     @if ($progress['pass']  !=  $progress['count'])
         
    
     <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Progress (%)',  {{ number_format(($progress['pass'] * 100) / $progress['count'], 0, '', '') }}],
        ]);

        var options = {
          width: 150, height: 150,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
     @endif
 @endsection
