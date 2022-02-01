@extends('layouts.admin')

@section('content')
<div class="pagetitle">
      <h1>Company Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item active">Company Type</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
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
                    <td></td>
                  </tr>
                @endforeach
                 
</tbody>
</table>
          </div>
        </div>
      </div>

@endsection