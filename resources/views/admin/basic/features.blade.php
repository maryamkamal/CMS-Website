@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.featuresettings') }}</h4>
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
        <a href="#">{{ __('trans.featuresettings') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.featuresettings.update')}}" method="post">
          @csrf
          <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">{{ __('trans.featuresettings') }}</div>
                </div>
            </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                @csrf
                <div class="form-group">
                  <label>{{ __('trans.shop') }}</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="is_shop" value="1" class="selectgroup-input" {{$abex->is_shop == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.active') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="is_shop" value="0" class="selectgroup-input" {{$abex->is_shop == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label>{{ __('trans.supportTicket') }}</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="is_ticket" value="1" class="selectgroup-input" {{$abex->is_ticket == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.active') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="is_ticket" value="0" class="selectgroup-input" {{$abex->is_ticket == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label>{{ __('trans.userPanel') }}</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="is_user_panel" value="1" class="selectgroup-input" {{$abex->is_user_panel == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.active') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="is_user_panel" value="0" class="selectgroup-input" {{$abex->is_user_panel == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label>{{ __('trans.Request a Quote Page Status') }} **</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="is_quote" value="1" class="selectgroup-input" {{$bs->is_quote == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.Active') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="is_quote" value="0" class="selectgroup-input" {{$bs->is_quote == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.Deactive') }}</span>
                        </label>
                    </div>
                    @if ($errors->has('is_quote'))
                        <p class="mb-0 text-danger">{{$errors->first('is_quote')}}</p>
                    @endif
                </div>
				{{--	 <div class="form-group">
                  <label>{{ __('trans.Request a Package Page Status') }} **</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="is_package" value="1" class="selectgroup-input" {{$bs->is_package == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.Active') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="is_package" value="0" class="selectgroup-input" {{$bs->is_package == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.Deactive') }}</span>
                        </label>
                    </div>
                    @if ($errors->has('is_quote'))
                        <p class="mb-0 text-danger">{{$errors->first('is_quote')}}</p>
                    @endif
                </div>
				--}}
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
