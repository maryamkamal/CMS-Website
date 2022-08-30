@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.Theme Version') }}</h4>
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
        <a href="#">{{ __('trans.manSetting') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Theme Version') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">{{ __('trans.Update Theme Version') }}</div>
                </div>
            </div>
        </div>
        <div class="card-body pt-3 pb-4">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">

              <form id="ajaxForm" action="{{route('admin.themeversion.update')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">{{ __('trans.Select a Theme') }}</label>
                  <select class="form-control" name="theme_version" id="">
                      <option value="default_service_category" {{$abe->theme_version == 'default_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp1') }}
                      </option>
                      <option value="default_no_category" {{$abe->theme_version == 'default_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp2') }}
                      </option>
                      <option value="dark_service_category" {{$abe->theme_version == 'dark_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp3') }}
                      </option>
                      <option value="dark_no_category" {{$abe->theme_version == 'dark_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp4') }}
                      </option>
                      <option value="gym_service_category" {{$abe->theme_version == 'gym_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp5') }}
                      </option>
                      <option value="gym_no_category" {{$abe->theme_version == 'gym_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp6') }}
                      </option>
                      <option value="car_service_category" {{$abe->theme_version == 'car_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp7') }}
                      </option>
                      <option value="car_no_category" {{$abe->theme_version == 'car_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp8') }}
                      </option>
                      <option value="cleaning_service_category" {{$abe->theme_version == 'cleaning_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp9') }}
                      </option>
                      <option value="cleaning_no_category" {{$abe->theme_version == 'cleaning_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp10') }}
                      </option>
                      <option value="construction_service_category" {{$abe->theme_version == 'construction_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp11') }}
                      </option>
                      <option value="construction_no_category" {{$abe->theme_version == 'construction_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp12') }}
                      </option>
                      <option value="logistic_service_category" {{$abe->theme_version == 'logistic_service_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp13') }}
                      </option>
                      <option value="logistic_no_category" {{$abe->theme_version == 'logistic_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp14') }}
                      </option>
                      <option value="lawyer_service_category" {{$abe->theme_version == 'lawyer_service_category' ? 'selected' : ''}}>{{ __('trans.Temp15') }}
                      </option>
                      <option value="lawyer_no_category" {{$abe->theme_version == 'lawyer_no_category' ? 'selected' : ''}}>
                        {{ __('trans.Temp16') }}
                      </option>
                  </select>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
