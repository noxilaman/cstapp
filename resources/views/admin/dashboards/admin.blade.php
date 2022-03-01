 @extends('layouts.admin2')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <h3>สรุปรวม Project: {{ $project->name}}</h3>
              </div>
              
              <div class='row'>
                <div class='col-md-6 card  card-tale' >

                    <div class="card-body">
                  <h4>จำนวนสถานบริการที่เข้าร่วม : {{  $project->projectcompanies->count(); }}</h4>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection