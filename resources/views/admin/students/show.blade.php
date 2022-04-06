@extends('layouts.admin2')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Show Staff</h4>
                <p class="card-description">
                    Company
                </p>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="company_type_id">ชื่อ ภาษาไทย :</label>
                        {{ $student->fname }}
                    </div>
                    <div class="form-group col-6">
                        <label for="contact_name">นามสกุล ภาษาไทย :</label>
                        {{ $student->lname }}
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group col-6">
                        <label for="company_type_id">ชื่อ ภาษาอังกฤษ :</label>
                        {{ $student->fname_en }}
                    </div>
                    <div class="form-group col-6">
                        <label for="contact_name">นามสกุล ภาษาอังกฤษ :</label>
                        {{ $student->lname_en }}
                    </div>
                </div>

                <div class='row'>
                  <div class="form-group col-6">
                      <label for="company_type_id">เลขบัตรประชาชน :</label>
                      {{ $student->idcard }}
                  </div>
                  <div class="form-group col-6">
                      <label for="contact_name">เบอร์มือถือ :</label>
                      {{ $student->mobile }}
                  </div>
              </div>
              <div class='row'>
                <div class="form-group col-6">
                    <label for="company_type_id">user :</label>
                    {{ $student->uname }}
                </div>
                <div class="form-group col-6">
                    <label for="contact_name">pass :</label>
                    {{ $student->upass }}
                </div>
            </div>
            </div>
        @endsection
