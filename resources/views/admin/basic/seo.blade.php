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
    <h4 class="page-title">{{ __('trans.SEOInformations') }}</h4>
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
        <a href="#">{{ __('trans.SEOInformations') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.seo.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">{{ __('trans.updateSEOInf') }}</div>
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
            <div class="row">
              @csrf
              <div class="col-lg-6">
                <div id="accordion">
                  

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Meta Home') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapseOne" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent ="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsHomePage') }}</label>
                          <input class="form-control" name="home_meta_keywords" value="{{$abe->home_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionHomePage') }}</label>
                          <textarea class="form-control" name="home_meta_description" rows="5" placeholder="Enter meta description">{{$abe->home_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#services" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Services Meta') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="services" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsServicesPage') }}</label>
                          <input class="form-control" name="services_meta_keywords" value="{{$abe->services_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionServicesPage') }}</label>
                          <textarea class="form-control" name="services_meta_description" rows="5" placeholder="Enter meta description">{{$abe->services_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#Packages" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Packages Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="Packages" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsPackages') }}</label>
                          <input class="form-control" name="packages_meta_keywords" value="{{$abe->packages_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionPackages') }}</label>
                          <textarea class="form-control" name="packages_meta_description" rows="5" placeholder="Enter meta description">{{$abe->packages_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#Portfolios" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Portfolios Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="Portfolios" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsPortfolios') }}</label>
                          <input class="form-control" name="portfolios_meta_keywords" value="{{$abe->portfolios_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionPortfolios') }}</label>
                          <textarea class="form-control" name="portfolios_meta_description" rows="5" placeholder="Enter meta description">{{$abe->portfolios_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#TeamPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.TeamPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="TeamPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsTeamPage') }}</label>
                          <input class="form-control" name="team_meta_keywords" value="{{$abe->team_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionTeamPage') }}</label>
                          <textarea class="form-control" name="team_meta_description" rows="5" placeholder="Enter meta description">{{$abe->team_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#CareerPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.CareerPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="CareerPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsCareerPage') }}</label>
                          <input class="form-control" name="career_meta_keywords" value="{{$abe->career_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionCareerPage') }}</label>
                          <textarea class="form-control" name="career_meta_description" rows="5" placeholder="Enter meta description">{{$abe->career_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#CalendarPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.CalendarPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="CalendarPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsEventCalendarPage') }}</label>
                          <input class="form-control" name="calendar_meta_keywords" value="{{$abe->calendar_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionEventCalendarPage') }}</label>
                          <textarea class="form-control" name="calendar_meta_description" rows="5" placeholder="Enter meta description">{{$abe->calendar_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#GalleryPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.GalleryPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="GalleryPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsGalleryPage') }}</label>
                          <input class="form-control" name="gallery_meta_keywords" value="{{$abe->gallery_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionGalleryPage') }}</label>
                          <textarea class="form-control" name="gallery_meta_description" rows="5" placeholder="Enter meta description">{{$abe->gallery_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#FAQPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.FAQPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="FAQPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsFAQPage') }}</label>
                          <input class="form-control" name="faq_meta_keywords" value="{{$abe->faq_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionFAQPage') }}</label>
                          <textarea class="form-control" name="faq_meta_description" rows="5" placeholder="Enter meta description">{{$abe->faq_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#BlogsPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.BlogsPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="BlogsPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsBlogsPage') }}</label>
                          <input class="form-control" name="blogs_meta_keywords" value="{{$abe->blogs_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionBlogsPage') }}</label>
                          <textarea class="form-control" name="blogs_meta_description" rows="5" placeholder="Enter meta description">{{$abe->blogs_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-6">
                <div id="accordion">
                  

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#PasswordPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Password Page Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="PasswordPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Forgot Password Page') }}</label>
                          <input class="form-control" name="forgot_meta_keywords" value="{{$abe->forgot_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Forgot Password Page') }}</label>
                          <textarea class="form-control" name="forgot_meta_description" rows="5" placeholder="Enter meta description">{{$abe->forgot_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#RegisterPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Register Page Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="RegisterPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Register Page') }}</label>
                          <input class="form-control" name="register_meta_keywords" value="{{$abe->register_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Register Page') }}</label>
                          <textarea class="form-control" name="register_meta_description" rows="5" placeholder="Enter meta description">{{$abe->register_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#LoginPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Login Page Meta') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="LoginPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Login Page') }}</label>
                          <input class="form-control" name="login_meta_keywords" value="{{$abe->login_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Login Page') }}</label>
                          <textarea class="form-control" name="login_meta_description" rows="5" placeholder="Enter meta description">{{$abe->login_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#CheckoutPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Checkout Page Meta') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="CheckoutPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Checkout Page') }}</label>
                          <input class="form-control" name="checkout_meta_keywords" value="{{$abe->checkout_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Checkout Page') }}</label>
                          <textarea class="form-control" name="checkout_meta_description" rows="5" placeholder="Enter meta description">{{$abe->checkout_meta_description}}</textarea>
                        </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#CartPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Cart Page Meta') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="CartPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Cart Page') }}</label>
                          <input class="form-control" name="cart_meta_keywords" value="{{$abe->cart_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Cart Page') }}</label>
                          <textarea class="form-control" name="cart_meta_description" rows="5" placeholder="Enter meta description">{{$abe->cart_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#ProductsPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Products Page Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="ProductsPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Products Page') }}</label>
                          <input class="form-control" name="products_meta_keywords" value="{{$abe->products_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Products Page') }}</label>
                          <textarea class="form-control" name="products_meta_description" rows="5" placeholder="Enter meta description">{{$abe->products_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#QuotePage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Quote Page Meta') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="QuotePage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.Meta Keywords for Quote Page') }}</label>
                          <input class="form-control" name="quote_meta_keywords" value="{{$abe->quote_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Meta Description for Quote Page') }}</label>
                          <textarea class="form-control" name="quote_meta_description" rows="5" placeholder="Enter meta description">{{$abe->quote_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#ContactPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.ContactPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="ContactPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsContactPage') }}</label>
                          <input class="form-control" name="contact_meta_keywords" value="{{$abe->contact_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionContactPage') }}</label>
                          <textarea class="form-control" name="contact_meta_description" rows="5" placeholder="Enter meta description">{{$abe->contact_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#RSSFeedsPage" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.RSSFeedsPage Metas') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="RSSFeedsPage" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-group">
                          <label>{{ __('trans.metaKeywordsRSSFeedsPage') }}</label>
                          <input class="form-control" name="rss_meta_keywords" value="{{$abe->rss_meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.metaDescriptionRSSFeedsPage') }}</label>
                          <textarea class="form-control" name="rss_meta_description" rows="5" placeholder="Enter meta description">{{$abe->rss_meta_description}}</textarea>
                        </div>
                        
                      </div>
                      
                      
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
