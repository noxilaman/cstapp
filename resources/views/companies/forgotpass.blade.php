 @extends('layouts.register')

 @section('content')
 <h1>เรียกดูข้อมูลเข้าระบบ</h1>
 <p>We will be here soon. Please Stay in Touch</p>
 <form action="{{ url('companies/forgotpassAction/') }}" id="regiterstudentfrm" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <input name="birth" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('com_email') }}">
                 @error('com_email')
                 <div class="alert alert-danger">กรุณาสถานบริการ Email</div>
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