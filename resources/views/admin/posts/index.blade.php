@extends('admin.layouts.app')

@section('cards') @endsection

@section('content')
        <div class="card">
                <div class="card">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Posts</h4>
                                </div>
                                <div>
                                  <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-richtext-fill"> </i> Add Post</a>
                                  <a  class="btn btn-danger selected" style="display:none" id="btn_posts_delete"><i class="bi bi-trash-fill"  id="posts_delete"></i> Delete All record</a>
                                </div>
                              </div>
                              <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input name="check" type="checkbox" id="checkAll" class="form-check-input" aria-checked="false" onclick="checkAll(this)">
                                        </div>
                                      </th>
                                      <th>Image</th>
                                      <th>Title</th>
                                      <th>Content</th>
                                      <th>Comments</th>
                                      <th>Author</th>
                                      <th>Status</th>
                                      <th>Delete</th>
                                      <th>Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($posts as $post)
                                      <tr id="post_{{ $post->id }}">
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input name="check" id="check" type="checkbox" class="form-check-input" aria-checked="false" value="{{ $post->id }}" onclick="countCheck(this)"><i class="input-helper"></i><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div class="avatar-post">
                                              <img src="{{ url('images/'.$post->image) }}" alt="" srcset="">
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6 onclick="comment_create({{ $post->id }})">{{ $post->title }}</h6>
                                        </td>
                                        <td>
                                         <h6 onclick="postModal(`{{ $post->content }}`)">{{ substr($post->content,0,10) }}...</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $post->comments->count() }}</h6>
                                        </td>
                                        <td>
                                         <h6> {{ $post->author->name }}</h6>
                                        </td>
                                        <td>
                                          <h6><span class="badge {{ $post->status == 'approved' ? 'bg-light-success' : 'bg-light-danger' }}">{{ $post->status }}</span></h6>
                                         </td>
                                      <td>
                                          <a  class="btn icon btn-danger"  onclick="post_delete({{ $post->id }})">
                                              <i class="bi bi-trash-fill" id="postd_{{ $post->id }}"></i>
                                          </a>
                                      </td>

                                  <td>
                                      <a href="{{ route('posts.edit',$post->id) }}" class="btn icon btn-primary">
                                          <i class="bi bi-pen-fill"></i>
                                      </a>
                                  </td>
                                      </tr>
                                      @endforeach

                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card-body ml-5">
                                <nav aria-label="Page navigation example ml-12">
                                    <ul class="pagination pagination-primary pagination-sm">
                                        <li class="page-item">
                                            <a class="page-link">
                                                <span aria-hidden="true"><i class="bi bi-chevron-left" id="previous" onclick="paginate(this,'{{ $posts->previousPageUrl() }}')"></i></span>
                                            </a>
                                        </li>

                                        <li class="page-item active"><a class="page-link">{{ $posts->currentPage() }}</a></li>

                                        <li class="page-item"><a class="page-link">
                                                <span aria-hidden="true"><i class="bi bi-chevron-right" id="next" onclick="paginate(this,'{{ $posts->nextPageUrl() }}')"></i></span>
                                            </a></li>
                                    </ul>
                                </nav>
                            </div>
                          </div>
                        </div>

                      </div>


        </div>
@endsection