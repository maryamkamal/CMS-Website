@extends("front.$version.layout")

@section('pagename')
 - {{convertUtf8($post->title)}}
@endsection

@section('content')
  <!--   hero area end   -->
  <div class="blog-details breadcrumb-area d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                <span>{{convertUtf8($bs->rss_details_title)}}</span>
                <h1>{{strlen(convertUtf8($post->title)) > 200 ? substr(convertUtf8($post->title), 0, 200) . '...' : convertUtf8($post->title)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('RSS Feed Details')}}</li>
                 </ul>
              </div>
			  @if(($bs->inner_image!=null)&&($bs->video_link== null))
			   <div class="col">
                <img class="img-fluid" src="{{asset('assets/front/img/' . $bs->inner_image)}}" alt="">
				 </div>
			@endif
			
			   @if($bs->video_link!= null)
			   <div class="col">
				    <iframe width="100% " height="315"
                   src="{{$bs->video_link}}">
                   </iframe> 
              </div>
			  @endif
           </div>
        </div>
     </div>
     <div class="breadcrumb-area-overlay" style="background-color: #{{$be->breadcrumb_overlay_color}};opacity: {{$be->breadcrumb_overlay_opacity}};"></div>
  </div>
  <!--   hero area end    -->


  <!--    blog details section start   -->
  <div class="blog-details-section section-padding">
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="blog-details">
                 <img class="blog-details-img-1" src="{{$post->photo}}" alt="">
                 <small class="date">{{date('F d, Y', strtotime($post->created_at))}}  -  {{__('BY')}} {{$post->category->feed_name}}</small>
                 <h2 class="blog-details-title">{{convertUtf8($post->title)}}</h2>
                 <div class="blog-details-body">
                   {!! convertUtf8($post->description) !!}
                 </div>

                 <div class="text-left">
                    <a target="_blank" href="{{$post->rss_link}}" class="boxed-btn py-2 mt-4 text-capitalize">{{$post->category->read_more_button}}</a>
                 </div>
              </div>
              <div class="blog-share mb-5">
                 <ul>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}" class="facebook-share"><i class="fab fa-facebook-f"></i> {{__('Share')}}</a></li>
                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}" class="twitter-share"><i class="fab fa-twitter"></i> {{__('Tweet')}}</a></li>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title={{convertUtf8($post->title)}}" class="linkedin-share"><i class="fab fa-linkedin-in"></i> {{__('Linkedin')}}</a></li>
                 </ul>
              </div>

              <div class="comment-lists">
                <div id="disqus_thread"></div>
              </div>
           </div>
           <!--    blog sidebar section start   -->
           <div class="col-lg-4">
              <div class="sidebar">
                 <div class="blog-sidebar-widgets category-widget">
                    <div class="category-lists job">
                       <h4>{{__('Categories')}}</h4>
                       <ul>
                            @foreach ($categories as $key => $rcat)
                                <li class="single-category"><a href="{{route('front.rcatpost',$rcat->id)}}">{{convertUtf8($rcat->feed_name)}}</a></li>
                            @endforeach
                       </ul>
                    </div>
                 </div>

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
           </div>
           <!--    blog sidebar section end   -->
        </div>
     </div>
  </div>
  <!--    blog details section end   -->
  
 <!--    start contact section   -->

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

   <!--    end contact section   -->
@endsection

@section('scripts')
@if($bs->is_disqus == 1)
{!! $bs->disqus_script !!}
@endif
@endsection
