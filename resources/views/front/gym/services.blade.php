@extends('front.gym.layout')

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
  <div class="breadcrumb-area services" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
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
                <img src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="">
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


  <!--    services section start   -->
  <div class="service-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <section class="finlance_service service_v1 pt-115 pb-120">
                <div class="service_slide">
                    <div class="row">
                        @if (count($services) == 0)
                        <div class="col-12 bg-light py-5">
                            <h3 class="text-center">{{__('NO SERVICE FOUND')}}</h3>
                        </div>
                        @else
                        @foreach ($services as $key => $service)
                            <div class="col-lg-6 mb-4">
                                <div class="grid_item">
                                    <div class="grid_inner_item">
                                        <div class="finlance_img">
                                            <img src="{{asset('assets/front/img/services/'.$service->main_image)}}" class="img-fluid" alt="">
                                            <div class="service_overlay">
                                                @if ($service->details_page_status == 1)
                                                    <div class="button_box">
                                                        <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}" class="more_icon"><i class="fas fa-angle-double-right"></i></a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="finlance_content">
                                            <h4><a class="text-white" @if($service->details_page_status == 1) href="{{route('front.servicedetails', [$service->slug, $service->id])}}" @endif>{{convertUtf8(strlen($service->title)) > 20 ? convertUtf8(substr($service->title, 0, 20)) . '...' : convertUtf8($service->title)}}</a></h4>
                                        </div>
                                        <div class="summary text-center mt-2">
                                            @if (strlen(convertUtf8($service->summary)) > 100)
                                               {{substr(convertUtf8($service->summary), 0, 100)}}<span style="display: none;">{{substr(convertUtf8($service->summary), 100)}}</span>
                                               <a href="#" class="see-more">see more...</a>
                                            @else
                                               {{convertUtf8($service->summary)}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                    <nav class="pagination-nav">
                        {{$services->appends(['category' => request()->input('category'), 'term' => request()->input('term')])->links()}}
                    </nav>
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
