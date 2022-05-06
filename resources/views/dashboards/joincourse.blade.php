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
                                        <a href="{{ url('join/course/' . $projectcompstudent->id . '/' . $courseobj->id) }}">
                                            <div class="card-body">
                                                <p class=" ">หลักสูตร {{ $courseobj->name }}</p>
                                                <p>สถานะ:
                                                    @if (isset($joincourses[$courseobj->id]) && !empty($joincourses[$courseobj->id]))
                                                        ดำเนินการแล้ว
                                                        @if ($progress[$courseobj->id]['count'] > 0)
                                                            ({{ number_format(($progress[$courseobj->id]['pass'] * 100) / $progress[$courseobj->id]['count'], 0, '.', ',') }}
                                                            %)
                                                        @endif
                                                    @else
                                                        ยังไมไ่ด้เข้าใช้งาน
                                                    @endif
                                                </p>
                                            </div>
                                        </a>
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
