@extends('admin.layouts.app')

{{-- @section('cards') @endsection --}}

@section('content')
        <div class="card">
                <div class=" col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Post</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical"  action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Category</label>
                                                            <fieldset class="form-group">
                                                                    <select class="form-select" id="basicSelect" name="category">
                                                                        @foreach ($categories as $category)
                                                                        <option>{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                        </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Title</label>
                                                        <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                        <label for="formFileSm" class="form-label">
                                                                Schoose your foto
                                                        </label>
                                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="photo">
                                                </div>
                                                <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h6>Write your post</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group with-title mb-3">
                                                                    <textarea class="form-control" id="post-content" rows="10" name="content" defaultValue="sddfsdfsd"></textarea>
                                                                    <label>Your experience</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Post</button>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                        <div class="alert alert-light-danger color-danger mt-3" id="post-error"><i class="bi bi-exclamation-circle"></i>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @empty($success)
                
                                        @else
                                        <div class="alert alert-light-success color-success mt-3"  id="post-success"><i class="bi bi-check-circle"></i> 
                                            Successfuly.
                                        </div>
                                        @endempty

                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
           
        </div>            
@endsection