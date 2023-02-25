@extends('front.default.layout')

@section('pagename')
 - {{__('Packages')}}
@endsection

@section('meta-keywords', "$be->packages_meta_keywords")
@section('meta-description', "$be->packages_meta_description")

@section('content')
<!--   breadcrumb area start   -->
<div class="breadcrumb-area cases" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
   <div class="container">
      <div class="breadcrumb-txt">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-5">
               <span>{{convertUtf8($be->pricing_title)}}</span>
               <h1>{{convertUtf8($be->pricing_subtitle)}}</h1>
               <ul class="breadcumb">
                  <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                  <li>{{__('Packages')}}</li>
               </ul>
            </div>
			@if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col-xl-6 col-lg-6 col-sm-5">
                <img src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="" class="img-fluid">
				 </div>
			@endif
			
			   @if($bs->video_link!= null)
			   <div class="col">
				    <iframe width="100%" height="315"
                   src="{{$bs->video_link}}">
                   </iframe> 
              </div>
			  @endif
         </div>
      </div>
   </div>
   <div class="breadcrumb-area-overlay" style="background-color: #{{$be->breadcrumb_overlay_color}};opacity: {{$be->breadcrumb_overlay_opacity}};"></div>
</div>
<!--   breadcrumb area end    -->


<!--    Packages section start   -->
<div class="pricing-tables pricing-page">
   <div class="container">
     <div class="row">
       @foreach ($packages as $key => $package)
         <div class="col-lg-4 col-md-6">
           <div class="single-pricing-table">
              <span class="title">{{convertUtf8($package->title)}}</span>
              <div class="price">
                 <h1>{{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}}{{$package->price}}{{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}</h1>
              </div>
              <div class="features">
                 {!! replaceBaseUrl(convertUtf8($package->description)) !!}
              </div>

              @if ($package->order_status == 1)
              <a href="{{route('front.packageorder.index', $package->id)}}" class="pricing-btn">{{__('Place Order')}}</a>
              @endif

           </div>
         </div>
       @endforeach
     </div>
   </div>
</div>
<!--    Packages section end   -->

@if ($bs->call_to_action_section == 1)
<!--    call to action section start    -->
<div class="cta-section" style="background-image: url('{{asset('assets/front/img/'.$bs->cta_bg)}}');background-size:cover;">
   <div class="container">
      <div class="cta-content">
         <div class="row">
            <div class="col-md-9 col-lg-7">
               <h3>{{convertUtf8($bs->cta_section_text)}}</h3>
            </div>
            <div class="col-md-3 col-lg-5 contact-btn-wrapper">
               <a href="{{$bs->cta_section_button_url}}" class="boxed-btn contact-btn"><span>{{convertUtf8($bs->cta_section_button_text)}}</span></a>
            </div>
         </div>
      </div>
   </div>
   <div class="cta-overlay" style="background-color: #{{$be->cta_overlay_color}};opacity: {{$be->cta_overlay_opacity}};"></div>
</div>
<!--    call to action section end    -->
@endif


@endsection
