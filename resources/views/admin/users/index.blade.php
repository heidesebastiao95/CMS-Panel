@extends('admin.layouts.app')


@section('content')

<div class="card this">
    <div class="col-12">
        <div class="card-body">
          <div class="d-sm-flex justify-content-between align-items-start">
            <div>
              <a class="btn btn-primary "  data-bs-toggle="modal" data-bs-target="#User-modal"><i class="bi bi-person-fill"></i> Add User</a>
              <a  class="btn btn-danger selected" id="btn-delete-users" style="display:none" ><i class="bi bi-trash-fill" id="delete_all_users"></i> Delete All record</a>
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
                  <th>User</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($users as $user)
                      <tr id="userd_{{ $user->id }}">
                  <td>
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                      <input name="check" id="check" type="checkbox" class="form-check-input" aria-checked="false" value="{{ $user->id }}" onclick="countCheck(this)">
                    </div>
                  </td>
                  <td>
                    <div class="d-flex ">

                        <div class="avatar">
                            <img src="{{ url('images/'.$user->img) }}" alt="" srcset="">
                         </div>
                    <div>
                            <small><h6>{{ $user->name }}</h6></small>
                     </div>
                    </div>
                    </td>
                  <td>
                    <h6> @empty($user->gender) empty @endempty {{ $user->gender }}</h6>
                  </td>
                  <td>
                    <h6>{{ $user->email }}</h6>
                  </td>
                  <td>
                    <h6> @empty($user->phone_namber) empty @endempty {{ $user->phone_namber }}</h6>
                  </td>
                  <td>
                    <h6><span class="{{ $user->role == 'admin' ? 'badge bg-success':'badge bg-warning' }}">{{ $user->role }}</span></h6>
                  </td>
                   <td>
                        <a  class="btn icon btn-danger">
                            <i class="bi bi-trash-fill" onclick="user_delete(this,{{ $user->id }})" id="btnu_{{ $user->id }}"></i>
                        </a>
                  </td>
                <td>
                    <a href="{{ route('users.edit',$user->id) }}" class="btn icon btn-primary {{ $user->id == Auth::user()->id ? '' : 'disabled' }}">
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
                            <span aria-hidden="true"><i class="bi bi-chevron-left" id="previous" onclick="paginate(this,'{{ $users->previousPageUrl() }}')"></i></span>
                        </a>
                    </li>

                    <li class="page-item active"><a class="page-link">{{ $users->currentPage() }}</a></li>

                    <li class="page-item"><a class="page-link">
                            <span aria-hidden="true"><i class="bi bi-chevron-right" id="next" onclick="paginate(this,'{{ $users->nextPageUrl() }}')"></i></span>
                        </a></li>
                </ul>
            </nav>
        </div>




    </div>

  </div>
@endsection
