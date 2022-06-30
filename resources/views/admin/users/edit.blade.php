@extends('admin.layouts.app')

@section('cards') @endsection

@section('content')
    <div class="card">
        <div class="row">
            
                <div class="col-md-4  mt-5 " style="padding-left:30px ">
                    <div class="card">
                    <form action="{{ route('updateUserPhoto',$user->id) }}" method="post" enctype="multipart/form-data" id="form-user-edit">
                        @csrf
                        @method('PUT')

                     <div class="avatar profile-foto">
                         <img src="{{ url('images/'.$user->img) }}" alt="" srcset="">        
                      </div> 
                      <div class="col-md-6 col-12" style="display: none">
                        <label for="formFileSm" class="form-label">
                                Schoose your foto
                        </label>
                        <input class="form-control form-control-sm" id="user-photo-edit" type="file" name="user_photo" onchange="imageSelected('form-user-edit')">
                    </div>

                      <div class="card-body pl-6">
                        <a  class="btn  btn-primary" id="btn-photo" onclick="trigger_photo(this,'user-photo-edit')">Choose your photo</a>
                      </div>
                      
                    </form>
                    </div>
                </div>
            
            
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title">Edit Profile</h4> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" id="form-edit">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical"> Name</label>
                                                <input type="text" id="user-name-edit" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Username</label>
                                                    <input type="text" id="user-username-edit" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}">
                                                </div>
                                            </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Email</label>
                                                <input type="email" id="user-email-edit" class="form-control" name="email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Current Password</label>
                                                <input type="password" id="user-password-edit" class="form-control @error('password') is-invalid @enderror" name="password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">New Password</label>
                                                <input type="password" id="user-new-password-edit" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Role</label>
                                                    <fieldset class="form-group">
                                                            <select class="form-select" id="user-role-edit" name="role">
                                                                <option>{{ $user->role }}</option>
                                                                <option>{{ $user->role =='admin'?'user':'admin' }}</option>
                                                            </select>
                                                        </fieldset>
                                                </div>
                                            </div>
                                            <div class=" col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Gender</label>
                                                    <fieldset class="form-group">
                                                            <select class="form-select" name="gender" id="user-gender-edit" name="gender">
                                                                <option>{{ $user->gender }}</option>
                                                                {{-- <option>M</option> --}}
                                                                <option>{{ $user->gender =='M'?'F':'M' }}</option>
                                                            </select>
                                                        </fieldset>
                                                </div>
                                            </div>
                                            <div class=" col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Phone</label>
                                                    <input type="text"  class="form-control" name="phone" id="user-phone-edit" name="phone" value="{{ $user->phone_namber }}">
                                                </div>
                                            </div>
                                        <div class="col-12 d-flex justify-content-end pt-3">
                                            <button class="btn btn-primary ml-1" type="button">
                                                <span id="user-submit-edit" onclick="user_update(this,'{{ route('users.update',$user->id) }}')">Save</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="alert alert-light-success color-success col-12 ml-2"  id="user-success-edit" style="display: none"><i class="bi bi-check-circle"></i> 
                                        Successfuly.
                                    </div>
                                    <div class="alert alert-light-danger color-danger col-12 ml-2"  id="user-error-edit" style="display: none"><i class="bi bi-exclamation-circle"></i> 
                                       <span id="error-message-edit"> This is danger alert</span> .
                                    </div>
                                </div>
                            </div>

                            {{-- @if ($errors->any())
                                <div class="text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @isset($error)
                            <div class="text-danger">
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            </div>
                            @endisset
                            @isset($messge)
                            <div class="text-danger">
                                <ul>
                                    <li>{{ $message }}</li>
                                </ul>
                            </div>
                            @endisset --}}
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


@endsection

