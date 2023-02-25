@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.SocialLinks') }}</h4>
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
        <a href="#">{{ __('trans.SocialLinks') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form id="socialForm" action="{{route('admin.social.store')}}" method="post" onsubmit="store(event)">
          <div class="card-header">
            <div class="card-title">{{ __('trans.addSocialLink') }}</div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row" style="direction:ltr">
              <div class="col-lg-6 offset-lg-3">
                @csrf
                <div class="form-group">
                  <label for="">{{ __('trans.SocialIcon') }}</label>
                  <div class="btn-group d-block">
                      <button type="button" class="btn btn-primary iconpicker-component"><i
                              class="fa fa-fw fa-heart"></i></button>
                      <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                              data-selected="fa-car" data-toggle="dropdown">
                      </button>
                      <div class="dropdown-menu"></div>
                  </div>
                  <input id="inputIcon" type="hidden" name="icon" value="">
                  @if ($errors->has('icon'))
                    <p class="mb-0 text-danger">{{$errors->first('icon')}}</p>
                  @endif
                  <div class="mt-2">
                    <small>{{ __('trans.socialIconInstrac') }}</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">{{ __('trans.URL') }}</label>
                  <input type="text" class="form-control" name="url" value="" placeholder="Enter URL of social media account">
                  @if ($errors->has('url'))
                    <p class="mb-0 text-danger">{{$errors->first('url')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label for="">{{ __('trans.serialNumber') }}</label>
                  <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                  <p id="errserial_number" class="mb-0 text-danger em"></p>
                  <p class="text-warning"><small>{{ __('trans.serialNumberAlert') }}</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer pt-3">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-12">

                </div>
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">{{ __('trans.Submit') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ __('trans.SocialLinks') }}</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($socials) == 0)
                <h2 class="text-center">{{ __('trans.noLinkAdded') }}</h2>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('trans.hash') }}</th>
                            <th scope="col">{{ __('trans.icon') }}</th>
                            <th scope="col">{{ __('trans.URL') }}</th>
                            <th scope="col">{{ __('trans.serialNumber') }}</th>
                            <th scope="col">{{ __('trans.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($socials as $key => $social)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><i class="{{ $social->icon }}"></i></td>
                            <td>{{$social->url}}</td>
                            <td>{{$social->serial_number}}</td>
                            <td>
                            <a class="btn btn-secondary btn-sm" href="{{route('admin.social.edit', $social->id)}}">
                                <span class="btn-label">
                                    <i class="fas fa-edit"></i>
                                </span>
                                {{ __('trans.edit') }}
                            </a>
                            <form class="d-inline-block deleteform" action="{{route('admin.social.delete')}}" method="post">
                              @csrf
                              <input type="hidden" name="socialid" value="{{$social->id}}">
                              <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                {{ __('trans.delete') }}
                              </button>
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
      </div>
    </div>
  </div>

@endsection


@section('scripts')
  <script>
    function store(e) {
      e.preventDefault();
      $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
      document.getElementById('socialForm').submit();
    }
  </script>
@endsection
