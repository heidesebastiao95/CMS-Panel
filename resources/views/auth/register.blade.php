@extends('auth.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Register</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" required>
        </div>

          <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
    <div class="form-group">
      <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
    </div>
    <div class="form-group">
        <input id="password-field" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      </div>
    <div class="form-group">
        <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
    </div>
    <div class="form-group d-md-flex">
        <div class="w-50">
           
            <div class="w-50 text-md-right">
                <a href="{{ route('login') }}" style="color: #fff">Login</a>
            </div>
        </div>
  </form>
  </div>
    </div>
</div>
@endsection
