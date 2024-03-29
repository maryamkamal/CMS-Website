@extends('admin.layout')

@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">
    {{ __('trans.Customers') }}
    </h4>
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
        <a href="#">{{ __('trans.Customers') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-title">
                    {{ __('trans.Customers') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.order.bulk.delete')}}"><i class="flaticon-interface-5"></i> {{ __('trans.Delete') }}</button>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($users) == 0)
                <h3 class="text-center">{{ __('trans.NO User FOUND') }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('trans.Image') }}</th>
                        <th scope="col">{{ __('trans.Name') }}</th>
                        <th scope="col">{{ __('trans.Email') }}</th>
                        <th scope="col">{{ __('trans.Number') }}</th>
                        <th scope="col">{{ __('trans.Address') }}</th>
                        <th scope="col">{{ __('trans.View') }}</th>
                        <th scope="col">{{ __('trans.Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $key => $user)
                        <tr>

                          <td><img src="{{!empty($user->photo) ? asset('assets/front/img/user/'.$user->photo) : ''}}" alt="" width="60"></td>
                          <td>{{convertUtf8($user->username)}}</td>
                          <td>{{convertUtf8($user->email)}}</td>
                          <td>
                             {{$user->number}}
                          </td>

                          <td>
                             {{$user->address}}
                          </td>

                          <td>
                            <a  href="{{route('register.user.view',$user->id)}}" class="btn btn-primary btn-sm editbtn"><i class="fas fa-eye"></i>{{ __('trans.View') }}</a>
                          </td>
                          <td>
                          <form id="userFrom{{$user->id}}" class="d-inline-block" action="{{route('register.user.ban')}}" method="post">
                            @csrf
                            <select class="form-control {{$user->status == 1 ? 'bg-success' : 'bg-danger'}}" name="status" onchange="document.getElementById('userFrom{{$user->id}}').submit();">
                                <option value="1" {{$user->status == 1 ? 'selected' : ''}}>{{ __('trans.Active') }}</option>
                                <option value="0" {{$user->status == 0 ? 'selected' : ''}}>{{ __('trans.Deactive') }}</option>
                            </select>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              @endif
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="d-inline-block mx-auto">
              {{$users->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
