@extends('layouts.registerstudent')

@section('content')
                    <form action="{{ url('companies/registerAction/'.$project->id) }}"  method="POST"  enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                    <div class="col-md-6">
                        <label for="contact_name">ประเภท</label>
                      {!! Form::select('company_type_id',$companytypelist,null,['class' => 'form-control','id'=>'company_type_id','placeholder'=>'====Select====']) !!}
                    </div>
                    <div class="col-md-6">
                      <label for="contact_name">ผู้ติดต่อ</label>
                      <input type="text" class="form-control" id="contact_name" placeholder="contact name" name='contact_name' value=''>
                    </div> <div class="form-group col-md-6">
                      <label for="name">ชื่อสถานประกอบการ</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name_en">Company Name</label>
                      <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="desc">รายละเอียด</label>
                      <textarea class="form-control" id="desc" rows="4" name='desc'></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="addr">ที่อยู่</label>
                      <textarea class="form-control" id="addr" rows="4" name='addr'></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="province">จังหวัด</label>
                      <input type="text" class="form-control" id="province" placeholder="province" name='province' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="country">ประเทศ</label>
                      <input type="text" class="form-control" id="country" placeholder="country" name='country' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="tel">Tel</label>
                      <input type="text" class="form-control" id="tel" placeholder="tel" name='tel' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="email" name='email' value=''>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="image_file">Image</label>
                      {!! Form::file('image_file',array('class' =>'form_control','id'=>'image_file')) !!}
                     </div>
                    <div class="form-group col-md-6">
                      <label for="logo_file">Logo</label>
                      {!! Form::file('logo_file',array('class' =>'form_control','id'=>'logo_file')) !!}
                     </div>
                    <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">สมัคร</button>
                    </div>
            </div>
</form>
            @endsection