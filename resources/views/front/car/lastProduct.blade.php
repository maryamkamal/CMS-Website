<!-- Start last-Product section -->

<section class="finlance_team team_v1 pt-115 pb-120 last-Product">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-70">
                    <span>Last product</span>
                    <h2>you will find the new on out online story</h2>
                </div>
            </div>
        </div>
        
        <div class="product-area team_slide team_slick">

            @foreach($products as $product)

            <div class="shop-item">
                <div class="shop-thumb">
                    <img src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" alt="">
                   
                    <ul>
                        <li><a href="" data-toggle="tooltip" data-placement="top" title="{{__('Order Now')}}"><i class="far fa-credit-card"></i></a></li>
          
                        <li><a class="cart-link" data-href="" data-toggle="tooltip" data-placement="top" title="{{__('Add to Cart')}}"><i class="fas fa-shopping-cart"></i></a></li>
          
                        <li><a href="" data-toggle="tooltip" data-placement="top" title="{{__('View Details')}}"><i class="fas fa-eye"></i></a></li>
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
            
            @endforeach

        </div>
    </div>
</section>

<!-- End last-Product section -->