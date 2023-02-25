@extends('front.car.layout')

@section('pagename')
 - {{__('Packages')}}
@endsection

@section('meta-keywords', "$be->packages_meta_keywords")
@section('meta-description', "$be->packages_meta_description")

@section('content')
<!--   breadcrumb area start   -->
<div class="breadcrumb-area d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
   <div class="container align-self-center">
      <div class="breadcrumb-txt">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
               <span>{{convertUtf8($be->pricing_title)}}</span>
               <h1>{{convertUtf8($be->pricing_subtitle)}}</h1>
               <ul class="breadcumb">
                  <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                  <li>{{__('Packages')}}</li>
               </ul>
            </div>
			 @if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col">
                <img class="img-fluid" src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="">
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


<!-- Start finlance_pricing section -->
<section class="finlance_pricing pricing_v1 pt-115 pb-80">
    <div class="container">
        <div class="pricing_slide">
            <div class="row">
                @foreach ($packages as $key => $package)
                    <div class="col-lg-4 mb-5">
                        <div class="pricing_box text-center">
                            <div class="pricing_title">
                                <h3>{{convertUtf8($package->title)}}</h3>
                            </div>
                            <div class="pricing_price">
                                <h2 style="margin-bottom: 0px;">{{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}} {{$package->price}} {{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}</h2>
                            </div>
                            <div class="pricing_body">
                                {!! replaceBaseUrl(convertUtf8($package->description)) !!}
                            </div>
                            <div class="pricing_button">
                                @if ($package->order_status == 1)
                                    <a href="{{route('front.packageorder.index', $package->id)}}" class="finlance_btn">{{__('Place Order')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
     <!-- Start finlance_cta section -->
     @if ($bs->call_to_action_section == 1)
     <section class="finlance_cta cta_v1 pt-70 pb-70" style="background-image: url({{asset('assets/front/img/pattern_bg_2.jpg')}});">
        <div class="container">
           <div class="row align-items-center">
              <div class="col-lg-8">
                 <div class="section_title">
                    <h2>{{convertUtf8($bs->cta_section_text)}}</h2>
                 </div>
              </div>
              <div class="col-lg-4">
                 <div class="button_box">
                    <a href="{{$bs->cta_section_button_url}}" class="finlance_btn">{{convertUtf8($bs->cta_section_button_text)}}</a>
                 </div>
              </div>
           </div>
        </div>
     </section>
       @endif
       <!-- End finlance_cta section -->


       @endsection
