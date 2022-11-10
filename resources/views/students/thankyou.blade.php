 @extends('layouts.register')

@section('content')
<h1>ขอบคุณที่ลงทะบียน {{ $pjcomstd->project->name }}</h1>
<h1>ของโรงแรม{{ $pjcomstd->company->name }} </h1>
                    <p>กรุณาCapหน้าจอมือถือ หรือ จด User / Pass เพื่อใช้ในการเข้าระบบครั้งต่อไป</p>
                        <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <div class="form-group">
                            <h3>User : {{ $studentdata->uname }}</h3>
                        </div>
                        <div class="form-group">
                            <h3>Password : {{ $studentdata->upass }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="{{ url('home') }}" class="btn btn-default" >เข้าสู่่ระบบ</a>
                </div>


            </form>
            @endsection