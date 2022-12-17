 @extends('layouts.company')

@section('content')
        <div class="content-wrapper">
            <h3>รายชื่อพนักงานบริษัท{{$company->name}}</h3>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">mobile</th>
                <th scope="col">user/pass</th>
                <th scope="col">Status</th>
                <th scope="col">Progress</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pjcomstds as $pjcomstd)
@if ($pjcomstd->progress == 'Pass')
              <tr style="background-color: #9bc37f;">
               @else
                <tr>
                @endif
                    @php
                        $student = $pjcomstd->student;
                    @endphp
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->fname }} {{ $student->lname }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->uname }} / {{ $student->upass }}</td>
                    <td>{{ $student->status }}</td>
                    <td>{{ $pjcomstd->progress }}
                      @if ($pjcomstd->progress == 'Pass')
                        @foreach ($pjcomstd->joincourses as $joincourse)
                            <a class='btn btn-primary' href="{{ url('company/certstaff/'.$joincourse->student_id.'/'.$joincourse->course_id.'/th') }}">Cert TH</a>
                            <a class='btn btn-primary' href="{{ url('company/certstaff/'.$joincourse->student_id.'/'.$joincourse->course_id.'/en') }}">Cert EN</a>
                        @endforeach
                      @endif
                      </td>
                  </tr>
                @endforeach 
              </tbody>
            </table>
            <?php echo $pjcomstds->links(); ?>
              </div>
            </div>
          </div>
        </div>
@endsection