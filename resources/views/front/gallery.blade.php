@extends("front.$version.layout")

@section('pagename')
 - {{__('Gallery')}}
@endsection

@section('meta-keywords', "$be->gallery_meta_keywords")
@section('meta-description', "$be->gallery_meta_description")

@section('content')
<!--   breadcrumb area start   -->
<div class="breadcrumb-area d-flex" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
   <div class="container align-self-center">
      <div class="breadcrumb-txt">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
               <span>{{$bs->gallery_title}}</span>
               <h1>{{$bs->gallery_subtitle}}</h1>
               <ul class="breadcumb">
                  <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                  <li>{{__('GALLERY')}}</li>
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


<!--    Gallery section start   -->
<div class="gallery-section masonry clearfix">
   <div class="container">
      <div class="grid">
         <div class="grid-sizer"></div>
         @foreach ($galleries as $key => $gallery)
           <div class="single-pic">
              <img src="{{asset('assets/front/img/gallery/'.$gallery->image)}}" alt="">
              <div class="single-pic-overlay"></div>
              <div class="txt-icon">
                 <div class="outer">
                    <div class="inner">
                       <h4>{{convertUtf8(strlen($gallery->title)) > 20 ? convertUtf8(substr($gallery->title, 0, 20)) . '...' : convertUtf8($gallery->title)}}</h4>
                       <a class="icon-wrapper" href="{{asset('assets/front/img/gallery/'.$gallery->image)}}" data-lightbox="single-pic" data-title="{{convertUtf8($gallery->title)}}">
                       <i class="fas fa-search-plus"></i>
                       </a>
                    </div>
                 </div>
              </div>
           </div>
         @endforeach
      </div>
      <div class="row mt-5">
         <div class="col-md-12">
            <nav class="pagination-nav">
              {{$galleries->links()}}
            </nav>
         </div>
      </div>
   </div>
</div>
<!--    Gallery section end   -->

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
