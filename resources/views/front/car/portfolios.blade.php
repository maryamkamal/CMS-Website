@extends('front.car.layout')

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{convertUtf8($category->name)}}
 @endif
 {{__('Portfolios')}}
@endsection

@section('meta-keywords', "$be->portfolios_meta_keywords")
@section('meta-description', "$be->portfolios_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                 <span>{{convertUtf8($bs->portfolio_title)}}</span>
                 <h1>{{convertUtf8($bs->portfolio_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Portfolios')}}</li>
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


  <!--    case lists start   -->
  <div class="case-lists section-padding case-page pt-115 pb-85">
     <div class="container">
        @if (hasCategory($be->theme_version))
            <div class="row">
            <div class="col-xl-12">
                <div class="case-types">
                    <ul class="text-center">
                        <li class="@if(empty(request()->input('category'))) active @endif"><a href="{{route('front.portfolios')}}">{{__('All')}}</a></li>

                        @foreach ($scats as $key => $scat)
                            <li class="@if(request()->input('category') == $scat->id) active @endif"><a href="{{route('front.portfolios', ['category'=>$scat->id])}}">{{convertUtf8($scat->name)}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
        @endif
        <div class="project_slide">
           <div class="row">
             @if (count($portfolios) == 0)
               <div class="col-lg-12 py-5 bg-light text-center mb-4">
                 <h3>{{__('NO PORTFOLIO FOUND')}}</h3>
               </div>
             @else
                @foreach ($portfolios as $key => $portfolio)
                    <div class="col-lg-6 mb-4">
                        <div class="grid_item">
                            <div class="grid_inner_item">
                                <div class="finlance_img">
                                    <img src="{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}" class="img-fluid" alt="">
                                    <div class="project_overlay">
                                        <div class="finlance_content">
                                            <a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}" class="more_icon"><i class="fas fa-angle-double-right"></i></a>

                                            <h3><a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}">{{convertUtf8(strlen($portfolio->title)) > 25 ? convertUtf8(substr($portfolio->title, 0, 25)) . '...' : convertUtf8($portfolio->title)}}</a></h3>


                                            @if (!empty($portfolio->service))
                                            <p>{{convertUtf8($portfolio->service->title)}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
             @endif
           </div>
        </div>
        @if ($portfolios->total() > 6)
          <div class="row">
             <div class="col-md-12">
                <nav class="pagination-nav {{$portfolios->total() > 6 ? 'mb-4 mt-5' : ''}}">
                  {{$portfolios->appends(['category' => request()->input('category')])->links()}}
                </nav>
             </div>
          </div>
        @endif
     </div>
  </div>
  
  <!--    case lists end   -->

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
