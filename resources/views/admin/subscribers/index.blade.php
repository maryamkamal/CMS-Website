@extends('admin.layout')

@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.Subscribers') }}</h4>
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
        <a href="#">{{ __('trans.Subscribers') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Subscribers') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">{{ __('trans.Subscribers') }}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($subscs) == 0)
                <h3 class="text-center">{{ __('trans.NO SUBSCRIBER FOUND') }}</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">{{ __('trans.hash') }}</th>
                        <th scope="col">{{ __('trans.email') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($subscs as $key => $subsc)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$subsc->email}}</td>
                        </tr>
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

@endsection
