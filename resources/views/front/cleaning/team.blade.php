@extends('front.cleaning.layout')

@section('pagename')
 - {{__('Team Members')}}
@endsection

@section('meta-keywords', "$be->team_meta_keywords")
@section('meta-description', "$be->team_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5">
                 <span>{{convertUtf8($bs->team_title)}}</span>
                 <h1>{{convertUtf8($bs->team_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Team Members')}}</li>
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


		<!-- Start finlance_team section -->
		<section class="finlance_team team_v1 gray_bg pt-115 pb-80">
			<div class="container">
				<div class="team-carousel-active">
                    <div class="row">
                        @foreach ($members as $key => $member)
                            <div class="col-lg-4 col-md-6 mb-5">
                                <div class="single-team-item mx-0">
                                    <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                                    <div class="single-team-content">
                                        <div class="single-team-member-details">
                                            <h4>{{convertUtf8($member->name)}}</h4>
                                            <p>{{convertUtf8($member->rank)}}</p>
                                        </div>
                                        <ul class="team-social-links">
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
                            </div>
                        @endforeach
                    </div>
				</div>
			</div>
		</section>
		<!-- End finlance_team section -->
@endsection
