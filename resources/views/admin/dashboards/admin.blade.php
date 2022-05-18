 @extends('layouts.admin2')

 @section('content')
@php
    $totalstudent = 0;
    $companydata = [];
    foreach($companies as $company){
       $totalstudent += $company->projectselectcompanies($project->id)->projectcompstudents->count();
       $companydata[$company->id]['pass'] = $company->projectselectcompanies($project->id)->projectcompstudents()->where('progress','Pass')->count();
       $companydata[$company->id]['Inprogress'] = $company->projectselectcompanies($project->id)->projectcompstudents()->where('progress','Inprogress')->count();
       $companydata[$company->id]['Join'] = $company->projectselectcompanies($project->id)->projectcompstudents()->where('progress','Join')->count();

    }
    // dd($companydata);
@endphp
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="row">
                     <h3>สรุปรวม Project: {{ $project->name }}</h3>
                 </div>

                 <div class='row'>
                     <div class="col-lg-6 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body text-center">
                               <img class="p-2" src="{{ asset('img/ico-hotel.png') }}" alt=""
                                                 srcset="" width="100px">
                                 <h4>จำนวนสถานบริการที่เข้าร่วม : {{ $project->projectcompanies->count() }} สถานประกอบการ</h4>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body text-center">
                               <img class="p-2" src="{{ asset('img/ico-person.png') }}" alt=""
                                                 srcset="" width="100px">
                                 <h4>จำนวนผู้เรียนที่เข้าร่วมทั้งหมด : {{ $totalstudent }} คน</h4>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="card-title">สถานบริการที่เข้าร่วมพร้อมจำนวนคนที่สมัครเข้าโครงการ</h4>
                                 <canvas id="barChart"></canvas>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script>
         const ctx = document.getElementById('barChart').getContext('2d');
         const myChart = new Chart(ctx, {
             type: 'bar',
             data: {
                 labels: [
                     @foreach ($companies as $company)
                         '{{ $company->name }}',
                     @endforeach
                 ],
                 datasets: [
                     {
                     label: 'จำนวนผู้สมัคร',
                     data: [
                         @foreach ($companies as $company)
                         @if (isset($companydata[$company->id]['Join']))
                                {{ $companydata[$company->id]['Join'] }}
                            @else
                                0
                            @endif
                         ,
                         @endforeach
                     ],
                 backgroundColor: [
                    @foreach ($companies as $company)
                  'rgba(0, 0, 255, 0.5)',
                  @endforeach
                ]
                 },{
                     label: 'จำนวนผู้สอบผ่าน',
                     data: [
                         @foreach ($companies as $company)
                             @if (isset($companydata[$company->id]['pass']))
                                {{ $companydata[$company->id]['pass'] }}
                            @else
                                0
                            @endif
                         ,
                         @endforeach
                     ],
                 backgroundColor: [
                    @foreach ($companies as $company)
                  'rgba(0, 255, 0, 0.5)',
                  @endforeach
                ]
                 },{
                     label: 'จำนวนผู้กำลังเรียน',
                     data: [
                         @foreach ($companies as $company)
                             @if (isset($companydata[$company->id]['Inprogress']))
                                {{ $companydata[$company->id]['Inprogress'] }}
                            @else
                                0
                            @endif
                         ,
                         @endforeach
                     ],
                 backgroundColor: [
                    @foreach ($companies as $company)
                  'rgba(255, 255, 0, 0.5)',
                  @endforeach
                ]
                 }]
             },
             options: {
                scales: {
      x: {
        stacked: true,
      },
      y: {
        stacked: true
      }
    },
                 legend: {
                     display: false
                 },
                 elements: {
                     point: {
                         radius: 0
                     }
                 }
             }
         });
     </script>
 @endsection
