 @extends('layouts.register')

 @section('content')
 <h1>ลงทะเบียนเข้าร่วม<br />{{ $projectcompany->project->name }} ของบริษัท {{ $projectcompany->company->name }} </h1>
 <p>We will be here soon. Please Stay in Touch</p>
 <form action="{{ url('students/registerAction/'.$projectcompany->id) }}" id="regiterstudentfrm" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <input name="fname" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="ชื่อ" value="{{ old('fname') }}">
                 @error('fname')
                 <div class="alert alert-danger">กรุณาใส่ชื่อภาษาไทย</div>
                 @enderror
             </div>
             <div class="form-group">
                 <input name="lname" type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="นามสกุล"  value="{{ old('lname') }}">
                 @error('lname')
                 <div class="alert alert-danger">กรุณาใส่ขามสกุลภาษาไทย</div>
                 @enderror
             </div>
             <div class="form-group">
                 <input name="idcard" type="text" class="form-control @error('idcard') is-invalid @enderror" placeholder="เลขบัตรประชาชน"  value="{{ old('idcard') }}">
                 @error('idcard')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>
     </div>
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <input name="fname_en" type="text" class="form-control @error('fname_en') is-invalid @enderror" placeholder="First name"  value="{{ old('fname_en') }}">
                 @error('fname_en')
                 <div class="alert alert-danger">กรุณาใส่ชื่อภาษาอังกฤษ</div>
                 @enderror
             </div>
             <div class="form-group">
                 <input name="lname_en" type="text" class="form-control @error('lname_en') is-invalid @enderror" placeholder="Last name"  value="{{ old('lname_en') }}">
                 @error('lname_en')
                 <div class="alert alert-danger">กรุณาใส่นามสกุลภาษาอังกฤษ</div>
                 @enderror
             </div>
             <div class="form-group">
                 <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="เบอร์มือถือ"  value="{{ old('mobile') }}">
                 @error('mobile')
                 <div class="alert alert-danger">กรุณาใส่เบอร์มือถือ</div>
                 @enderror
             </div>
         </div>
     </div>
     <div class="col-md-12">
     <button class="g-recaptcha btn btn-default" 
        data-sitekey="6Ldbc0ofAAAAAJCSPnt-Yot57M_rQqpVHtKSjpBy" 
        data-callback='onSubmit' 
        data-action='submit' >ลงทะเบียน/register</button>
     </div>
 </form>
 @endsection