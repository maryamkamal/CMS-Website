@extends('admin.layout')

@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.Users') }}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Users Management') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Users') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">{{ __('trans.Users') }}</div>
          <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> {{ __('trans.Add User') }}</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($users) == 0)
                <h3 class="text-center">{{ __('trans.NO USER FOUND') }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('trans.#') }}</th>
                        <th scope="col">{{ __('trans.Picture') }}</th>
                        <th scope="col">{{ __('trans.Username') }}</th>
                        <th scope="col">{{ __('trans.Email') }}</th>
                        <th scope="col">{{ __('trans.First Name') }}</th>
                        <th scope="col">{{ __('trans.Last Name') }}</th>
                        <th scope="col">{{ __('trans.Role') }}</th>
                        <th scope="col">{{ __('trans.Status') }}</th>
                        <th scope="col">{{ __('trans.Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $user)
                        @if ($user->id != Auth::guard('admin')->user()->id)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                              <img src="{{asset('assets/admin/img/propics/'.$user->image)}}" alt="" width="45">
                            </td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>
                              @if (empty($user->role))
                                <span class="badge badge-danger">{{ __('trans.Owner') }}</span>
                              @else
                                {{$user->role->name}}
                              @endif
                            </td>
                            <td>
                              @if ($user->status == 1)
                                <span class="badge badge-success">{{ __('trans.Active') }}</span>
                              @elseif ($user->status == 0)
                                <span class="badge badge-danger">{{ __('trans.Deactive') }}</span>
                              @endif
                            </td>
                            <td>
                              <a class="btn btn-secondary btn-sm" href="{{route('admin.user.edit', $user->id)}}">
                                <span class="btn-label">
                                  <i class="fas fa-edit"></i>
                                </span>
                                {{ __('trans.Edit') }}
                              </a>
                              <form class="deleteform d-inline-block" action="{{route('admin.user.delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                  <span class="btn-label">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                  {{ __('trans.Delete') }}
                                </button>
                              </form>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Create Users Modal -->
  @includeif('admin.user.create')

@endsection
