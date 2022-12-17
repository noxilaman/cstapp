@extends('layouts.publiccert')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <canvas id="myCanvas" width="900" height="1273" style="border:1px solid #000000;">
            @if ($lang == 'th')
                @if (!empty($course->cert_img_th))
                    <img id='scream' src="{{ url($course->cert_img_th) }}" width="100px" />
                @endif
            @else
                @if (!empty($course->cert_img_en))
                    <img id='scream' src="{{ url($course->cert_img_en) }}" width="100px" />
                @endif
            @endif
            @if (isset($company->logo))
                <img id='logo' src="{{ url($company->logo) }}" width="100px" />
            @else
                <img id='logo' src="/logo/demo.jpg" width="100px" />
            @endif
            @if (isset($student))
                @if ($lang == 'th')
                    <input type="hidden" value="{{ $student->fname }} {{ $student->lname }}" id="cert_name" />
                @else
                    <input type="hidden" value="{{ $student->fname_en }} {{ $student->lname_en }}" id="cert_name" />
                @endif
            @else
                @if (isset($company->contact_name))
                    <input type="hidden" value="{{ $company->contact_name }}" id="cert_name" />
                @else
                    <input type="hidden" value="ทดสอบ นามสกุล" id="cert_name" />
                @endif
            @endif
            <input type="hidden" value="15 มกราคม 2565" id="cert_date" />
    </div>
@endsection
