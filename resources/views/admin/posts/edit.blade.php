@extends('admin.layouts.app')

@section('cards') @endsection

@section('content')

<div class="card">
    <div class="row">
        <div class="col-md-4  mt-5 " style="padding-left:30px ">
               <div class="card">
                <form action="{{ route('updatePostImage',$post->id) }}" method="POST" id="form-photo" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="avatar post-foto">
                        <img src="{{ url('images/'.$post->image) }}" alt="" srcset="">
                     </div>

                    <div class="col-md-6 col-12" style="display: none">
                        <label for="formFileSm" class="form-label">
                                Schoose your foto
                        </label>
                        <input class="form-control form-control-sm" id="photo-post-edit" type="file" name="photo" onchange="imageSelected('form-photo')">
                    </div>
                    <div class="card-body pl-6">
                        {{-- <a  class="btn  btn-primary" id="btn-photo" onclick="trigger_photo(this,'photo-post-edit')">Change post image </a> --}}
                        <input type="button" value="Change post image" class="btn  btn-primary" id="btn-photo" onclick="trigger_photo(this,'photo-post-edit')">
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
                        <form class="form form-vertical" action="{{ route('posts.update',$post->id) }}"  method="POST"  id="form-post">
                            @csrf
                            @method('PUT')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Category</label>
                                            <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="category">
                                                        <option value="{{ $post->category->name }}"></option>
                                                        @foreach ($categories as $category)
                                                        <option>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Status</label>
                                        <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option>{{ $post->status }}</option>
                                                    <option>{{ $post->status == 'approved'? 'unaproved':'approved' }}</option>

                                                </select>
                                            </fieldset>
                                    </div>
                            </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Title</label>
                                        <input type="text" id="email-id-vertical" class="form-control" name="title" value="{{ $post->title }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12" style="display: none">
                                    <label for="formFileSm" class="form-label">
                                            Schoose your foto
                                    </label>
                                    <input class="form-control form-control-sm" id="photo-post-edit" type="file" name="photo" onchange="imageSelected('photo-post-edit')">
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Write your post</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group with-title mb-3">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="content" value="'{{ $post->content }}'" placeholder="{{ $post->content }}">
                                                {{ $post->content }}
                                                </textarea>
                                                <label>Edit your post</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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


                         @if ($errors->any())
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
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
