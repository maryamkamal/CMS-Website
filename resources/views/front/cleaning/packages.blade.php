@extends('front.cleaning.layout')

@section('pagename')
 - {{__('Packages')}}
@endsection

@section('meta-keywords', "$be->packages_meta_keywords")
@section('meta-description', "$be->packages_meta_description")

@section('content')
<!--   breadcrumb area start   -->
<div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
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
                <img src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="">
				 </div>
			@endif
			
			   @if($bs->video_link!= null)
			   <div class="col-xl-6 col-lg-6 col-sm-5">
				    <iframe width="420" height="315"
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
<section class="lawyer_pricing pricing_v1 pt-115 pb-80">
    <div class="container">
        <div class="pricing_slide">
            <div class="row">
                @foreach ($packages as $key => $package)
                <div class="col-lg-4 mb-5">

                <div class="single-price-item text-center">
                    <div class="price-heading">
                        <h3>{{convertUtf8($package->title)}}</h3>
                        <span>{{__('Featured Package')}}</span>
                    </div>
                    <h1 class="bg-1" style="background: #{{$package->color}};">{{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}}{{$package->price}}{{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}</h1>
                    <div class="price-cata mb-4">
                        {!! replaceBaseUrl(convertUtf8($package->description)) !!}
                    </div>
                    @if ($package->order_status == 1)
                        <a href="{{route('front.packageorder.index', $package->id)}}" class="main-btn price-btn">{{__('Place Order')}}</a>
                    @endif
                </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End finlance_pricing section -->
@endsection
