 @extends('layouts.student')

@section('content')
        <div class="content-wrapper">
            <h3>แก้ไขข้อมูลพนักงานโรงแรม {{ $company->name }}</h3>
          <div class="row">
              <form action="{{ url('student/settingAction/'.$student->id) }}"  class="forms-sample" method="POST"  enctype="multipart/form-data">
            @csrf
             <div class='row'>
                    <div class="form-group col-6">
                      <label for="fname">ชื่อ (ไทย)</label>
                      <input name="fname" type="text" class="form-control" placeholder="ชื่อ (ไทย)" value="{{$student->fname}}">
                    </div>
                    <div class="form-group col-6">
                      <label for="lname">นามสกุล (ไทย)</label>
                      <input name="lname" type="text" class="form-control" placeholder="นามสกุล (ไทย)" value="{{$student->lname}}">
                    </div>
            </div>

             <div class='row'>
                    <div class="form-group col-6">
                      <label for="fname_en">ชื่อ (อังกฤษ)</label>
                      <input name="fname_en" type="text" class="form-control" placeholder="ชื่อ (อังกฤษ)" value="{{$student->fname_en}}">
                    </div>
                    <div class="form-group col-6">
                      <label for="lname_en">นามสกุล (อังกฤษ)</label>
                      <input name="lname_en" type="text" class="form-control" placeholder="นามสกุล (อังกฤษ)" value="{{$student->lname_en}}">
                    </div>
                    
                  <div class="form-group col-6">
                    <label for="sex">เพศ</label>
                      @if (isset($student->sex))
                      {!! Form::select('sex',['ชาย'=>'ชาย','หญิง'=>'หญิง','ไม่ระบุ'=>'ไม่ระบุ'],$student->sex,['class' => 'form-control','id'=>'sex','placeholder'=>'เพศ']) !!}
            
                      @else
                      {!! Form::select('sex',['ชาย'=>'ชาย','หญิง'=>'หญิง','ไม่ระบุ'=>'ไม่ระบุ'],old('sex'),['class' => 'form-control','id'=>'sex','placeholder'=>'เพศ']) !!}
            
                      @endif
                            </div>
            </div>
            <div class='row'>
                    <div class="form-group col-6">
                      <label for="idcard">เลขบัตรประชาชน</label>
                      <input name="idcard" type="text" class="form-control" placeholder="เลขบัตรประชาชน" value="{{$student->idcard}}">
                    </div>
                    <div class="form-group col-6">
                      <label for="mobile">เบอร์โทรศัพท์</label>
                      <input name="mobile" type="text" class="form-control" placeholder="เบอร์โทรศัพท์" value="{{$student->mobile}}">
                    </div>
            </div>
            <div class='row'>
                    <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary mr-2">บันทึกข้อมูล</button>
                    </div>
            </div>
        </form>
          </div>
        </div>
@endsection