@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Company Type</h4>
        <p class="card-description">
          Company Type
        </p>
        <form action="{{ url('admin/company_types/') }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value=''>
                    </div>
                    <div class="form-group col-6">
                      <label for="name_en">Name Eng</label>
                      <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en' value=''>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'></textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="desc">Image</label>
                      {!! Form::file('image',array('class' =>'form_control','id'=>'image')) !!}
                     </div>
                    <div class="form-group col-3">
                      <label for="desc">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
                    <div class="form-group col-3">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>
        </form>
        </div>
    


@endsection