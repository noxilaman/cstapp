 @extends('layouts.print')

 @section('content')
 <div class="row qrcodebg ">

    <div class="col-12  m-auto text-center" >
        <h2>โครงการ {{ $projectcompany->project->name }} </h2>
        <h1 >สมาชิกสถานประกอบการ {{ $projectcompany->company->name }}<br/>สมัครเข้าร่วมโครงการ</h1>
        <!--?xml version="1.0" encoding="UTF-8"?-->
        <div class="py-4 img-rounded">
        @php
                 $url = url('students/register/' . $projectcompany->id);
                 
             @endphp
             <img style="padding: 15px;background: #fff;border-radius: 5px;" src='data:image/svg+xml;base64,{!! base64_encode(QrCode::size(250)->format('svg')->generate($url)) !!}'>

 </div>
        <h2>สแกน QR-CODE เข้าร่วมโครงการ</h2>
    </div>

</div>
 @endsection
