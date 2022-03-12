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
                <tr>
                    @php
                        $student = $pjcomstd->student;
                    @endphp
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->fname }} {{ $student->lname }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->uname }} / {{ $student->upass }}</td>
                    <td>{{ $student->status }}</td>
                    <td>{{ $pjcomstd->progress }}
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