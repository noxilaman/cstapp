 @extends('layouts.register')

 @section('content')
 <h1>เรียกดูข้อมูลเข้าระบบ</h1>
 <p>We will be here soon. Please Stay in Touch</p>
 <form action="{{ url('students/forgotpassAction/') }}" id="regiterstudentfrm" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <input name="birth" type="date" class="form-control @error('birth') is-invalid @enderror" placeholder="วันเกิด" value="{{ old('birth') }}">
                 @error('birth')
                 <div class="alert alert-danger">กรุณาใส่วันเกิดที่ถูกต้อง</div>
                 @enderror
             </div>
         </div>
     </div>
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <input name="tel" type="text" class="form-control @error('tel') is-invalid @enderror" placeholder="เบอร์ติดต่อ"  value="{{ old('tel') }}">
                 @error('tel')
                 <div class="alert alert-danger">กรุณาใส่เบอร์โทร</div>
                 @enderror
             </div>
         </div>
     </div>
     <div class="col-md-12">
     <button class="g-recaptcha btn btn-default" 
        data-sitekey="{{ config('app.recapkey', '') }}" 
        data-callback='onSubmit' 
        data-action='submit' >ตรวจสอบ</button>
     </div>
 </form>
 @endsection