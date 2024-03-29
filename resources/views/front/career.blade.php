@extends("front.$version.layout")

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{convertUtf8($category->name)}}
 @endif
 {{__('Jobs')}}
@endsection

@section('meta-keywords', "$be->career_meta_keywords")
@section('meta-description', "$be->career_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area jobs d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                 <span>{{convertUtf8($be->career_title)}}</span>
                 <h1>{{convertUtf8($be->career_subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Career')}}</li>
                 </ul>
              </div>
			   @if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col">
                <img src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="" class="img-fluid">
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


  <!--    job lists start   -->
  <div class="job-lists">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="row">
                @if (count($jobs) == 0)
                  <div class="col-12 bg-light py-5">
                    <h3 class="text-center">{{__('NO JOB FOUND')}}</h3>
                  </div>
                @else
                  @foreach ($jobs as $key => $job)
                    <div class="col-md-12">
                       <div class="single-job @if($loop->last) mb-0 @endif">

                            <h3><a href="{{route('front.careerdetails', [$job->slug, $job->id])}}" class="title">{{convertUtf8($job->title)}}</a></h3>

                            @php
                            $deadline = \Carbon\Carbon::parse($job->deadline)->locale("$currentLang->code");
                            $deadline = $deadline->translatedFormat('jS F, Y');
                            @endphp

                            <p class="deadline"><strong><i class="far fa-calendar-alt"></i> {{__('Deadline')}}:</strong> {{$deadline}}</p>
                            <p class="education"><strong><i class="fas fa-graduation-cap"></i> {{__('Educational Experience')}}:</strong> {!! (strlen(convertUtf8(strip_tags($job->educational_requirements))) > 110) ? convertUtf8(substr(strip_tags($job->educational_requirements), 0, 110)) . '...' : convertUtf8(strip_tags($job->educational_requirements)) !!}</p>
                            <p class="experience"><strong><i class="fas fa-briefcase"></i> {{__('Work Experience')}}:</strong> {{convertUtf8($job->experience)}}</p>
                       </div>
                    </div>
                  @endforeach
                @endif
              </div>
              <div class="row">
                <div class="col-md-12">
                   <nav class="pagination-nav">
                     {{$jobs->appends(['category' => request()->input('category'), 'term' => request()->input('term')])->links()}}
                   </nav>
                </div>
              </div>
           </div>
           <!--    job sidebar start   -->
           <div class="col-lg-4">
             <div class="blog-sidebar-widgets">
                <div class="searchbar-form-section">
                   <form action="{{route('front.career')}}">
                      <div class="searchbar">
                         <input name="category" type="hidden" value="{{request()->input('category')}}">
                         <input name="term" type="text" placeholder="{{__('Search Jobs')}}" value="{{request()->input('term')}}">
                         <button type="submit"><i class="fa fa-search"></i></button>
                      </div>
                   </form>
                </div>
             </div>
             <div class="blog-sidebar-widgets category-widget">
                <div class="category-lists job">
                   <h4>{{__('Job Categories')}}</h4>
                   <ul>
                        <li class="single-category {{empty(request()->input('category')) ? 'active' : ''}}">
                            <a href="{{route('front.career')}}">{{__('All')}} <span>({{$jobscount}})</span></a>
                        </li>
                        @foreach ($jcats as $key => $jcat)
                            <li class="single-category {{$jcat->id == request()->input('category') ? 'active' : ''}}"><a href="{{route('front.career', ['category' => $jcat->id, 'term'=>request()->input('term')])}}">{{convertUtf8($jcat->name)}} <span>({{$jcat->jobs()->count()}})</span></a></li>
                        @endforeach
                   </ul>
                </div>
             </div>
           </div>
           <!--    job sidebar end   -->
        </div>
     </div>
  </div>
  <!--    job lists end   -->

  @if ($bs->call_to_action_section == 1)
<!--    call to action section start    -->
<div class="cta-section" style="background-image: url('{{asset('assets/front/img/'.$bs->cta_bg)}}');background-size:cover;">
   <div class="container">
      <div class="cta-content">
         <div class="row">
            <div class="col-md-9 col-lg-7">
               <h3>{{convertUtf8($bs->cta_section_text)}}</h3>
            </div>
            <div class="col-md-3 col-lg-5 contact-btn-wrapper">
               <a href="{{$bs->cta_section_button_url}}" class="boxed-btn contact-btn"><span>{{convertUtf8($bs->cta_section_button_text)}}</span></a>
            </div>
         </div>
      </div>
   </div>
   <div class="cta-overlay" style="background-color: #{{$be->cta_overlay_color}};opacity: {{$be->cta_overlay_opacity}};"></div>
</div>
<!--    call to action section end    -->
@endif

@endsection
