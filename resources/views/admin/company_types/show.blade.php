@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Company Type # {{ $companytype->id }}</h4>
        <p class="card-description">
          Company Type
        </p>
        <div class="table-responsive">
          <table class="table">
            
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $companytype->id }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Name</th>
                    <td>{{ $companytype->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Desc</th>
                    <td>{{ $companytype->desc }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td>{{ $companytype->status }}</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
    


@endsection