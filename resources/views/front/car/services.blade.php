@extends('front.car.layout')

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
  <div class="breadcrumb-area services d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                 <span>{{convertUtf8($bs->service_title)}}</span>
                 <h1>{{convertUtf8($bs->service_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Services')}}</li>
                 </ul>
              </div>
			   @if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col">
                <img style="max-width:100%" class="img-fluid" src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="">
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
  <div style="margin-top: 28px;" class="service-section">
     <div class="container">
     <div class="row">
     @if (hasCategory($be->theme_version))
<div class="col-lg-8">
                <div class="blog-sidebar-widgets">
                     <select name="format" id="format">
                    <option selected="" disabled="">{{__('Categories')}}</option>
                        @foreach ($scats as $key => $scat)
                        <option value="pdf">{{convertUtf8($scat->name)}}</option>
                        @endforeach   
                        </select>
                        <a href="{{route('front.services', ['category' => $scat->id, 'term'=>request()->input('term')])}}"><i style="color: black;" class="fa fa-search"></i></a>
                        </div></div>
                    @endif
                    <div class="col-lg-4"> <div class="blog-sidebar-widgets">
                <div class="searchbar-form-section">
                   <form action="{{route('front.services')}}">
                      <div class="searchbar">
                         <input name="category" type="hidden" value="{{request()->input('category')}}">
                         <input name="term" type="text" placeholder="{{__('Search Services')}}" value="{{request()->input('term')}}">
                         <button type="submit"><i class="fa fa-search"></i></button>
                      </div>
                   </form>
                </div>
             </div></div>
     </div>

        <div class="row">
        
           <div class="col-lg-12">
                <section class="finlance_service service_v1 pt-115 pb-80">
         
                    <div class="container">
                        <div class="row">
                        @foreach ($services as $key => $service)

<div class="news-card">
    <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}" class="news-card__card-link"></a>
    @if (!empty($service->main_image))
    <img src="{{asset('assets/front/img/services/' . $service->main_image)}}" alt="service" class="img-fluid news-card__image">
    @endif
    <div class="news-card__text-wrapper">
        <h2 class="news-card__title">{{convertUtf8($service->title)}}</h2>
        <div class="news-card__details-wrapper">
            <p>
                @if (strlen(convertUtf8($service->summary)) > 100)
                   {{substr(convertUtf8($service->summary), 0, 100)}}<span style="display: none;">{{substr(convertUtf8($service->summary), 100)}}</span>
                   <a href="#" class="see-more">see more...</a>
                @else
                   {{convertUtf8($service->summary)}}
                @endif
            </p>
            @if($service->details_page_status == 1)
                <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}" class="btn_link">{{__('Read More')}}</a>
            @endif
            <a href="{{route('front.servicedetails', [$service->slug, $service->id])}}" class="news-card__read-more">{{__('Read More')}} <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
    </div>
</div>
                            @endforeach
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
           <div class="col-lg-12 pt-115 pb-120">
            
            
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
  <!--    services section end   -->
@endsection

