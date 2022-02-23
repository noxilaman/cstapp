 @extends('layouts.register')

@section('content')
<h1>ลงทะเบียนเข้าร่วม<br/>{{ $projectcompany->project->name }} ของบริษัท {{ $projectcompany->company->name }} </h1>
                    <p>We will be here soon. Please Stay in Touch</p>
   
                        <form action="{{ url('students/registerAction/'.$projectcompany->id) }}"  method="POST"  enctype="multipart/form-data">
                 @csrf
                        <div class="col-md-6 col-sm-12">
                    <div class="block">
                        <div class="form-group">
                            <input name="fname" type="text" class="form-control" placeholder="ชื่อ">
                        </div>
                        <div class="form-group">
                            <input name="lname" type="text" class="form-control" placeholder="นามสกุล">
                        </div>
                        <div class="form-group">
                            <input name="idcard" type="text" class="form-control" placeholder="เลขบัตรประชาชน">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block">
                        <div class="form-group">
                            <input name="fname_en" type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <input name="lname_en" type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <input name="mobile" type="text" class="form-control" placeholder="เบอร์มือถือ">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    
                        <button class="btn btn-default" type="submit">ลงทะเบียน/register</button>
                </div>
            </form>
            @endsection