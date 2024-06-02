@extends('layouts.registerstudent')

@section('content')
<section class="cpn-regis py-5">
  <div class="container ">
    <div class="row">
<div class="col-12 col-lg-7 m-auto text-center ">
  <h2 class="text-center pb2">VDO Presentation "Child Safe Friendly Tourism"</h2>
</div>
<div class="col-12">
<div class="embleyt" data-mce-style="margin: 0 auto; width: 60%;">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"
      src="https://www.youtube.com/embed/hM2BtjyZjts"
      data-mce-src="https://www.youtube.com/embed/hM2BtjyZjts">

    </iframe>
  </div>
</div>
</div>

<div class="col-12 col-lg-9 m-auto text-center py-5 pb-2">
  <p>
    โครงการส่งเสริมธุรกิจท่องเที่ยวที่ปลอดภัยและเป็นมิตรต่อเด็ก <b class="themefontb1">“Child Safe Friendly Tourism”</b>
    ดำเนินการโครงการโดยเครือข่ายภาครัฐ องค์กรพัฒนาเอกชน และภาคธุรกิจ
    โดยมีความมุ่งหมายให้สถานประกอบการโรงแรมและบุคลากรได้รับการพัฒนาศักยภาพเกี่ยวกับการคุ้มครองเด็ก,
    การป้องกันปัญหาการค้ามนุษย์และการแสวงหาประโยชน์ทางเพศจากเด็กทุกรูปแบบ
  </p>
</div>
</div>
</div> 
</section>
<section class="register-form">
  <div class="container ">
    <div class="row">
      <div class="col-12 col-lg-9 m-auto">
