 @extends('layouts.register')

@section('content')
<h1>ขอบคุณที่ลงทะบียน<br/>{{ $pjcomstd->project->name }} ของบริษัท {{ $pjcomstd->company->name }} </h1>
                    <p>กรุณาCapหน้าจอมือถือ หรือ จด User / Pass เพื่อใช้ในการเข้าระบบครั้งต่อไป</p>
                        <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <div class="form-group">
                            User : {{ $studentdata->uname }}
                        </div>
                        <div class="form-group">
                            Password : {{ $studentdata->upass }}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="{{ url('home') }}" class="btn btn-default" >เข้าสู่่ระบบ</a>
                </div>


            </form>
            @endsection