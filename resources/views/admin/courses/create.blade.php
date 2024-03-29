@extends('layouts.admin2')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Course</h4>
                <p class="card-description">
                    Company
                </p>
                <form action="{{ url('admin/courses/') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class='row'>
                        <div class="form-group col-6">
                            <label for="project_id">Project</label>
                            {!! Form::select('project_id', $projectlist, null, [
                                'class' => 'form-control',
                                'id' => 'project_id',
                                'placeholder' => '====Select====',
                            ]) !!}
                        </div>
                        <div class="form-group col-6">
                            <label for="seq">Seq</label>
                            <input type="number" class="form-control" id="seq" placeholder="seq" name='seq'
                                value='1'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name='name'
                                value=''>
                        </div>
                        <div class="form-group col-6">
                            <label for="status">Status</label>
                            {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
                                'class' => 'form_control',
                                'id' => 'status',
                            ]) !!}

                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-12">
                            <label for="desc">Desc</label>
                            <textarea class="form-control" id="desc" rows="4" name='desc'></textarea>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-6">
                            <label for="cert_en_file">Certificate template English</label>
                            <input type="file" class="form-control" id="cert_en_file" placeholder="Name"
                                name='cert_en_file'>
                        </div>
                        <div class="form-group col-6">
                            <label for="cert_th_file">Certificate template Thai</label>
                            <input type="file" class="form-control" id="cert_th_file" placeholder="Name"
                                name='cert_th_file'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="form-group col-6">
                            <label for="cert_en_file">Link Clip</label>
                            <input type="text" class="form-control" id="link_clip" placeholder="Clip"
                                name='link_clip'>
                        </div>
                    </div>

                    <div class='row'>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        @endsection
