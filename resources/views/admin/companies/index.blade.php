@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company </h4>
        <p class="card-description">
          Company
        </p>
        <a href="{{url('admin/companies/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Project</th>
                <th scope="col">user/pass</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->companytype->name }}</td>
                    <td>@foreach($company->projectcompanies()->get() as $projectcompany)
                      {{ $projectcompany->project->name }} 
                      @if ($company->status == 'Active')
                      <a href="{{ url('students/register/'.$projectcompany->id) }}" target="_blank">Link</a>
                      <a href="{{ url('students/qrcode/'.$projectcompany->id) }}" target="_blank">QRCODE</a>
                      @endif
                      @endforeach
                    </td>
                    <td>{{ $company->uname }} / {{ $company->upass }}</td>
                    <td>
                      @if ($company->status == 'Active')
                          <a href="{{url('/admin/companies/changestatus/'.$company->id.'/Inactive')}}" >
                      @else
                          <a href="{{url('/admin/companies/changestatus/'.$company->id.'/Active')}}" >
                      @endif
                    {{ $company->status }}</a>
                    </td>
                    <td>
                        <a href="{{ url('/admin/companies/'.$company->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/companies/'.$company->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <br/><a href="{{ url('/admin/companies/certdemo/'.$company->id.'/'.$course->id.'/th') }}" class="btn btn-secondary">Cert Th</a>
                        <a href="{{ url('/admin/companies/certdemo/'.$company->id.'/'.$course->id.'/en') }}" class="btn btn-secondary">Cert En</a>
                        <form action="{{ url('/admin/companies/'.$company->id) }}" method="POST">
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

            <?php echo $companies->links(); ?>
          </div>
        </div>
    


@endsection