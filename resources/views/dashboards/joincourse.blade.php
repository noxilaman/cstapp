@extends('layouts.student')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <h3>ข้อมูลการเรียนรู้</h3>
                </div>
                <div class='row'>
                    <div class='col-md-12  card card-tale'>
                        <div class='row'>
                            <div class="col-md-12 ">
                                <div class="card-body">
                                    <p class="mb-4 fs-30">โครงการ: {{ $project->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($courses as $courseobj)
                        <div class='col-md-6 mtl-2 p-2'>

                            <div class='card card-tale'>
                                <div class='row'>
                                    <div class="col-md-12">
                                        
                                            <div class="card-body">
                                                <div class='row'>
                                                    <div class="col-md-5">
                                                        <a href="{{ url('join/course/' . $projectcompstudent->id . '/' . $courseobj->id) }}">
                                                        <img src="{{ asset('img/ico-book.png') }}" alt=""
                                                            srcset="" width="150px">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <a href="{{ url('join/course/' . $projectcompstudent->id . '/' . $courseobj->id) }}">
                                                        <p class="p-2" style="font-size:2vw;">หลักสูตร
                                                            {{ $courseobj->name }}</p>
                                                        </a>
                                                        <p class="p-2" style="font-size:1.5vw;">สถานะ:
                                                            @if (isset($joincourses[$courseobj->id]) && !empty($joincourses[$courseobj->id]))
                                                                @if ($joincourses[$courseobj->id]->progress == 'Pass')
                                                                    ผ่านหลักสูตร
                                                                    <br/>
                                                                    <a class="btn btn-success" href="{{ url('cert/en/' . $joincourses[$courseobj->id]->hashkey) }}" target="_blank">ใบประกาศ Eng</a>
                                                                    <a class="btn btn-success" href="{{ url('cert/th/' . $joincourses[$courseobj->id]->hashkey) }}" target="_blank">ใบประกาศ ไทย</a>
                                                                @else
                                                                    ดำเนินการแล้ว
                                                                @if ($progress[$courseobj->id]['count'] > 0)
                                                                    ({{ number_format(($progress[$courseobj->id]['pass'] * 100) / $progress[$courseobj->id]['count'], 0, '.', ',') }}
                                                                    %)
                                                                @endif
                                                                @endif

                                                                
                                                            @else
                                                                ยังไมไ่ด้เข้าใช้งาน
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