<form action="{{ url('companies/registerAction/'.$project->id) }}" id="regiterstudentfrm"  method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-12 pb-2 ">
      <h3>ข้อมูลสถานประกอบการ</h3>
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="contact_name">ประเภทสถานประกอบการ*</label>
      {!! Form::select('company_type_id',$companytypelist,null,['required'=>'required','class' => 'form-control','id'=>'company_type_id','placeholder'=>'====Select====']) !!}
      @error('company_type_id')
      <div class="alert alert-danger">กรุณาประเภทสถานประกอบการ</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="name">ชื่อสถานประกอบการ (ภาษาไทย)*</label>
      <input type="text" class="form-control" id="name" placeholder="Name" name='name' value='{{ old('name') }}' required />
      @error('name')
      <div class="alert alert-danger">กรุณาใส่ชื่อสถานประกอบการไทย</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="name_en">ชื่อสถานประกอบการ (ภาษาอังกฤษ)*</label>
      <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en' value='{{ old('name_en') }}' required />
      @error('name_en')
      <div class="alert alert-danger">กรุณาใส่ชื่อชื่อสถานประกอบการEng</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="addr">ที่อยู่สถานประกอบการ  (เลขที่)*</label>
      <input type="text" class="form-control" id="addr" placeholder="เลขที่" name='addr' value='{{ old('addr') }}' required />
      @error('addr')
      <div class="alert alert-danger">กรุณาใส่เลขที่</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="addr2">หมู่ที่</label>
      <input type="text" class="form-control" id="addr2" placeholder="หมู่ที่" name='addr2' value='{{ old('addr2') }}'>
      @error('addr2')
      <div class="alert alert-danger">กรุณาใส่หมู่ที่</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="tumbon">ตำบล*</label>
      <input type="text" class="form-control" id="tumbon" placeholder="ตำบล" name='tumbon' value='{{ old('tumbon') }}' required>
      @error('tumbon')
      <div class="alert alert-danger">กรุณาใส่ตำบล*</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="city">อำเภอ*</label>
      <input type="text" class="form-control" id="city" placeholder="อำเภอ" name='city' value='{{ old('city') }}' required>
      @error('city')
      <div class="alert alert-danger">กรุณาใส่อำเภอ*</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="province">จังหวัด*</label>
      <input type="text" class="form-control" id="province" placeholder="จังหวัด" name='province' value='{{ old('province') }}' required>
      @error('province')
      <div class="alert alert-danger">กรุณาใส่จังหวัด*</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="country">รหัสไปรษณีย์*</label>
      <input type="text" class="form-control" id="country" placeholder="รหัสไปรษณีย์" name='country' value='{{ old('country') }}' required>
      @error('country')
      <div class="alert alert-danger">กรุณาใส่รหัสไปรษณีย์*</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="tel">หมายเลขโทรศัพท์ของสถานประกอบการ*</label>
      <input type="text" class="form-control" id="tel" placeholder="เบอร์ติดต่อ" name='tel' value='{{ old('tel') }}' required>
      @error('tel')
      <div class="alert alert-danger">กรุณาใส่เบอร์ติดต่อโรงแรม</div>
      @enderror
    </div>
    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="website">Website </label>
      <input type="text" class="form-control" id="website" placeholder="Website" name='website' value='{{ old('website') }}'>
      @error('website')
      <div class="alert alert-danger">กรุณาใส่Website</div>
      @enderror
    </div>

    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="desc">ข้อมูลของสถานประกอบการเพื่อการประชาสัมพันธ์ </label>
      <textarea class="form-control" id="desc" rows="4" name='desc' placeholder="โปรดระบุรายละเอียด อาทิ สิ่งอำนวยความสะดวก และการบริการของโรงแรม ">{{ old('desc') }}</textarea>
      @error('desc')
      <div class="alert alert-danger">กรุณาใส่รายละเอียดโรงแรม</div>
      @enderror
    </div>

    
    <div class="col-12  form-group col-md-6 pb-2">
      <label for="logo_file">Logo</label>
      {!! Form::file('logo_file',array('class' =>'form_control','id'=>'logo_file')) !!}
    </div>
    
    <div class="col-12 col-md-12 bd-t ">
      <h3>ข้อมูลในการติดต่อประสานงาน</h3>
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="contact_name">ชื่อ-สกุล ผู้ประสานงาน*</label>
      <input type="text" class="form-control" id="contact_name" placeholder="ชื่อ-สกุล ผู้ประสานงาน" name='contact_name' value="{{ old('contact_name') }}">
      @error('contact_name')
      <div class="alert alert-danger">กรุณาใส่ข้อมูลชื่อ-สกุล ผู้ประสานงาน</div>
      @enderror
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="contact_sex">เพศ*</label>
        {!! Form::select('contact_sex',['ชาย'=>'ชาย','หญิง'=>'หญิง','ไม่ระบุ'=>'ไม่ระบุ'],old('contact_sex'),['class' => 'form-control','id'=>'company_type_id','placeholder'=>'====Select====']) !!}
     
      @error('contact_sex')
      <div class="alert alert-danger">กรุณาใส่เพศ</div>
      @enderror
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="contact_position">ตำแหน่ง</label>
      <input type="text" class="form-control" id="contact_position" placeholder="ตำแหน่ง" name='contact_position' value="{{ old('contact_position') }}">
      @error('contact_position')
      <div class="alert alert-danger">กรุณาใส่ข้อมูลผู้ติดต่อ</div>
      @enderror
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="contact_tel">เบอร์โทรศัพท์ผู้ประสานงาน*</label>
      <input type="text" class="form-control" id="contact_tel" placeholder="เบอร์โทรศัพท์ผู้ประสานงาน" name='contact_tel' value="{{ old('contact_tel') }}">
      @error('contact_name')
      <div class="alert alert-danger">กรุณาใส่เบอร์โทรศัพท์ผู้ประสานงาน</div>
      @enderror
    </div>
    <div class="col-12 col-md-6 pb-2">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="email" name='email' value='{{ old('email') }}'>
      @error('email')
      <div class="alert alert-danger">กรุณาใส่email</div>
      @enderror
    </div>
    <div class="col-12 form-group col-md-12 text-center py-5">
     <button class="g-recaptcha btn btn-primary mr-2" 
        data-sitekey="{{ config('app.recapkey', '') }}" 
        data-callback='onSubmit' 
        data-action='submit' >สมัครเข้าร่วมโครงการ</button>
    </div>
  </div>
</form>

</div>
</div>
</div>
</section>
@endsection