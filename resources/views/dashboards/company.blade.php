 @extends('layouts.company')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>Project {{ $projectcompany->project->name }} / บริษัท {{ $company->name }}</h3>
              </div>
              <div class='row'>
                <div class='col-md-6 card  card-tale' >

                    <div class="card-body">
                  <h4>จำนวนผู้ลงทะเบียน : {{  $projectcompany->projectcompstudents->count(); }} คน</h4>
                    </div>
                </div>

              </div>
              <div class='row'>
                <div class='col-md-6'>

              <canvas id="myChart" width="400" height="400"></canvas>

                </div>

              </div>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
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
      maintainAspectRatio: false,
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
          }
        }
      }
    }
});
</script>
            </div>
          </div>
        </div>
@endsection