@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.homeVersions') }}</h4>
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
        <a href="#">{{ __('trans.homeVersions') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
            <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">{{ __('trans.homeVersions') }}</div>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <div class="row">

                  <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('assets/admin/img/versions/static.jpg')}}" alt="" style="width:100%;">
                            <h3 class="text-center text-white mt-3 mb-0"> {{ __('trans.staticVersion') }} </h3>
                        </div>
                        <div class="card-footer text-center">
                            @if ($abs->home_version == 'static')
                            <span class="badge badge-success">{{ __('trans.active') }}</span>
                            @else
                            <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                                @csrf
                                <input type="hidden" name="home_version" value="static">
                                <button type="submit" class="btn btn-info btn-sm confirmbtn">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                </span>
                                {{ __('trans.activate') }}
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{asset('assets/admin/img/versions/slider.jpg')}}" alt="" style="width:100%;">
                        <h3 class="text-center text-white mt-3 mb-0">{{ __('trans.sliderVersion') }}</h3>
                      </div>
                      <div class="card-footer text-center">
                        @if ($abs->home_version == 'slider')
                          <span class="badge badge-success">{{ __('trans.activate') }}</span>
                        @else
                          <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                            @csrf
                            <input type="hidden" name="home_version" value="slider">
                            <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{ __('trans.activate') }}
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{asset('assets/admin/img/versions/video.jpg')}}" alt="" style="width:100%;">
                        <h3 class="text-center text-white mt-3 mb-0">{{ __('trans.videoVersion') }}</h3>
                      </div>
                      <div class="card-footer text-center">
                        @if ($abs->home_version == 'video')
                          <span class="badge badge-success">{{ __('trans.activate') }}</span>
                        @else
                          <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                            @csrf
                            <input type="hidden" name="home_version" value="video">
                            <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{ __('trans.activate') }}
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{asset('assets/admin/img/versions/water.jpg')}}" alt="" style="width:100%;">
                        <h3 class="text-center text-white mt-3 mb-0">{{ __('trans.waterVersion') }}</h3>
                      </div>
                      <div class="card-footer text-center">
                        @if ($abs->home_version == 'water')
                          <span class="badge badge-success">{{ __('trans.activate') }}</span>
                        @else
                          <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                            @csrf
                            <input type="hidden" name="home_version" value="water">
                            <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{ __('trans.activate') }}
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{asset('assets/admin/img/versions/parallax.jpg')}}" alt="" style="width:100%;">
                        <h3 class="text-center text-white mt-3 mb-0">{{ __('trans.parallaxVersion') }}</h3>
                      </div>
                      <div class="card-footer text-center">
                        @if ($abs->home_version == 'parallax')
                          <span class="badge badge-success">{{ __('trans.activate') }}</span>
                        @else
                          <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                            @csrf
                            <input type="hidden" name="home_version" value="parallax">
                            <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{ __('trans.activate') }}
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="{{asset('assets/admin/img/versions/particles.jpg')}}" alt="" style="width:100%;">
                        <h3 class="text-center text-white mt-3 mb-0">{{ __('trans.particlesVersion') }}</h3>
                      </div>
                      <div class="card-footer text-center">
                        @if ($abs->home_version == 'particles')
                          <span class="badge badge-success">{{ __('trans.active') }}</span>
                        @else
                          <form class="deleteform d-inline-block" action="{{route('admin.homeversion.update', $lang_id)}}" method="post">
                            @csrf
                            <input type="hidden" name="home_version" value="particles">
                            <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{ __('trans.activate') }}
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection


@section('scripts')
  <script>
  $('.confirmbtn').on('click', function(e) {
    e.preventDefault();
    swal({
      title: 'Are you sure?',
      text: "You want to make this version as your home!",
      type: 'warning',
      buttons:{
        confirm: {
          text : 'Confirm!',
          className : 'btn btn-success'
        },
        cancel: {
          visible: true,
          className: 'btn btn-danger'
        }
      }
    }).then((Delete) => {
      if (Delete) {
        $(this).parent(".deleteform").submit();
      } else {
        swal.close();
      }
    });
  });
  </script>
@endsection
