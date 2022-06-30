@extends('admin.layouts.app')

@section('cards') @endsection

@section('content')

<div class="card this">
    <div class="col-12">
        <div class="card-body">
          <div class="d-sm-flex justify-content-between align-items-start">
            <div>
              <span><h4>Users Status</h4></span>
            </div>

          </div>
          <div class="table-responsive  mt-1">
            <table class="table select-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($users as $user)

                    <tr>
                        <td><a href="{{ route('talk',$user->id) }}"><small><h6>{{ $user->name }}</h6></small></a></td>
                        <td><h6> @empty($user->gender) empty @endempty {{ $user->gender }}</h6></td>
                        <td><h6>{{ $user->email }}</h6></td>
                        <td>
                         @if (Cache::has('user-online'. $user->id))
                            <span ><h6 class="text-success">Online</h6></span>
                            @else
                            <span ><h6 class="text-dark">Offline</h6></span>
                        @endif
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
