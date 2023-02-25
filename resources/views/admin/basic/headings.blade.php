@extends('admin.layout')

@if(!empty($abs->language) && $abs->language->rtl == 1)
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
  <h4 class="page-title">{{ __('trans.pageHeadings') }} </h4>
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
      <a href="#">{{ __('trans.pageHeadings') }} </a>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form class="" action="{{route('admin.heading.update', $lang_id)}}" method="post">
        @csrf
        <div  class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <div class="card-title">{{ __('trans.updatePageHeadings') }}</div>
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
          <div class="row d-flex justify-content-center">
            
            <div class="col-lg-10">
              
              @csrf
              
                <div id="accordion">
                  

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapse rounded border" style="border-color:#68554b !important">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.SERVICE Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapseOne" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.serviceSubtitle') }}</label>
                          <input class="form-control" name="service_subtitle" value="{{$abs->service_subtitle}}">
                          @if ($errors->has('service_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('service_subtitle')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.serviceDetailsTitle') }}</label>
                          <input class="form-control" name="service_details_title" value="{{$abs->service_details_title}}">
                          @if ($errors->has('service_details_title'))
                          <p class="mb-0 text-danger">{{$errors->first('service_details_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.serviceTitle') }}</label>
                          <input class="form-control" name="service_title" value="{{$abs->service_title}}">
                          @if ($errors->has('service_title'))
                          <p class="mb-0 text-danger">{{$errors->first('service_title')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapse rounded borderTw  o style="border-color:#68554b !important" ">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Portfolio Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapseTwo" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.portfolioTitle') }}</label>
                          <input class="form-control" name="portfolio_title" value="{{$abs->portfolio_title}}">
                          @if ($errors->has('portfolio_title'))
                          <p class="mb-0 text-danger">{{$errors->first('portfolio_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.portfolioSubtitle') }}</label>
                          <input class="form-control" name="portfolio_subtitle" value="{{$abs->portfolio_subtitle}}">
                          @if ($errors->has('portfolio_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('portfolio_subtitle')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.portfolioDetailsTitle') }}</label>
                          <input class="form-control" name="portfolio_details_title" value="{{$abs->portfolio_details_title}}">
                          @if ($errors->has('portfolio_details_title'))
                          <p class="mb-0 text-danger">{{$errors->first('portfolio_details_title')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapse rounded borderTh  r style="border-color:#68554b !important" ee">
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.FAQ Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapseThree" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.FAQTitle') }}</label>
                          <input class="form-control" name="faq_title" value="{{$abs->faq_title}}">
                          @if ($errors->has('faq_title'))
                          <p class="mb-0 text-danger">{{$errors->first('faq_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.FAQSubtitle') }}</label>
                          <input class="form-control" name="faq_subtitle" value="{{$abs->faq_subtitle}}">
                          @if ($errors->has('faq_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('faq_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse rounded border4"  > 
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Pricing Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse4" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.pricingTitle') }}</label>
                          <input class="form-control" name="pricing_title" value="{{$abe->pricing_title}}">
                          @if ($errors->has('pricing_title'))
                          <p class="mb-0 text-danger">{{$errors->first('pricing_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.pricingSubtitle') }}</label>
                          <input class="form-control" name="pricing_subtitle" value="{{$abe->pricing_subtitle}}">
                          @if ($errors->has('pricing_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('pricing_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse rounded border5"  >  
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Product Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse5" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.productTitle') }}</label>
                          <input class="form-control" name="product_title" value="{{$abe->product_title}}">
                          @if ($errors->has('product_title'))
                          <p class="mb-0 text-danger">{{$errors->first('product_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.productSubtitle') }}</label>
                          <input class="form-control" name="product_subtitle" value="{{$abe->product_subtitle}}">
                          @if ($errors->has('product_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('product_subtitle')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.productDetailsTitle') }}</label>
                          <input class="form-control" name="product_details_title" value="{{$abe->product_details_title}}">
                          @if ($errors->has('product_details_title'))
                          <p class="mb-0 text-danger">{{$errors->first('product_details_title')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse rounded border6"  > 
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Cart Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse6" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.cartTitle') }}</label>
                          <input class="form-control" name="cart_title" value="{{$abe->cart_title}}">
                          @if ($errors->has('cart_title'))
                          <p class="mb-0 text-danger">{{$errors->first('cart_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.cartSubtitle') }}</label>
                          <input class="form-control" name="cart_subtitle" value="{{$abe->cart_subtitle}}">
                          @if ($errors->has('cart_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('cart_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse rounded border7"  >  
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Checkout Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse7" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.checkoutTitle') }}</label>
                          <input class="form-control" name="checkout_title" value="{{$abe->checkout_title}}">
                          @if ($errors->has('checkout_title'))
                          <p class="mb-0 text-danger">{{$errors->first('checkout_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.checkoutSubtitle') }}</label>
                          <input class="form-control" name="checkout_subtitle" value="{{$abe->checkout_subtitle}}">
                          @if ($errors->has('checkout_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('checkout_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse rounded border8"  > 
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Blog Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse8" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.blogTitle') }}</label>
                          <input class="form-control" name="blog_title" value="{{$abs->blog_title}}">
                          @if ($errors->has('blog_title'))
                          <p class="mb-0 text-danger">{{$errors->first('blog_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.blogSubtitle') }}</label>
                          <input class="form-control" name="blog_subtitle" value="{{$abs->blog_subtitle}}">
                          @if ($errors->has('blog_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('blog_subtitle')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.blogDetailsTitle') }}</label>
                          <input class="form-control" name="blog_details_title" value="{{$abs->blog_details_title}}">
                          @if ($errors->has('blog_details_title'))
                          <p class="mb-0 text-danger">{{$errors->first('blog_details_title')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse rounded border9"  >  
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.RSS Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse9" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.RSSTitle') }}</label>
                          <input class="form-control" name="rss_title" value="{{$abe->rss_title}}">
                          @if ($errors->has('rss_title'))
                          <p class="mb-0 text-danger">{{$errors->first('rss_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.RSSSubtitle') }}</label>
                          <input class="form-control" name="rss_subtitle" value="{{$abe->rss_subtitle}}">
                          @if ($errors->has('rss_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('rss_subtitle')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.RSSDetailsTitle') }}</label>
                          <input class="form-control" name="rss_details_title" value="{{$abe->rss_details_title}}">
                          @if ($errors->has('rss_details_title'))
                          <p class="mb-0 text-danger">{{$errors->first('rss_details_title')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse rounded border10  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Gallery Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse10" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.galleryTitle') }}</label>
                          <input class="form-control" name="gallery_title" value="{{$abs->gallery_title}}">
                          @if ($errors->has('gallery_title'))
                          <p class="mb-0 text-danger">{{$errors->first('gallery_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.gallerySubtitle') }}</label>
                          <input class="form-control" name="gallery_subtitle" value="{{$abs->gallery_subtitle}}">
                          @if ($errors->has('gallery_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('gallery_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse rounded border11  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Career Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse11" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.careerTitle') }}</label>
                          <input class="form-control" name="career_title" value="{{$abe->career_title}}">
                          @if ($errors->has('career_title'))
                          <p class="mb-0 text-danger">{{$errors->first('career_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.careerSubtitle') }}</label>
                          <input class="form-control" name="career_subtitle" value="{{$abe->career_subtitle}}">
                          @if ($errors->has('career_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('career_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse rounded border12  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Event Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse12" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.eventCalendarTitle') }}</label>
                          <input class="form-control" name="event_calendar_title" value="{{$abe->event_calendar_title}}">
                          @if ($errors->has('event_calendar_title'))
                          <p class="mb-0 text-danger">{{$errors->first('event_calendar_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.Event calendarSubtitle') }}</label>
                          <input class="form-control" name="event_calendar_subtitle" value="{{$abe->event_calendar_subtitle}}">
                          @if ($errors->has('event_calendar_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('event_calendar_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse13" aria-expanded="true" aria-controls="collapse rounded border13  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Team Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse13" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.teamTitle') }}</label>
                          <input class="form-control" name="team_title" value="{{$abs->team_title}}">
                          @if ($errors->has('team_title'))
                          <p class="mb-0 text-danger">{{$errors->first('team_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.teamSubtitle') }}</label>
                          <input class="form-control" name="team_subtitle" value="{{$abs->team_subtitle}}">
                          @if ($errors->has('team_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('team_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse14" aria-expanded="true" aria-controls="collapse rounded border14  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Contact Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse14" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.contactTitle') }}</label>
                          <input class="form-control" name="contact_title" value="{{$abs->contact_title}}">
                          @if ($errors->has('contact_title'))
                          <p class="mb-0 text-danger">{{$errors->first('contact_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.contactSubtitle') }}</label>
                          <input class="form-control" name="contact_subtitle" value="{{$abs->contact_subtitle}}">
                          @if ($errors->has('contact_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('contact_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse15" aria-expanded="true" aria-controls="collapse rounded border15  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Quote Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse15" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.quoteTitle') }}</label>
                          <input class="form-control" name="quote_title" value="{{$abs->quote_title}}">
                          @if ($errors->has('quote_title'))
                          <p class="mb-0 text-danger">{{$errors->first('quote_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.quoteSubtitle') }}</label>
                          <input class="form-control" name="quote_subtitle" value="{{$abs->quote_subtitle}}">
                          @if ($errors->has('quote_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('quote_subtitle')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      
                      
                    </div>
                  </div>

                  
                  <div class="card mb-1">
                    
                    <div style="background-color: #68554b;" class="card-header  rounded mb-1" id="headingOne">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse16" aria-expanded="true" aria-controls="collapse rounded border16  " style="border-color:#68554b !important" >
                          <i class="fa fa-plus ml-2"></i>
                          {{ __('trans.Error Headings Settings') }}
                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse16" class="collapse rounded border "    style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        
                        
                        <div class="form-group">
                          <label>{{ __('trans.errorPageTitle') }}</label>
                          <input class="form-control" name="error_title" value="{{$abs->error_title}}">
                          @if ($errors->has('error_title'))
                          <p class="mb-0 text-danger">{{$errors->first('error_title')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>{{ __('trans.errorPageSubtitle') }}</label>
                          <input class="form-control" name="error_subtitle" value="{{$abs->error_subtitle}}">
                          @if ($errors->has('error_subtitle'))
                          <p class="mb-0 text-danger">{{$errors->first('error_subtitle')}}</p>
                          @endif
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
