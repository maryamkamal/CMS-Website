@extends('front.car.layout')

@section('pagename')
 - {{__('Team Members')}}
@endsection

@section('meta-keywords', "$be->team_meta_keywords")
@section('meta-description', "$be->team_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                 <span>{{convertUtf8($bs->team_title)}}</span>
                 <h1>{{convertUtf8($bs->team_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Team Members')}}</li>
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


		<!-- Start finlance_team section -->
		<section class="finlance_team team-page team_v1 gray_bg pt-115 pb-80">
			<div class="container">
				<div class="team_slide">
                    <div class="row">
                        @foreach ($members as $key => $member)
                            <div class="col-lg-3 col-md-6 mb-5">
                                <div class="grid_item">
                                    <div class="grid_inner_item">
                                        <div class="finlance_img">
                                            <img src="{{asset('assets/front/img/members/'.$member->image)}}" class="img-fluid" alt="">
                                            <div class="team_overlay">
                                                <ul class="social_box">
                                                    @if (!empty($member->facebook))
                                                        <li><a href="{{$member->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if (!empty($member->twitter))
                                                        <li><a href="{{$member->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    @endif
                                                    @if (!empty($member->linkedin))
                                                        <li><a href="{{$member->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                                    @endif
                                                    @if (!empty($member->instagram))
                                                        <li><a href="{{$member->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="finlance_content" style="background-image: url({{asset('assets/front/img/pattern_bg.jpg')}});">
                                            <h4>{{convertUtf8($member->name)}}</h4>
                                            <p>{{convertUtf8($member->rank)}}</p>
                                        </div>
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
  
        
		<!-- End finlance_team section -->
@endsection
