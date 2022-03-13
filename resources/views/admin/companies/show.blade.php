@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Show Company # {{ $company->id }}</h4>
        <p class="card-description">
          Company
        </p>
             <div class='row'>
                    <div class="form-group col-6">
                      <label for="company_type_id">ประเภท : {{$company->companytype->name}}</label></div>
                    <div class="form-group col-6">
                      <label for="contact_name">Contact Name : {{ $company->contact_name }}</label></div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="name">Name : {{ $company->name }}</label>
                    </div>
                    <div class="form-group col-6">
                      <label for="name_en">Name Eng : {{ $company->name_en }}</label>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="desc">Desc</label><br/>{!! $company->desc !!}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                      <label for="addr">ที่อยู่</label><br/>{!! $company->addr !!}
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="province">จังหวัด : {{ $company->province }}</label>
                    </div>
                    <div class="form-group col-6">
                      <label for="country">ประเทศ : {{ $company->country }}</label>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="tel">Tel : {{ $company->tel }}</label>
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email : {{ $company->email }}</label>
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="image_file">Image</label>
                      @if(!empty($company->image))
                      <img  src="{{ url($company->image) }}" width="100px" />
                      @endif
                     </div>
                    <div class="form-group col-6">
                      <label for="logo_file">Logo</label>
                     @if(!empty($company->logo))
<img  src="{{ url($company->logo) }}" width="100px" />
                      @endif
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="desc">Status : {{$company->status}}</label>
                       
                    </div>
                   
            </div>
   
        </div>
    

@endsection