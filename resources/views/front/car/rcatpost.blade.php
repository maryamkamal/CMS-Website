@extends('front.car.layout')

@section('pagename','- All Rss')

@section('meta-keywords', "$be->blogs_meta_keywords")
@section('meta-description', "$be->blogs_meta_description")

@section('content')
  <!--   hero area start   -->
  <div class="breadcrumb-area blogs d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container align-self-center">
        <div class="breadcrumb-txt">
           <div class="row">
              <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                <span>{{__('RSS')}}</span>
                 <h1>{{__('RSS Feeds')}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{__('Latest rss')}}</li>
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
     <div class="breadcrumb-area-overlay"></div>
  </div>
  <!--   hero area end    -->


  <!--    blog lists start   -->
  <div class="blog-lists section-padding">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="row">
                @if (count($posts) == 0)
                  <div class="col-md-12">
                    <div class="bg-light py-5">
                      <h3 class="text-center">{{__('NO FEED FOUND')}}</h3>
                    </div>
                  </div>
                @else
                  @foreach ($posts as $key => $post)
                    <div class="col-md-6">
                        <div class="single-blog">
                        <div class="blog-img-wrapper">
                            <img src="{{$post->photo}}" alt="">
                        </div>
                        <div class="blog-txt">
                            @php
                                if (!empty($currentLang)) {
                                    $postDate = \Carbon\Carbon::parse($post->created_at)->locale("$currentLang->code");
                                } else {
                                    $postDate = \Carbon\Carbon::parse($post->created_at)->locale("en");
                                }

                                $postDate = $postDate->translatedFormat('jS F, Y');
                            @endphp
                            <p class="date"><small>{{__('By')}} <span class="username">{{$post->category->feed_name}}</span></small> | <small>{{$postDate}}</small> </p>

                            <h4 class="blog-title"><a href="{{route('front.rssdetails', [$post->slug, $post->id])}}">{{strlen(convertUtf8($post->title)) > 40 ? substr(convertUtf8($post->title), 0, 40) . '...' : convertUtf8($post->title)}}</a></h4>

                            <p class="blog-summary">{!! (strlen(strip_tags(convertUtf8($post->description))) > 100) ? substr(strip_tags(convertUtf8($post->description)), 0, 100) . '...' : strip_tags(convertUtf8($post->description)) !!}</p>

                            <a href="{{route('front.rssdetails', [$post->slug, $post->id])}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>

                        </div>
                        </div>
                    </div>
                  @endforeach
                @endif
              </div>
              @if ($posts->total() > 4)
                <div class="row">
                   <div class="col-md-12">
                      <nav class="pagination-nav {{$posts->total() > 6 ? 'mb-4 mt-5' : ''}}">
                        {{$posts->links()}}
                      </nav>
                   </div>
                </div>
              @endif
           </div>
           <!--    blog sidebar section start   -->
           <div class="col-lg-4">
              <div class="sidebar">
                 <div class="blog-sidebar-widgets category-widget">
                    <div class="category-lists job">
                       <h4>{{__('Categories')}}</h4>
                       <ul>
                          @foreach ($categories as $key => $rcat)
                           <li class="single-category @if($cat_id == $rcat->id) active @endif"><a href="{{route('front.rcatpost',$rcat->id)}}">{{convertUtf8($rcat->feed_name)}}</a></li>
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
  <!--    blog lists end   -->
@endsection
