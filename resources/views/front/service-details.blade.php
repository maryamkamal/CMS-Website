@extends("front.$version.layout")

@section('pagename')
- {{__('Service')}} - {{convertUtf8($service->title)}}
@endsection

@section('meta-keywords', "$service->meta_keywords")
@section('meta-description', "$service->meta_description")

@section('content')
<!--   breadcrumb area start   -->
@if(($service->background_img)!=null)
<div class="breadcrumb-area"
   style="background-image: url('{{asset('assets/front/img/services/' . $service->background_img)}}'); background-repeat: no-repeat; background-size: cover;">
   @else
   <div class="breadcrumb-area"
      style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-repeat: no-repeat; background-size: cover;">
      @endif
      <div class="container">
         <div class="breadcrumb-txt">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-sm-5 align-self-center">
                  <span>{{convertUtf8($bs->service_details_title)}}</span>
                  <h1>{{convertUtf8($service->title)}}</h1>
                  <ul class="breadcumb">
                     <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                     <li>{{__('Service Details')}}</li>
                  </ul>
               </div>

               @if(($service->background_inner_img!=null)&&($service->video_link== null))
                  <div class="col-xl-6 col-lg-6 col-sm-5">
                     <img src="{{asset('assets/front/img/services/' . $service->background_inner_img)}}" class="img-fluid" alt="">
                  </div>
               @endif

               @if($service->video_link!= null)
               <div class="col-xl-6 col-lg-6 col-sm-5">
                  <iframe width="98%" height="315" src="{{$service->video_link}}" frameborder="0"
                     allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                     allowfullscreen style="box-shadow: 0 12px 10px 0px black;">
                  </iframe>
               </div>
               @endif
            </div>
         </div>
      </div>
      <div class="breadcrumb-area-overlay"
         style="background-color: #{{$be->breadcrumb_overlay_color}};opacity: {{$be->breadcrumb_overlay_opacity}};">
      </div>
   </div>
   <!--   breadcrumb area end    -->


<!--    services details section start   -->
<div class="pt-115 pb-110 service-details-section">
   <div class="container">
      <div class="row">
         @if (hasCategory($be->theme_version))
         <div class="col-lg-8">
            <div class="blog-sidebar-widgets">
               <div class="row">
                  <div class="col-10">
                     <select name="format" id="format">
                        <option selected="" disabled="">{{__('Categories')}}</option>
                        @foreach ($scats as $key => $scat)
                        <option value="pdf">{{convertUtf8($scat->name)}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-2">
                     <a class="btn btn-secondary rounded-pill" href="{{route('front.services', ['category' => $scat->id, 'term'=>request()->input('term')])}}">
                        Searsh
                     </a>
                  </div>
               </div>
               
               
            </div>
         </div>
         @endif
         
         <div class="col-lg-4">
            <div class="blog-sidebar-widgets">
               <div class="searchbar-form-section">
                  <form action="{{route('front.services')}}">
                     <div class="searchbar">
                        <input name="category" type="hidden" value="{{request()->input('category')}}">
                        <input name="term" type="text" placeholder="{{__('Search Services')}}"
                        value="{{request()->input('term')}}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
      <div class="row">
         
         <div class="col-12 text-center" >
            <div class="service-details">
               {!! replaceBaseUrl(convertUtf8($service->content)) !!}
            </div>
         </div>
         
         <div style="padding-top: 47px;" class="col-lg-8">
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
         <div class="container py-3 col-lg-4" style="min-height: 300px; height: 300px;">
            <div class="row h-100">
               <div class="col-lg-7 align-self-center" style="">
                  <div style="padding: 0;" class="product-area">
                  <div id="products" class="carousel slide text-center" data-ride="carousel">
                     <div class="carousel-inner ">
               
                        @foreach($products as $key => $product)
                        <div class="carousel-item @if($key==0) active @endif" data-interval="5000">
            
                        <div class="shop-item">
                            <div class="shop-thumb">
                                <img class="img-fluid" src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" alt="">
                               
                                <ul>
                                    <li><a href="{{route('front.product.checkout',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="{{__('Order Now')}}"><i class="far fa-credit-card"></i></a></li>
            
                                    <li><a class="cart-link" data-href="{{route('add.cart',$product->id)}}" data-toggle="tooltip" data-placement="top" title="{{__('Add to Cart')}}"><i class="fas fa-shopping-cart"></i></a></li>
            
                                    <li><a href="{{route('front.product.details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="{{__('View Details')}}"><i class="fas fa-eye"></i></a></li>
                                </ul>
                      
                            </div>
                      
                            <div class="shop-content text-center">
                                <div class="rate">
                                    <div class="rating" style="width:{{2 * 20}}%"></div>
                                </div>
                                <a href="">{{$product->slug}}</a> <br>
                                <span>
                                    <del>{{$product->previous_price}}</del>
                                    {{$product->current_price}}
                                </span>
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
            </div>

         {{-- Start of last proudact section --}}

      </div>
      
       {{-- Our portfolios --}}
   {{--<div class="row mt-5">
         
         <div class="col-lg-7 align-self-center">
            
           
            
            @if ($bs->portfolio_section == 1)
		<!-- Start finlance_project section -->
		<section class="finlance_project project_v1">
			<div class="container-full">
				
				<div class="project_slide project_slick">
                    @foreach ($portfolios as $key => $portfolio)
                        <div class="grid_item">
                            <div class="grid_inner_item">
                                <div class="finlance_img">
                                    <img src="{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}" class="img-fluid" alt="">
                                    <div class="project_overlay">
                                        <div class="finlance_content">
                                            <a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}" class="more_icon"><i class="fas fa-angle-double-right"></i></a>

                                            <h3><a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}">{{convertUtf8(strlen($portfolio->title)) > 25 ? convertUtf8(substr($portfolio->title, 0, 25)) . '...' : convertUtf8($portfolio->title)}}</a></h3>


                                            @if (!empty($portfolio->service))
                                            <p>{{convertUtf8($portfolio->service->title)}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
				</div>
			</div>
		</section><!-- End finlance_project section -->
        @endif
        --}}
            </div>
            
         </div>
       
         
      </div>
   </div>
</div>





<div class="container py-3 ma-m" style="min-height: 300px; height: 300px;">
   <div class="row h-100">
<div class="col-lg-6 align-self-center" style="">
   <div id="portfolios" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner ">

         @foreach ($portfolios as $key => $portfolio)
         <div class="carousel-item @if($key==0) active @endif" data-interval="5000">

      
             <div class="grid_inner_item">
                 <div class="finlance_img">
                     <img src="{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}" class="img-fluid" alt="">
                     <div class="project_overlay">
                         <div class="finlance_content">
                             <a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}" class="more_icon"><i class="fas fa-angle-double-right"></i></a>

                             <h3><a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}">{{convertUtf8(strlen($portfolio->title)) > 25 ? convertUtf8(substr($portfolio->title, 0, 25)) . '...' : convertUtf8($portfolio->title)}}</a></h3>


                             @if (!empty($portfolio->service))
                             <p>{{convertUtf8($portfolio->service->title)}}</p>
                             @endif
                         </div>
                     </div>
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
<div class="col-lg-6 ">
               <div>
                  <img src="{{asset('assets/front/img/portfolios/featured/1593840263.jpg')}}" class=" img-fluid" alt="">
               </div>
            </div>

   </div>
</div>







@if ($bs->call_to_action_section == 1)
<section class="finlance_cta cta_v1 pt-70 pb-70"
   style="    margin-top: 110px;
   background-image: url({{asset('assets/front/img/pattern_bg_2.jpg')}});">
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
<!--    services details section end   -->

@endsection