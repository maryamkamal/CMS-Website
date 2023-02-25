@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.maintananceMode') }}</h4>
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
        <a href="#">{{ __('trans.maintananceMode') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.updateMaintananceMode') }}</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.maintainance.upload')}}" method="POST">
                  <div class="form-row">
                    <div class="col-12 mb-2">
                      <label for=""><strong>{{ __('trans.mainatananceImage') }}</strong></label>
                    </div>
                    <div class="col-md-12 d-md-block d-sm-none mb-3">
                      @if (file_exists('assets/front/img/maintainance.png'))
                        <img src="{{asset('assets/front/img/maintainance.png?'.time())}}" alt="..." class="img-thumbnail" style="width: 100%;">
                      @else
                        <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                      @endif
                    </div>
                    <div class="col-sm-12">
                      <div class="from-group mb-2">
                        <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="No image uploaded..." readonly="readonly" />

                        <div class="progress mb-2 d-none">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                            role="progressbar"
                            style="width: 0%;"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
                            0%
                          </div>
                        </div>

                      </div>

                      <div class="mt-4">
                        <div role="button" class="btn btn-primary mr-2">
                          <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                          <input type="file" title='Click to add Files' />
                        </div>
                        <small class="status text-muted">{{ __('trans.selectFile') }}</small>
                        <p class="text-warning mb-0">{{ __('trans.selectFileStruc') }}</p>
                        <p class="text-danger mb-0 em" id="errmaintainance_img"></p>
                      </div>
                    </div>
                  </div>
                </form>

                <form id="ajaxForm" action="{{route('admin.maintainance.update')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>{{ __('trans.maintananceMode') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="maintainance_mode" value="1" class="selectgroup-input" {{$bs->maintainance_mode == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="maintainance_mode" value="0" class="selectgroup-input" {{$bs->maintainance_mode == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                    @if ($errors->has('maintainance_mode'))
                      <p class="mb-0 text-danger">{{$errors->first('maintainance_mode')}}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>{{ __('trans.maintananceText') }}</label>
                    <textarea class="form-control" name="maintainance_text" rows="3" cols="80">{!! ($bs->maintainance_text) !!}</textarea>
                    @if ($errors->has('maintainance_text'))
                      <p class="mb-0 text-danger">{{$errors->first('maintainance_text')}}</p>
                    @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

@endsection
