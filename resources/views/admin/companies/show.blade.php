@extends('layouts.admin2')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ข้อมูลสถานประกอบการ # {{ $company->id }}</h4>

                <p class="card-description">
                    สถานประกอบการ
                </p>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="company_type_id">ประเภทสถานประกอบการ : {{ $company->companytype->name }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="contact_name">ชื่อ-สกุล ผู้ประสานงาน : {{ $company->contact_name }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="name">ชื่อสถานประกอบการ (ภาษาไทย) : {{ $company->name }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="name_en">ชื่อสถานประกอบการ (ภาษาอังกฤษ) : {{ $company->name_en }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-12">
                        <label
                            for="desc">ข้อมูลของสถานประกอบการเพื่อการประชาสัมพันธ์</label><br />{!! $company->desc !!}
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="addr">ที่อยู่สถานประกอบการ (เลขที่)</label>{!! $company->addr !!}
                    </div>

                    <div class="form-group col-6">
                        <label for="province">หมู่ที่ : {{ $company->addr2 }}</label>
                    </div>
                </div>

                <div class='row'>
                    <div class="form-group col-6">
                        <label for="addr">ตำบล</label>{!! $company->tumbon !!}
                    </div>

                    <div class="form-group col-6">
                        <label for="province">อำเภอ : {{ $company->city }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="province">จังหวัด : {{ $company->province }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="country">รหัสไปรษณีย์ : {{ $company->country }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="tel">หมายเลขโทรศัพท์ของสถานประกอบการ : {{ $company->tel }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Website : {{ $company->website }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="image_file">Image</label>
                        @if (!empty($company->image))
                            <img src="{{ url($company->image) }}" width="100px" />
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label for="logo_file">Logo สถานประกอบการ (เป็นส่วนหนึ่งเพื่อใช้ประกอบใบประกาศนียบัตร)</label>
                        @if (!empty($company->logo))
                            <img src="{{ url($company->logo) }}" width="100px" />
                        @endif
                    </div>
                </div>
                <p class="card-description">
                    ข้อมูลในการติดต่อประสานงาน
                </p>

                <div class='row'>
                    <div class="form-group col-6">
                        <label for="tel">ชื่อ-สกุล ผู้ประสานงาน : {{ $company->contact_name }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">เพศ : {{ $company->contact_sex }}</label>
                    </div>
                </div>

                <div class='row'>
                    <div class="form-group col-6">
                        <label for="tel">ตำแหน่ง : {{ $company->contact_position }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">เบอร์โทรศัพท์ผู้ประสานงาน : {{ $company->contact_tel }}</label>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="tel">Email : {{ $company->email }}</label>
                    </div>
                    <div class="form-group col-6">
                        <label for="desc">Status : {{ $company->status }}</label>

                    </div>

                </div>

            </div>
        @endsection
