@extends('layouts.login2')

@section('content')
<form method="POST" action="{{ route('login') }}" class="pt-3">
  @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">เข้าสู่ระบบ</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox"  id='remember' name='remember' class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="{{ url('/students/forgotpass') }}" class="auth-link text-black">เรีบกดูข้อมูลเข้าระบบของนักเรียน</a>
                </div>
              </form>
               
@endsection
