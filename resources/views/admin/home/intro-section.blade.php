@extends('admin.layout')

@if(!empty($abs->language) && $abs->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select,
    select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.Intro Section') }}</h4>
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
        <a href="#">{{ __('trans.homePage') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Intro Section') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">{{ __('trans.Update Intro Section') }}</div>
                </div>
                <div class="col-lg-2">
                    @if (!empty($langs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>{{ __('trans.selectLanguage') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pt-5 pb-4">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">

              <div class="row">
                  <div class="{{getVersion($be->theme_version) == 'logistic' || getVersion($be->theme_version) == 'lawyer' ? 'col-lg-6' : 'col-lg-12'}}">
                    <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.introsection.upload', $lang_id)}}" method="POST">
                        <div class="form-row">
                          <div class="col-12 mb-2">
                            <label for=""><strong>{{ __('trans.Image') }} **</strong></label>
                          </div>
                          <div class="col-md-12 d-md-block d-sm-none mb-3">
                            @if (!empty($abs->intro_bg))
                                <img src="{{asset('assets/front/img/'.$abs->intro_bg)}}" alt="..." class="img-thumbnail">
                            @else
                                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                            @endif
                          </div>
                          <div class="col-sm-12">
                            <div class="from-group mb-2">
                              <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{__('trans.No image uploaded')}}" readonly="readonly" />

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
                                <i class="fa fa-folder-o fa-fw"></i>{{ __('trans.browseFiles') }} 
                                <input type="file" title='Click to add Files' />
                              </div>
                              <small class="status text-muted">{{ __('trans.selectFile') }}</small>
                              <p class="text-warning mb-0">{{ __('trans.selectFileStruc') }}</p>
                              <p class="text-danger mb-0 em" id="errintro_bg"></p>
                            </div>
                          </div>
                        </div>
                      </form>
                  </div>
                  <div class="col-lg-6">
                    @if (getVersion($be->theme_version) == 'logistic' || getVersion($be->theme_version) == 'lawyer')
                        <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.introsection.upload2', $lang_id)}}" method="POST">
                            <div class="form-row">
                            <div class="col-12 mb-2">
                                <label for=""><strong>{{ __('trans.Image') }} **</strong></label>
                            </div>
                            <div class="col-md-12 d-md-block d-sm-none mb-3">
                                @if (!empty($abe->intro_bg2))
                                    <img src="{{asset('assets/front/img/'.$abe->intro_bg2)}}" alt="..." class="img-thumbnail">
                                @else
                                    <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group mb-2">
                                <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{__('trans.No image uploaded')}}" readonly="readonly" />

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
                                <p class="text-danger mb-0 em" id="errintro_bg2"></p>
                                </div>
                            </div>
                            </div>
                        </form>
                    @endif
                  </div>
              </div>






              <form id="ajaxForm" action="{{route('admin.introsection.update', $lang_id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">{{ __('trans.Title') }} **</label>
                          <input type="text" class="form-control" name="intro_section_title" value="{{$abs->intro_section_title}}">
                          <p id="errintro_section_title" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">{{ __('trans.Video Link') }} </label>
                          <input type="text" class="form-control ltr" name="intro_section_video_link" value="{{$abs->intro_section_video_link}}">
                          <p class="text-warning mb-0">{{ __('trans.Vedio Link Struc') }}</p>
                          <p id="errintro_section_video_link" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">{{ __('trans.Text') }} **</label>
                            <input name="intro_section_text" class="form-control" value="{{$abs->intro_section_text}}">
                            <p id="errintro_section_text" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">{{ __('trans.Button Text') }}</label>
                            <input type="text" class="form-control" name="intro_section_button_text" value="{{$abs->intro_section_button_text}}">
                            <p id="errintro_section_button_text" class="em text-danger mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">{{ __('trans.Button URL') }}</label>
                            <input type="text" class="form-control ltr" name="intro_section_button_url" value="{{$abs->intro_section_button_url}}">
                            <p id="errintro_section_button_url" class="em text-danger mb-0"></p>
                        </div>
                    </div>
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
