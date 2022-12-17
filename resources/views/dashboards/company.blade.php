 @extends('layouts.company')

@section('content')
        <div class="content-wrapper py-1">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row pb-3">
                <h3>Project {{ $projectcompany->project->name }} / <span class="themefontb1">โรงแรม {{ $company->name }}</span> </h3>
              </div>
              <div class='row'>
                <div class="col-lg-6 grid-margin stretch-card text-center">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">จำนวนผู้เรียนที่เข้าร่วมทั้งหมด</h4>
                    <h1 class="themefontb1"> {{  $projectcompany->projectcompstudents->count(); }} </h1>
                    <img class="w-100" src="{{ asset('/newver/img/ico-person-01.png') }}" alt="" srcset="" >
                </div>
                </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card  text-center">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">จำนวนคนเรียนแยกตามสถานะ</h4>
                          <canvas id="myChart"></canvas>
                      </div>
                  </div>
              </div>

              
            </div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['สมัคร' ,'ผ่าน', 'กำลังเรียน'],
        datasets: [{
          label: 'ข้อมูลผู้ที่ลงทะเบียนของบริษัท {{ $company->name }}',
          data: [{{ $stat['join'] }}, {{ $stat['inprogress'] }}, {{ $stat['pass'] }}],
          backgroundColor: [
            '#4DBDEB',
            '#FFE08C',
            '#57B657'
          ],
        }]
    },
    options: {
      responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
    }
});
</script>
            </div>
          </div>
        </div>
@endsection