
@extends('admin.layouts.app')
@section('cards') @endsection

@section('content')
        <div class="card">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">

                    <div class="">
                        <a  class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Category-modal"><i class="bi bi-folder-fill"></i>  Add Category</a>
                        <a  class="btn btn-danger selected" id="category-delete-all"  style="display:none" ><i class="bi bi-trash-fill" id="delete_all_category"></i> Delete All record</a>
                      </div>
                </div>
                <div class="card-content" id="category-section">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive  mt-1">
                                <table class="table select-table" id="table">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input name="check" type="checkbox" id="checkAll" class="check form-check-input" aria-checked="false" onclick="checkAll(this)">
                                        </div>
                                      </th>
                                      <th>Name</th>
                                      <th>Posts</th>
                                      <th>Comments</th>
                                      <th>Created-At</th>
                                      <th>Delete</th>
                                      <th>Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($categories as $category)
                                      <tr id="category_{{ $category->id }}">
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input name="check" type="checkbox" id="check" class="checkox form-check-input" aria-checked="false" value="{{ $category->id }}" onclick="countCheck(this)"><i class="input-helper"></i><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ $category->name }}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ $category->posts->count() }}</h6>
                                        </td>
                                        <td>
                                         <h6>{{ $category->comments->count() }}</h6>
                                        </td>
                                        <td>
                                          <h6>{{  date_format($category->created_at,'d-M-Y') }}</h6>
                                         </td>
                                        <td>
                                            <a  class="btn icon btn-danger">
                                                <i class="bi bi-trash-fill" onclick="category_delete(this,{{ $category->id }})" id="btnd_{{ $category->id }}"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a  class="btn icon btn-primary" >
                                                <i class="bi bi-pen-fill" onclick="category_edit('{{ $category->name }}',{{ $category->id }})" id="btn_{{ $category->id }}"></i>
                                            </a>
                                        </td>
                                      </tr>

                                      @endforeach


                                  </tbody>
                                </table>
                              </div>
                              <div class="card-body ml-5">
                                <nav aria-label="Page navigation example ml-12">
                                    <ul class="pagination pagination-primary pagination-sm">
                                        <li class="page-item">
                                            <a class="page-link">
                                                <span aria-hidden="true"><i class="bi bi-chevron-left" id="previous" onclick="paginate(this,'{{ $categories->previousPageUrl() }}')"></i></span>
                                            </a>
                                        </li>

                                        <li class="page-item active"><a class="page-link">{{ $categories->currentPage() }}</a></li>

                                        <li class="page-item"><a class="page-link" >
                                                <span aria-hidden="true"><i class="bi bi-chevron-right" id="next" onclick="paginate(this,'{{ $categories->nextPageUrl() }}')"></i></span>
                                            </a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>



        @include('admin.modals.createCategoryForm')
@endsection

