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
     <div class="content-wrapper py-1">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="row">
                     <h3>สรุปรวม Project: {{ $project->name }}</h3>
                 </div>

                 <div class='row'>
                    <div class="col-lg-6 grid-margin stretch-card ">
                        <div class="card">
                            <div class="row card-body text-center d-flex align-items-center ">
                               <div class="col-12 col-lg-4">
                               <img class="w-100" src="{{ asset('/newver/img/ico-hotel.png') }}" alt="" srcset="" >

                             </div>
                              <div class="col-12 col-lg-8">
                                <h4 lass="card-title">จำนวนสถานบริการที่เข้าร่วม</h4>
                                 <h1 class="themefontb1"> {{ $project->projectcompanies->count() }} </h1></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="card">
                          <div class="row card-body text-center d-flex align-items-center ">
                            <div class="col-12 col-lg-4">
                              <img class="w-100" src="{{ asset('/newver/img/ico-person.png') }}" alt="" srcset="" >

                            </div>
                            <div class="col-12 col-lg-8">
                              <h4 lass="card-title">จำนวนผู้เรียนที่เข้าร่วมทั้งหมด</h4>
                              <h1 class="themefontb1"> {{ $totalstudent }} </h1>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="col-lg-12 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body">
                                 <h4 class="card-title">สถานบริการที่เข้าร่วมพร้อมจำนวนคนที่สมัครเข้าโครงการ Top 10</h4>
                                 <canvas id="barChart"></canvas>
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
                         '[{{ $company->name }}]',
                     @endforeach
                 ],
                 datasets: [
                     {
                     label: 'ผู้สมัครแต่ยังไม่ดำเนินการใดๆ',
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
                  '#4DBDEB',
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
                  '#FFE08C',
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
                  '#57B657',
                  @endforeach


                ]
                 }]
             },
             options: {
                indexAxis: 'y',
                scales: {
		x: {
			stacked: true,
				suggestedMin: 0,
				suggestedMax: 5, 
				ticks: {
          // forces step size to be 50 units
          			stepSize: 1
        		}
	 	},
                   y: {stacked: true},
                  myChart: {
                    position: 'right', 
                  }
                },
                
                legend: {
                     display: false,
                    
                 },
                 elements: {
                     point: {
                         radius: 2,
                         
                     }
                 },
                 layout: {
                    padding: 20
                  }
                
                
                 
             }
         });
     </script>


 @endsection
