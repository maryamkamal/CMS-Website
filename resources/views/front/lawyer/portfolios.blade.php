@extends('front.lawyer.layout')

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
  <div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5">
                 <span>{{convertUtf8($bs->portfolio_title)}}</span>
                 <h1>{{convertUtf8($bs->portfolio_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Portfolios')}}</li>
                 </ul>
              </div>
			   @if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col-xl-6 col-lg-6 col-sm-5">
                <img src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="" class="img-fluid">
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


  <!--    case lists start   -->
  <div class="lawyer_project project_v1 pt-115 pb-85">
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
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="grid_item mx-0">
                            <div class="grid_inner_item">
                                <div class="lawyer_img">
                                    <img src="{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}" class="img-fluid" alt="">
                                    <div class="overlay_img"></div>
                                    <div class="overlay_content">
                                        <h3><a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}">{{convertUtf8(strlen($portfolio->title)) > 25 ? convertUtf8(substr($portfolio->title, 0, 25)) . '...' : convertUtf8($portfolio->title)}}</a></h3>
                                        @if (!empty($portfolio->service))
                                            <p>{{convertUtf8($portfolio->service->title)}}</p>
                                        @endif
                                        <a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}" class="lawyer_btn">{{__('View More')}}</a>
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
                <nav class="pagination-nav {{$portfolios->total() > 6 ? 'mb-4 mt-4' : ''}}">
                  {{$portfolios->appends(['category' => request()->input('category')])->links()}}
                </nav>
             </div>
          </div>
        @endif
     </div>
  </div>
  <!--    case lists end   -->
@endsection
