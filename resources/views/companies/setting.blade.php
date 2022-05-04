 @extends('layouts.company')

 @section('content')
     <div class="content-wrapper">
         <h3>แก้ไขข้อมูล {{ $company->name }}</h3>
         <div class="row">
             <form action="{{ url('company/settingAction/' . $company->id) }}" class="forms-sample" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="company_type_id">ประเภท</label>
                         {!! Form::select('company_type_id', $companytypelist, $company->company_type_id, ['class' => 'form-control', 'id' => 'company_type_id', 'placeholder' => '====Select====']) !!}
                     </div>
                     <div class="form-group col-6">
                         <label for="contact_name">ผู้ติดต่อ</label>
                         <input type="text" class="form-control" id="contact_name" placeholder="contact name"
                             name='contact_name' value='{{ $company->contact_name }}'>
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="name">ชื่อสถานประกอบการภาษาไทย</label>
                         <input type="text" class="form-control" id="name" placeholder="Name" name='name'
                             value='{{ $company->name }}'>
                     </div>
                     <div class="form-group col-6">
                         <label for="name_en">ชื่อสถานประกอบการภาษาอังกฤษ</label>
                         <input type="text" class="form-control" id="name_en" placeholder="Name Eng" name='name_en'
                             value='{{ $company->name_en }}'>
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="province">เลขที่</label>
                         <input type="text" class="form-control" id="addr" placeholder="เลขที่" name='addr'
                             value='{{ $company->addr }}'>
                     </div>
                     <div class="form-group col-6">
                         <label for="country">หมู่ที่</label>
                         <input type="text" class="form-control" id="addr2" placeholder="หมู่ที่" name='addr2'
                             value='{{ $company->addr2 }}'>
                     </div>
                 </div>
                 <div class='row'>
                  <div class="form-group col-6">
                      <label for="province">ตำบล</label>
                      <input type="text" class="form-control" id="tumbon" placeholder="ตำบล" name='tumbon'
                          value='{{ $company->tumbon }}'>
                  </div>
                  <div class="form-group col-6">
                      <label for="country">อำเภอ</label>
                      <input type="text" class="form-control" id="city" placeholder="อำเภอ" name='city'
                          value='{{ $company->city }}'>
                  </div>
              </div>
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="province">จังหวัด</label>
                         <input type="text" class="form-control" id="province" placeholder="province" name='province'
                             value='{{ $company->province }}'>
                     </div>
                     <div class="form-group col-6">
                         <label for="country">ประเทศ</label>
                         <input type="text" class="form-control" id="country" placeholder="country" name='country'
                             value='{{ $company->country }}'>
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-12">
                         <label for="desc">รายละเอียดโรงแรม</label>
                         <textarea class="form-control" id="desc" rows="4" name='desc'>{{ $company->desc }}</textarea>
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-12">
                         <label for="additional">รายละเอียดเพิ่มเติม</label>
                         <textarea class="form-control" id="additional" rows="4" name='additional'>{{ $company->additional }}</textarea>
                     </div>
                 </div>

                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="tel">เบอร์ติดต่อ</label>
                         <input type="text" class="form-control" id="tel" placeholder="เบอร์ติดต่อ" name='tel'
                             value='{{ $company->tel }}'>
                     </div>
                     <div class="form-group col-6">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" id="email" placeholder="email" name='email'
                             value='{{ $company->email }}'>
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="image_file">Image</label><br />
                         {!! Form::file('image_file', ['class' => 'form_control', 'id' => 'image_file']) !!}
                         @if (!empty($company->image))
                             <img src="{{ url($company->image) }}" width="100px" />
                         @endif
                     </div>
                     <div class="form-group col-6">
                         <label for="logo_file">Logo</label><br />
                         {!! Form::file('logo_file', ['class' => 'form_control', 'id' => 'logo_file']) !!}
                         @if (!empty($company->logo))
                             <img src="{{ url($company->logo) }}" width="100px" />
                         @endif
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-12">
                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection
