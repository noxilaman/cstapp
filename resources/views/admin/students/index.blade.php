@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Student</h4>
        <p class="card-description">
          Student
        </p>
        <a href="{{url('admin/students/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">mobile</th>
                <th scope="col">company</th>
                <th scope="col">user/pass</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->fname }} {{ $student->lname }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>@foreach($student->projcompstudents()->get() as $projcompstudent)
                      {{ $projcompstudent->projectcompany->company->name ?? '-'}} 
                      @endforeach
                    </td>
                    <td>{{ $student->uname }} / {{ $student->upass }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        <a href="{{ url('/admin/students/'.$student->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/students/'.$student->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <br/><a href="{{ url('/admin/students/certdemo/'.$student->id.'/th') }}" class="btn btn-secondary">Cert Th</a>
                        <a href="{{ url('/admin/students/certdemo/'.$student->id.'/en') }}" class="btn btn-secondary">Cert En</a>
                        <form action="{{ url('/admin/students/'.$student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="delete" class="btn btn-danger">Delete
                        </button>
                      </form>
                      </td>
                  </tr>
                @endforeach 
              </tbody>
            </table>
            <?php echo $students->links(); ?>
          </div>
        </div>
    


@endsection