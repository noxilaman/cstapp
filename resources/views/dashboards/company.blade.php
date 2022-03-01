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
            </div>
          </div>
        </div>
@endsection