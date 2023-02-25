@extends("front.$version.layout")

@section('pagename')
 - {{convertUtf8($page->name)}}
@endsection

@section('meta-keywords', "$page->meta_keywords")
@section('meta-description', "$page->meta_description")

@section('content')
  <!--   breadcrumb area start   -->
   @if($page->background_img!=null)
  <div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/pages/' . $page->background_img)}}');background-size:cover;">
 @else
	<div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
 @endif
     <div class="container">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                 <span>{{convertUtf8($page->title)}}</span>
                 <h1>{{convertUtf8($page->subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{convertUtf8($page->name)}}</li>
                 </ul>
              </div>
			
			   @if(($page->inner_image!=null)&&($page->video_link== null))
			   <div class="col">
                <img class="img-fluid" src="{{asset('assets/front/img/pages/'.$page->inner_image)}}" alt="">
				 </div>
			@endif
			
			   @if($page->video_link!= null)
			   <div class="col-xl-6 col-lg-6 col-sm-5">
				    <iframe width="420" height="315"
                   src="{{$page->video_link}}">
                   </iframe> 
              </div>
			  @endif
           </div>
        </div>
     </div>
     <div class="breadcrumb-area-overlay" style="background-color: #{{$be->breadcrumb_overlay_color}};opacity: {{$be->breadcrumb_overlay_opacity}};"></div>
  </div>
  <!--   breadcrumb area end    -->


  <!--   about company section start   -->
  <div class="about-company-section pt-115 pb-80">
     <div class="container">
        <div class="row">
           <div class="col-lg-12">
             {!! replaceBaseUrl(convertUtf8($page->body)) !!}
           </div>
        </div>
     </div>
  </div>


<!--   about company section end   -->
<div class="container py-3" style="min-height: 300px; height: 300px;">
   <div class="row h-100">



         <div class="col-lg-4 align-self-center" style="padding-top: 40px;">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner  ">

                  @foreach ($statistics as $key => $statistic)
                  <div class="carousel-item @if($key==0) active @endif" data-interval="5000">
                     <div class="counter_box text-center">
                        <div class="icon">
                           <i class="{{$statistic->icon}} fa-3x"></i>
                        </div>
                        <h2><span class="counter">{{convertUtf8($statistic->quantity)}}</span>+</h2>
                        <h4>{{convertUtf8($statistic->title)}}</h4>
                     </div>
                  </div>
                  @endforeach
               </div>

               <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>

               <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                  <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>






      {{-- <div class="col-lg-4" style="padding-top: 40px;">
         <div class="blog_slide finlance_fun finlance_fun_v1 pricing-carousel">
            @foreach ($statistics as $key => $statistic)
            <div class="grid_item ">
               <div class="grid_inner_item">
                  <div class="row align-items-end no-gutters">
                     <div class="col-lg-12 ">
                        <div class="counter_box text-center">
                           <div class="icon">
                              <i class="{{$statistic->icon}}"></i>
                           </div>
                           <h2><span class="counter">{{convertUtf8($statistic->quantity)}}</span>+</h2>
                           <h4>{{convertUtf8($statistic->title)}}</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div> --}}

      









      <div class="col-lg-4 finlance_about about_v1 bg_image pt-5"  style="background-image: url('{{asset('assets/front/img/'.$bs->intro_bg)}}'); background-size: cover; @if($bs->home_version == 'parallax') background-attachment: fixed; @endif">
         <div class="col-lg-12 text-center">
            <div class="play_box ">
               <a href="{{$bs->intro_section_video_link}}" class="play_btn"><i class="fas fa-play"></i></a>
            </div>
         </div>
      </div>



      



      {{-- <div class="col-lg-4">
         <div class="blog_slide finlance_feature feature_v1">
            @foreach ($features as $key => $feature)
            <div class="grid_item">
               <div class="grid_inner_item">
                  <div class="row align-items-center no-gutters">
                     <div class="col-lg-12 single_feature text-center">
                        <div class="grid_item">
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div> --}}



      <div class="col-lg-4 align-self-center" style="padding-top: 40px;">
         <div id="feature" class="carousel slide text-center" data-ride="carousel">
            <div class="carousel-inner ">

               @foreach ($features as $key => $feature)
               <div class="carousel-item @if($key==0) active @endif" data-interval="5000">
                  <div class="grid_inner_item">
                     <div class="finlance_icon">
                        <i class="{{$feature->icon}} fa-3x"></i>
                     </div>
                     <div class="finlance_content">
                        <h4>{{convertUtf8($feature->title)}}</h4>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>

            <a class="carousel-control-prev" href="#feature" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#feature" role="button" data-slide="next">
               <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>



   </div>
</div>


  <!--   call section start   -->
  @if ($bs->call_to_action_section == 1)
 <section class="finlance_cta cta_v1 pt-70 pb-70"
    style="background-image: url({{asset('assets/front/img/pattern_bg_2.jpg')}});">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-8">
             <div class="section_title">
                <h2>{{convertUtf8($bs->cta_section_text)}}</h2>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="button_box">
                <a href="{{$bs->cta_section_button_url}}"
                   class="finlance_btn">{{convertUtf8($bs->cta_section_button_text)}}</a>
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
<!--   call section end   -->
@endsection
