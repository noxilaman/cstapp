@extends('layouts.certdemo')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <canvas id="myCanvas" width="600" height="700"
style="border:1px solid #000000;">
@if ($lang == 'th')
    @if(!empty($course->cert_img_th))
                      <img  id='scream' src="{{ url($course->cert_img_th) }}" width="100px" />
                      @endif
@else
    @if(!empty($course->cert_img_en))
                      <img id='scream' src="{{ url($course->cert_img_en) }}" width="100px" />
                      @endif
@endif

<img id='logo' src="/logo/demo.jpg" width="100px" />

                      
</div>
@endsection