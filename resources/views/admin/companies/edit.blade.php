@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Company # {{ $company->id }}</h4>
        <p class="card-description">
          Company
        </p>
        <form action="{{ url('admin/companies/'.$company->id) }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class='row'>
                    <div class="form-group col-6">
                      <label for="company_type_id">ประเภท</label>
                      {!! Form::select('company_type_id',$companytypelist,$company->company_type_id,['class' => 'form-control','id'=>'company_type_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="form-group col-6">
                      <label for="contact_name">Contact Name</label>
                      <input type="text" class="form-control" id="contact_name" placeholder="contact name" name='contact_name' value='{{ $company->contact_name }}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{ $company->name }}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="name_en">Name Eng</label>
                      <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en' value='{{ $company->name_en }}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'>{{ $company->desc }}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="addr">ที่อยู่</label>
                      <textarea class="form-control" id="addr" rows="4" name='addr'>{{ $company->addr }}</textarea>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="province">จังหวัด</label>
                      <input type="text" class="form-control" id="province" placeholder="province" name='province' value='{{ $company->province }}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="country">ประเทศ</label>
                      <input type="text" class="form-control" id="country" placeholder="country" name='country' value='{{ $company->country }}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="tel">Tel</label>
                      <input type="text" class="form-control" id="tel" placeholder="tel" name='tel' value='{{ $company->tel }}'>
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" placeholder="email" name='email' value='{{ $company->email }}'>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'$company->email')) !!}
                      @if(!empty($company->image))
                      <img  src="{{ url($company->image) }}" width="100px" />
                      @endif
                     </div>
                    <div class="form-group col-6">
                      <label for="logo_file">Logo</label>
                      {!! Form::file('logo_file',array('class' =>'form_control','id'=>'logo_file')) !!}
                     @if(!empty($company->logo))
<img  src="{{ url($company->logo) }}" width="100px" />
                      @endif
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="desc">Status</label>
                      {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$company->status,array('class' =>'form_control','id'=>'status')) !!}
                       
                    </div>
                    <div class="form-group col-6">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
            </div>
        </form>
        </div>
    


@endsection