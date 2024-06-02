 @extends('layouts.register')

 @section('content')
 <h1 style="font-size: 4rem;">
    สมาชิกสถานประกอบการ {{ $projectcompany->company->name }}<br/>ลงทะเบียนเข้าร่วมโครงการ<br/>{{ $projectcompany->project->name }}</h1>
 <p>กรุณาใส่ข้อมูลจริงเพื่อความถูกต้องของข้อมูล</p>
 <form action="{{ url('students/registerAction/'.$projectcompany->id) }}" id="regiterstudentfrm" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="col-md-12 col-sm-12">
         <div class="block">
             <div class="form-group col-md-6 col-sm-12">
                 <input name="fname" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="ชื่อภาษาไทย" value="{{ old('fname') }}">
                 @error('fname')
                 <div class="alert alert-danger">กรุณาใส่ชื่อภาษาไทย</div>
                 @enderror
             </div>
             <div class="form-group col-md-6 col-sm-12">
                 <input name="lname" type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="นามสกุลภาษาไทย"  value="{{ old('lname') }}">
                 @error('lname')
                 <div class="alert alert-danger">กรุณาใส่ขามสกุลภาษาไทย</div>
                 @enderror
             </div>
             <div class="form-group col-md-6 col-sm-12">
                <input name="fname_en" type="text" class="form-control @error('fname_en') is-invalid @enderror" placeholder="ชื่อภาษาอังกฤษ"  value="{{ old('fname_en') }}">
                @error('fname_en')
                <div class="alert alert-danger">กรุณาใส่ชื่อภาษาอังกฤษ</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <input name="lname_en" type="text" class="form-control @error('lname_en') is-invalid @enderror" placeholder="นามสกุลภาษาอังกฤษ"  value="{{ old('lname_en') }}">
                @error('lname_en')
                <div class="alert alert-danger">กรุณาใส่นามสกุลภาษาอังกฤษ</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12">
                {!! Form::select('sex',['ชาย'=>'ชาย','หญิง'=>'หญิง','ไม่ระบุ'=>'ไม่ระบุ'],old('sex'),['class' => 'form-control','id'=>'sex','placeholder'=>'เพศ']) !!}
            
            @error('sex')
            <div class="alert alert-danger">กรุณาใส่เพศ</div>
            @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="เบอร์มือถือ"  value="{{ old('mobile') }}">
                @error('mobile')
                <div class="alert alert-danger">กรุณาใส่เบอร์มือถือ</div>
                @enderror
            </div>
             <div class="form-group col-md-6 col-sm-12">
                <label for="birth">วันเกิด</label>
                 <input name="birth" type="date" class="form-control @error('birth') is-invalid @enderror" placeholder="วันเกิด"  value="{{ old('birth') }}">
                 @error('birth')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             
         </div>
     </div>
     <div class="col-md-12">
     <button class="g-recaptcha btn btn-default" 
        data-sitekey="{{ config('app.recapkey', '') }}" 
        data-callback='onSubmit' 
        data-action='submit' >ลงทะเบียน/register</button>
     </div>
 </form>
 @endsection