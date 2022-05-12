@extends('layouts.student')

 @section('content')
     <div class="content-wrapper">
        <h3>ตั้งรหัสผ่านใหม่ ของพนักงานโรงแรม {{ $company->name }}</h3>
        <label for="">ไม่น้อยกว่า 6 ตัวอักขระ และไม่มากกว่า 20 ตัวอักขระ</label>
        <div class="row">
            <form action="{{ url('student/changepassAction/'.$student->id) }}" class="forms-sample" method="POST"
                 enctype="multipart/form-data">
                 @csrf
                 @foreach ($errors->all() as $error)
                    {{ $error }}
                 @endforeach
                 <div class='row'>
                     <div class="form-group col-6">
                         <label for="name">รหัสผ่านใหม่</label>
                         <input type="password" class="form-control" id="newpass" placeholder="" name='newpass'
                             value=''>
                             @error('newpass')
      <div class="alert alert-danger">กรุณาใส่จังหวัด</div>
      @enderror
                     </div>
                     <div class="form-group col-6">
                         <label for="name_en">รหัสผ่านใหม่อีกครั้ง</label>
                         <input type="password" class="form-control" id="newpass_confirmation" placeholder="" name='newpass_confirmation'
                             value=''>
                             @error('newpass_confirmation')
      <div class="alert alert-danger">กรุณาใส่จังหวัด</div>
      @enderror
                     </div>
                 </div>
                 <div class='row'>
                     <div class="form-group col-12">
                         <button type="submit" class="btn btn-primary mr-2">เปลี่ยนรหัสผ่าน</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection
