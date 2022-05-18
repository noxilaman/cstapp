 @extends('layouts.company')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>Project {{ $projectcompany->project->name }} / โรงแรม {{ $company->name }}</h3>
              </div>
              <div class='row'>
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                  <h4>จำนวนผู้ลงทะเบียน : {{  $projectcompany->projectcompstudents->count(); }} คน</h4>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
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
        labels: ['ผ่าน', 'กำลังเรียน', 'สมัคร'],
        datasets: [{
          label: 'ข้อมูลผู้ที่ลงทะเบียนของบริษัท {{ $company->name }}',
          data: [{{ $stat['pass'] }}, {{ $stat['inprogress'] }}, {{ $stat['join'] }}],
          backgroundColor: [
            'rgb(0, 255, 0)',
            'rgb(0, 255, 255)',
            'rgb(255, 255, 0)'
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