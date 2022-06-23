 @extends('layouts.register')

 @section('content')
 <h1>ข้อมูลเข้าระบบ</h1>
    @if (isset($message))
    <div class="col-md-12 col-sm-12">
        <div class="block">
            <div class="form-group">
                <h2>{{ $message }}</h2>
            </div>
        </div>
    </div>
    @else
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                 <h2>User : {{ $student->uname }}</h2>
             </div>
         </div>
     </div>
     <div class="col-md-6 col-sm-12">
         <div class="block">
             <div class="form-group">
                <h2>รหัสผ่าน : {{ $student->upass }}</h2>
             </div>
         </div>
     </div>
       
    @endif
    <div class="col-md-12">
         <a href="{{ url('/') }}" class="btn btn-success btn-xl" >หน้าหลัก</a>
     </div>  
 @endsection