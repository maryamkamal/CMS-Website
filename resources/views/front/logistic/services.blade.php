@extends('front.logistic.layout')

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{$category->name}}
 @endif
 {{__('Services')}}
@endsection

@section('meta-keywords', "$be->services_meta_keywords")
@section('meta-description', "$be->services_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5">
                 <span>{{convertUtf8($bs->service_title)}}</span>
                 <h1>{{convertUtf8($bs->service_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Services')}}</li>
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


  <!--    services section start   -->
  <div class="service-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
                <section class="logistics_service service_v1 pt-115 pb-80">
                    <div class="container">
                        <div class="service_slide">
                            <div class="row">
                                @foreach ($services as $key => $service)
                                    <div class="col-md-6 mb-5">
                                        <div class="grid_item mx-0">
                                            <div class="grid_inner_item">
                                                @if (!empty($service->main_image))
                                                    <div class="logistics_icon">
                                                        <img src="{{asset('assets/front/img/services/' . $service->main_image)}}" alt="service" />
                                                    </div>
                                                @endif
                                                <div class="logistics_content">
                                                    <h4>{{convertUtf8($service->title)}}</h4>
                                                    <p>
                                                        @if (strlen(convertUtf8($service->summary)) > 120)
                                                           {{substr(convertUtf8($service->summary), 0, 120)}}<span style="display: none;">{{substr(convertUtf8($service->summary), 120)}}</span>
                                                           <a href="#" class="see-more">see more...</a>
                                                        @else
                                                           {{convertUtf8($service->summary)}}
                                                        @endif
                                                    </p>
                                                    @if($service->details_page_status == 1)
                                                        <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}" class="btn_link">{{__('Read More')}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                            <nav class="pagination-nav">
                                {{$services->appends(['category' => request()->input('category'), 'term' => request()->input('term')])->links()}}
                            </nav>
                            </div>
                        </div>
                    </div>
                </section>
           </div>
           <!--    service sidebar start   -->
           <div class="col-lg-4 pt-115 pb-120">
             <div class="blog-sidebar-widgets">
                <div class="searchbar-form-section">
                   <form action="{{route('front.services')}}">
                      <div class="searchbar">
                         <input name="category" type="hidden" value="{{request()->input('category')}}">
                         <input name="term" type="text" placeholder="{{__('Search Services')}}" value="{{request()->input('term')}}">
                         <button type="submit"><i class="fa fa-search"></i></button>
                      </div>
                   </form>
                </div>
             </div>
             @if (hasCategory($be->theme_version))
             <div class="blog-sidebar-widgets category-widget">
                <div class="category-lists job">
                   <h4>{{__('Categories')}}</h4>
                   <ul>
                     @foreach ($scats as $key => $scat)
                       <li class="single-category {{$scat->id == request()->input('category') ? 'active' : ''}}"><a href="{{route('front.services', ['category' => $scat->id, 'term'=>request()->input('term')])}}">{{convertUtf8($scat->name)}}</a></li>
                     @endforeach
                   </ul>
                </div>
             </div>
             @endif
             <div class="subscribe-section">
                <span>{{__('SUBSCRIBE')}}</span>
                <h3>{{__('SUBSCRIBE FOR NEWSLETTER')}}</h3>
                <form id="subscribeForm" class="subscribe-form" action="{{route('front.subscribe')}}" method="POST">
                   @csrf
                   <div class="form-element"><input name="email" type="email" placeholder="{{__('Email')}}"></div>
                   <p id="erremail" class="text-danger mb-3 err-email"></p>
                   <div class="form-element"><input type="submit" value="{{__('Subscribe')}}"></div>
                </form>
             </div>
           </div>
           <!--    service sidebar end   -->
        </div>
     </div>
  </div>
  <!--    services section end   -->
@endsection
