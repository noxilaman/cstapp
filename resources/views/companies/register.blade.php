@extends('layouts.registerstudent')

@section('content')
<form action="{{ url('companies/registerAction/'.$project->id) }}" id="regiterstudentfrm"  method="POST" enctype="multipart/form-data">
  @csrf

  <div class="row">
    <div class="col-md-6">
      <label for="contact_name">ประเภท</label>
      {!! Form::select('company_type_id',$companytypelist,null,['class' => 'form-control','id'=>'company_type_id','placeholder'=>'====Select====']) !!}
      @error('company_type_id')
      <div class="alert alert-danger">กรุณาประเภทสถานประกอบการ</div>
      @enderror
    </div>
    <div class="col-md-6">
      <label for="contact_name">ผู้ติดต่อ</label>
      <input type="text" class="form-control" id="contact_name" placeholder="contact name" name='contact_name' value="{{ old('contact_name') }}">
      @error('contact_name')
      <div class="alert alert-danger">กรุณาใส่ข้อมูลผู้ติดต่อ</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="name">ชื่อสถานประกอบการ</label>
      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{ old('name') }}'>
      @error('name')
      <div class="alert alert-danger">กรุณาใส่ชื่อสถานประกอบการ</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="name_en">Company Name</label>
      <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en' value='{{ old('name_en') }}'>
      @error('name_en')
      <div class="alert alert-danger">กรุณาใส่ชื่อสถานประกอบการภาษาอังกฤษ</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="desc">รายละเอียด</label>
      <textarea class="form-control" id="desc" rows="4" name='desc'>{{ old('desc') }}</textarea>
      @error('desc')
      <div class="alert alert-danger">กรุณาใส่รายละเอียด</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="addr">ที่อยู่</label>
      <textarea class="form-control" id="addr" rows="4" name='addr'>{{ old('addr') }}</textarea>
      @error('addr')
      <div class="alert alert-danger">กรุณาใส่ที่อยู่</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="province">จังหวัด</label>
      <input type="text" class="form-control" id="province" placeholder="province" name='province' value='{{ old('province') }}'>
      @error('province')
      <div class="alert alert-danger">กรุณาใส่จังหวัด</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="country">ประเทศ</label>
      <input type="text" class="form-control" id="country" placeholder="country" name='country' value='{{ old('country') }}'>
      @error('country')
      <div class="alert alert-danger">กรุณาใส่ประเทศ</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="tel">Tel</label>
      <input type="text" class="form-control" id="tel" placeholder="tel" name='tel' value='{{ old('tel') }}'>
      @error('tel')
      <div class="alert alert-danger">กรุณาใส่Tel</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="email" name='email' value='{{ old('email') }}'>
      @error('email')
      <div class="alert alert-danger">กรุณาใส่email</div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="image_file">Image</label>
      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
    </div>
    <div class="form-group col-md-6">
      <label for="logo_file">Logo</label>
      {!! Form::file('logo_file',array('class' =>'form_control','id'=>'logo_file')) !!}
    </div>
    <div class="form-group col-md-12 text-center ">
     <button class="g-recaptcha btn btn-primary mr-2" 
        data-sitekey="{{ config('app.recapkey', '') }}" 
        data-callback='onSubmit' 
        data-action='submit' >สมัคร</button>
    </div>
  </div>
</form>
@endsection