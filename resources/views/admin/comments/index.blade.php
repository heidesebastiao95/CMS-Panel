@extends('admin.layouts.app')

{{-- @section('cards') @endsection --}}

@section('content')
        <div class="card">
            
                <div class="card">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Comments</h4>
                                </div>
                                <div>
                                  <a  class="btn btn-danger selected" id="comments_delete" style="display:none" ><i class="bi bi-trash-fill" id="delete_all_comments"></i> Delete All record</a>
                                </div>
                              </div>
                              <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input name="check" type="checkbox" id="checkAll" class="check form-check-input" aria-checked="false" onclick="checkAll(this)">
                                        </div>
                                      </th>
                                      <th>Author</th>
                                      <th>Post</th>
                                      <th>Content</th>
                                      <th>Status</th>
                                      <th>Created-At</th>
                                      <th>Delete</th>
                                      <th>Edit</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($comments as $comment)
                                    <tr id="comment_{{ $comment->id }}">
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input name="check" type="checkbox" id="check" class="checkox form-check-input" aria-checked="false" value="{{ $comment->id }}" onclick="countCheck(this)"><i class="input-helper"></i><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                                  <div class="avatar">
                                                          <img src="{{ url('images/'.$comment->author->img) }}" alt="" srcset="">
                                                  </div>
                                            <div>
                                              <small><h6>{{ $comment->author->name }}</h6></small>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ $comment->post->title }}</h6>
                                        </td>
                                        <td>
                                         <h6>{{ $comment->content }}</h6>
                                        </td>
                                        <td>
                                          <h6><span class="badge {{ $comment->status == 'approved' ? 'bg-light-success' : 'bg-light-danger' }}">{{ $comment->status }}</span></h6>
                                        </td>
                                        <td>
                                          <h6>{{ date_format($comment->created_at,'d-M-Y') }}</h6>
                                         </td>
                                         <td>
                                            <a  class="btn icon btn-danger"  onclick="comment_delete({{ $comment->id }})">
                                                <i class="bi bi-trash-fill" id="commentd_{{ $comment->id }}"></i>
                                            </a>
                                        </td>
                                         
                                        <td>
                                            <a  class="btn icon btn-primary {{ $comment->author->id == Auth::user()->id ? '' : 'disabled' }}"  onclick="comment_edit_content({{ $comment->id }},'{{ $comment->content }}')">
                                                <i class="bi bi-pen-fill"></i>
                                            </a>
                                          
                                      </td>
                                      
                                      
                                  <td>
                                      <a  class="btn icon {{ $comment->status =='approved'? 'btn-warning':'btn-success' }}" onclick="comment_edit('{{ $comment->status }}',{{ $comment->id }})">
                                          <i class="bi {{ $comment->status =='approved'? 'bi-x-square-fill':'bi-check-square-fill' }}" id="{{ $comment->id }}"></i>
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
                                                <span aria-hidden="true"><i class="bi bi-chevron-left" id="previous" onclick="paginate(this,'{{ $comments->previousPageUrl() }}')"></i></span>
                                            </a>
                                        </li>
                    
                                        <li class="page-item active"><a class="page-link">{{ $comments->currentPage() }}</a></li>
                    
                                        <li class="page-item"><a class="page-link">
                                                <span aria-hidden="true"><i class="bi bi-chevron-right" id="next" onclick="paginate(this,'{{ $comments->nextPageUrl() }}')"></i></span>
                                            </a></li>
                                    </ul>
                                </nav>
                            </div>
                          </div>
                        </div>
                         
                      </div>   
                      
           
           
        </div>            
@endsection