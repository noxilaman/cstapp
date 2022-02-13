@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company Type </h4>
        <p class="card-description">
          Company Type
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Desc</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companytypes as $companytype)
                <tr>
                    <th scope="row">{{ $companytype->id }}</th>
                    <td>{{ $companytype->name }}</td>
                    <td>{{ $companytype->desc }}</td>
                    <td>{{ $companytype->status }}</td>
                    <td>
                        <a href="{{ url('/admin/company_types/'.$companytype->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/company_types/'.$companytype->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/company_types/'.$companytype->id) }}" method="POST">
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
          </div>
        </div>
    


@endsection