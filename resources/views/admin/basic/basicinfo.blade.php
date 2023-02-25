@extends('admin.layout')

@if(!empty($abe->language) && $abe->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select {
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
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.generalSetting') }}</h4>
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
        <a href="#">{{ __('trans.generalSetting') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.basicinfo.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">{{ __('trans.updateGeneralSetting') }}</div>
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
          <div class="card-body pt-5 pb-5">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                @csrf
                <div class="form-group">
                  <label>{{ __('trans.siteName') }} </label>
                  <input class="form-control" name="website_title" value="{{$abs->website_title}}">
                  @if ($errors->has('website_title'))
                    <p class="mb-0 text-danger">{{$errors->first('website_title')}}</p>
                  @endif
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('trans.carrencyType') }}</label>
                            <input type="text" class="form-control ltr" name="base_currency_symbol" value="{{$abx->base_currency_symbol}}">
                            @if ($errors->has('base_currency_symbol'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_symbol')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('trans.currencyState') }}</label>
                            <select name="base_currency_symbol_position" class="form-control ltr">
                                <option value="left" {{$abx->base_currency_symbol_position == 'left' ? 'selected' : ''}}>{{ __('trans.left') }}</option>
                                <option value="right" {{$abx->base_currency_symbol_position == 'right' ? 'selected' : ''}}>{{ __('trans.right') }}</option>
                            </select>
                            @if ($errors->has('base_currency_symbol_position'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_symbol_position')}}</p>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('trans.carrencyType2') }}</label>
                            <input type="text" class="form-control ltr" name="base_currency_text" value="{{$abx->base_currency_text}}">
                            @if ($errors->has('base_currency_text'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_text')}}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('trans.currencyState2') }}</label>
                            <select name="base_currency_text_position" class="form-control ltr">
                                <option value="left" {{$abx->base_currency_text_position == 'left' ? 'selected' : ''}}>{{ __('trans.left') }}</option>
                                <option value="right" {{$abx->base_currency_text_position == 'right' ? 'selected' : ''}}>{{ __('trans.right') }}</option>
                            </select>
                            @if ($errors->has('base_currency_text_position'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_text_position')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('trans.comparCurrancies') }}</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">{{ __('trans.currancyName') }}</span>
                                </div>
                                <input type="text" name="base_currency_rate" class="form-control ltr" value="{{$abx->base_currency_rate}}">
                                <div class="input-group-append">
                                  <span class="input-group-text">{{$abx->base_currency_text}}</span>
                                </div>
                            </div>

                            @if ($errors->has('base_currency_rate'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_rate')}}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <hr style="background-color: #68554bd0">

                <div class="row">
                    <div class="col-lg-10">
					
					<strong>{{ __('trans.choseColorStruc') }}</strong>
					
                        <div class="form-group">
                          <label>{{ __('trans.meanColorCode') }}</label>
                          <input class="jscolor form-control ltr" name="base_color" value="{{$abs->base_color}}">
                          @if ($errors->has('base_color'))
                            <p class="mb-0 text-danger">{{$errors->first('base_color')}}</p>
                          @endif
                        </div>
                    </div>
                    <div class="col-lg-10">

                        @if (!isDark($abe->theme_version) && getVersion($abe->theme_version) != 'gym' && getVersion($abe->theme_version) != 'car' && getVersion($abe->theme_version) != 'construction' && getVersion($abe->theme_version) != 'lawyer')
                            <div class="form-group">
                                <label>{{ __('trans.secColorCode') }}</label>
                                <input class="jscolor form-control ltr" name="secondary_base_color" value="{{$abs->secondary_base_color}}">
                                @if ($errors->has('secondary_base_color'))
                                    <p class="mb-0 text-danger">{{$errors->first('secondary_base_color')}}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>


                @if (getVersion($abe->theme_version) != 'cleaning' && getVersion($abe->theme_version) != 'logistic')
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.sliderMeanColor') }}</label>
                            <input class="jscolor form-control ltr" name="hero_area_overlay_color" value="{{$abe->hero_overlay_color}}">
                            @if ($errors->has('hero_area_overlay_color'))
                            <p class="mb-0 text-danger">{{$errors->first('hero_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.colorOpacity') }}</label>
                            <input type="text" class="form-control ltr" name="hero_area_overlay_opacity" value="{{$abe->hero_overlay_opacity}}">
                            <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                            @if ($errors->has('hero_area_overlay_opacity'))
                            <p class="mb-0 text-danger">{{$errors->first('hero_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif


                @if (getVersion($abe->theme_version) == 'car' || getVersion($abe->theme_version) == 'cleaning')

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.meanColorBgSection') }}</label>
                                <input class="jscolor form-control ltr" name="intro_area_overlay_color" value="{{$abe->intro_overlay_color}}">
                                @if ($errors->has('intro_area_overlay_color'))
                                <p class="mb-0 text-danger">{{$errors->first('intro_area_overlay_color')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.colorOpacity') }}</label>
                                <input type="text" class="form-control ltr" name="intro_area_overlay_opacity" value="{{$abe->intro_overlay_opacity}}">
                                <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                                @if ($errors->has('intro_area_overlay_opacity'))
                                <p class="mb-0 text-danger">{{$errors->first('intro_area_overlay_opacity')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                @endif


                @if (getVersion($abe->theme_version) == 'car')
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.colorOpacityDegree') }}Pricing Area Overlay Color Code **</label>
                            <input class="jscolor form-control ltr" name="pricing_area_overlay_color" value="{{$abe->pricing_overlay_color}}">
                            @if ($errors->has('pricing_area_overlay_color'))
                            <p class="mb-0 text-danger">{{$errors->first('pricing_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.colorOpacity') }}</label>
                            <input type="text" class="form-control ltr" name="pricing_area_overlay_opacity" value="{{$abe->pricing_overlay_opacity}}">
                            <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                            @if ($errors->has('pricing_area_overlay_opacity'))
                            <p class="mb-0 text-danger">{{$errors->first('pricing_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif


                @if (getVersion($abe->theme_version) != 'car')
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.statisticsCC') }}</label>
                            <input class="jscolor form-control ltr" name="statistics_area_overlay_color" value="{{$abe->statistics_overlay_color}}">
                            @if ($errors->has('statistics_area_overlay_color'))
                            <p class="mb-0 text-danger">{{$errors->first('statistics_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.statisticsColorOpacity') }}</label>
                            <input type="text" class="form-control ltr" name="statistics_area_overlay_opacity" value="{{$abe->statistics_overlay_opacity}}">
                            <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                            @if ($errors->has('statistics_area_overlay_opacity'))
                            <p class="mb-0 text-danger">{{$errors->first('statistics_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif


                @if (getVersion($abe->theme_version) != 'gym' && getVersion($abe->theme_version) != 'car' && getVersion($abe->theme_version) != 'cleaning' && getVersion($abe->theme_version) != 'construction' && getVersion($abe->theme_version) != 'logistic' && getVersion($abe->theme_version) != 'lawyer')
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.teamColorCode') }}</label>
                                <input class="jscolor form-control ltr" name="team_area_overlay_color" value="{{$abe->team_overlay_color}}">
                                @if ($errors->has('team_area_overlay_color'))
                                <p class="mb-0 text-danger">{{$errors->first('team_area_overlay_color')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.teamColorOpacity') }}</label>
                                <input type="text" class="form-control ltr" name="team_area_overlay_opacity" value="{{$abe->team_overlay_opacity}}">
                                <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                                @if ($errors->has('team_area_overlay_opacity'))
                                  <p class="mb-0 text-danger">{{$errors->first('team_area_overlay_opacity')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


                @if (getVersion($abe->theme_version) != 'car' && getVersion($abe->theme_version) != 'construction' && getVersion($abe->theme_version) != 'logistic')
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.CTAColorCode') }}</label>
                                <input class="jscolor form-control ltr" name="cta_area_overlay_color" value="{{$abe->cta_overlay_color}}">
                                @if ($errors->has('cta_area_overlay_color'))
                                <p class="mb-0 text-danger">{{$errors->first('cta_area_overlay_color')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>{{ __('trans.CTAColorOpacity') }}</label>
                                <input type="text" class="form-control ltr" name="cta_area_overlay_opacity" value="{{$abe->cta_overlay_opacity}}">
                                <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                                @if ($errors->has('cta_area_overlay_opacity'))
                                <p class="mb-0 text-danger">{{$errors->first('cta_area_overlay_opacity')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.breadcrumbCC') }}</label>
                            <input class="jscolor form-control ltr" name="breadcrumb_area_overlay_color" value="{{$abe->breadcrumb_overlay_color}}">
                            @if ($errors->has('breadcrumb_area_overlay_color'))
                              <p class="mb-0 text-danger">{{$errors->first('breadcrumb_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>{{ __('trans.BreadcrumbCOpacity') }}</label>
                            <input type="text" class="form-control ltr" name="breadcrumb_area_overlay_opacity" value="{{$abe->breadcrumb_overlay_opacity}}">
                            <p class="text-warning mb-0">{{ __('trans.colorOpacityDegree') }}</p>
                            @if ($errors->has('breadcrumb_area_overlay_opacity'))
                              <p class="mb-0 text-danger">{{$errors->first('breadcrumb_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
                </div>

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
