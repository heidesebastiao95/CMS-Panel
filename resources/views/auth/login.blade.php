@extends('auth.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Login</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
      <h3 class="mb-4 text-center">Have an account?</h3>
      <form method="POST" action="{{ route('login') }}">
        @csrf
          <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>
    <div class="form-group">
      <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
    </div>
    <div class="form-group">
        <button type="submit" class="form-control btn btn-primary submit px-3">Log In</button>
    </div>
    <div class="form-group d-md-flex">
        <div class="w-50">
            <label class="checkbox-wrap checkbox-primary">Remember Me
                          <input type="checkbox" name="remember">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="{{ route('register') }}" style="color: #fff">Register</a>
                    </div>
    </div>
  </form>
  </div>
    </div>
</div>
@endsection
