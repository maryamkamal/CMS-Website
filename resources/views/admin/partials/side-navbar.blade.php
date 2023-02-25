@php
  $default = \App\Language::where('is_default', 1)->first();
  $admin = Auth::guard('admin')->user();
  if (!empty($admin->role)) {
    $permissions = $admin->role->permissions;
    $permissions = json_decode($permissions, true);
  }
@endphp

<div class="sidebar sidebar-style-2" data-background-color="dark2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
  
      <ul class="nav nav-primary">

        @if (empty($admin->role) || (!empty($permissions) && in_array('Dashboard', $permissions)))
          {{-- Dashboard --}}
          <li class="nav-item @if(request()->path() == 'admin/dashboard') active @endif">
            <a href="{{route('admin.dashboard')}}">
              <i class="la flaticon-paint-palette"></i>
              <p>{{ __('trans.Dashboard') }}</p>
            </a>
          </li>
        @endif



        @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
          {{-- Basic Settings --}}
          <li class="nav-item
          @if(request()->path() == 'admin/favicon') active
          @elseif(request()->path() == 'admin/logo') active
          @elseif(request()->path() == 'admin/themeversion') active
          @elseif(request()->path() == 'admin/homeversion') active
          @elseif(request()->path() == 'admin/basicinfo') active
          @elseif(request()->path() == 'admin/herosection/static') active
          @elseif(request()->path() == 'admin/herosection/video') active
          @elseif(request()->path() == 'admin/herosection/sliders') active
          @elseif(request()->is('admin/herosection/slider/*/edit')) active
          
          @elseif(request()->path() == 'admin/breadcrumb') active
          @elseif(request()->path() == 'admin/menu-builder') active
          
          @endif">
            <a data-toggle="collapse" href="#basic">
              <i class="la flaticon-settings"></i>
              <p>{{ __('trans.Basic Settings') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse  
            @if(request()->path() == 'admin/favicon') show
            @elseif(request()->path() == 'admin/logo') show
            @elseif(request()->path() == 'admin/themeversion') show
            @elseif(request()->path() == 'admin/homeversion') show
            @elseif(request()->path() == 'admin/menu-builder') show

            @elseif(request()->path() == 'admin/basicinfo') show
            @elseif(request()->path() == 'admin/herosection/static') show
            @elseif(request()->path() == 'admin/herosection/video') show
            @elseif(request()->path() == 'admin/herosection/sliders') show
            @elseif(request()->is('admin/herosection/slider/*/edit')) show
            
            
            @elseif(request()->path() == 'admin/breadcrumb') show
            
            
            @endif" id="basic">
              <ul class="nav nav-collapse">


              <li class="@if(request()->path() == 'admin/themeversion') active @endif">
                  <a href="{{route('admin.themeversion') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Theme Versions') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/basicinfo') active @endif">
                  <a href="{{route('admin.basicinfo') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.General Settings') }}</span>
                  </a>
                </li>

                <li class="@if(request()->path() == 'admin/homeversion') active @endif">
                  <a href="{{route('admin.homeversion') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.slider Versions') }}</span>
                  </a>
                </li>
                <li class="
                @if(request()->path() == 'admin/herosection/static') selected
                @elseif(request()->path() == 'admin/herosection/video') selected
                @elseif(request()->path() == 'admin/herosection/sliders') selected
                @elseif(request()->is('admin/herosection/slider/*/edit')) selected
                @endif">
                  <a data-toggle="collapse" href="#herosection">
                    <span class="sub-item">{{ __('trans.slider setting') }}</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse
                  @if(request()->path() == 'admin/herosection/static') show
                  @elseif(request()->path() == 'admin/herosection/video') show
                  @elseif(request()->path() == 'admin/herosection/sliders') show
                  @elseif(request()->is('admin/herosection/slider/*/edit')) show
                  @endif" id="herosection">
                    <ul class="nav nav-collapse subnav">
                      <li class="@if(request()->path() == 'admin/herosection/static') active @endif">
                        <a href="{{route('admin.herosection.static') . '?language=' . $default->code}}">
                          <span class="sub-item">{{ __('trans.Static Version') }}</span>
                        </a>
                      </li>
                      <li class="
                      @if(request()->path() == 'admin/herosection/sliders') active
                      @elseif(request()->is('admin/herosection/slider/*/edit')) active
                      @endif">
                        <a href="{{route('admin.slider.index') . '?language=' . $default->code}}">
                          <span class="sub-item">{{ __('trans.Slider Version') }}</span>
                        </a>
                      </li>
                      <li class="@if(request()->path() == 'admin/herosection/video') active @endif">
                        <a href="{{route('admin.herosection.video') . '?language=' . $default->code}}">
                          <span class="sub-item">{{ __('trans.Video Version') }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                

                <li class="sub-item
                  @if(request()->path() == 'admin/menu-builder') active @endif">
                  <a href="{{route('admin.menu_builder.index') . '?language=' . $default->code}}">
              
                    <span class="sub-item">{{ __('trans.Drag & Drop Menu Builder') }}</span>

                  </a>
                </li>


                <li class="@if(request()->path() == 'admin/breadcrumb') active @endif">
                  <a href="{{route('admin.breadcrumb') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Background pages') }}</span>
                  </a>
                </li>


                <li class="@if(request()->path() == 'admin/logo') active @endif">
                  <a href="{{route('admin.logo') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Logo') }}</span>
                  </a>
                </li>


                <li class="@if(request()->path() == 'admin/favicon') active @endif">
                  <a href="{{route('admin.favicon') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Favicon') }}</span>
                  </a>
                </li>



              </ul>
            </div>
          </li>
        @endif


        {{-- Backup Database --}}
        @if (empty($admin->role) || (!empty($permissions) && in_array('Customers', $permissions)))
      
        @endif

        
        @if (empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions)))
          {{-- Subscribers --}}
         
        @endif





        @if (empty($admin->role) || (!empty($permissions) && in_array('Package Management', $permissions)))
          {{-- Package Management --}}

        @endif


        @if (empty($admin->role) || (!empty($permissions) && in_array('Quote Management', $permissions)))
          {{-- Quotes --}}
         
        @endif



        @if (empty($admin->role) || (!empty($permissions) && in_array('Product Management', $permissions)))
          {{-- Product --}}
         
        @endif



@if (empty($admin->role) || (!empty($permissions) && in_array('Tickets', $permissions)))
        {{-- Tickets --}}
        
  @endif

        @if (empty($admin->role) || (!empty($permissions) && in_array('Payment Gateways', $permissions)))
          {{-- Payment Gateways --}}
         

        @endif




        @if (empty($admin->role) || (!empty($permissions) && in_array('Home Page', $permissions)))
          {{-- Home Page --}}
          
          <li class="nav-item
              @if(request()->path() == 'admin/introsection') active 
              @elseif(request()->path() == 'admin/servicesection') active 
            
              @elseif(request()->path() == 'admin/approach') active 
              @elseif(request()->is('admin/approach/*/pointedit')) active 
              @elseif(request()->path() == 'admin/statistics') active 
              @elseif(request()->is('admin/statistics/*/edit')) active 
              @elseif(request()->path() == 'admin/members') active 
              @elseif(request()->is('admin/member/*/edit')) active 
              @elseif(request()->is('admin/approach/*/pointedit')) active 
              @elseif(request()->path() == 'admin/cta') active 
              @elseif(request()->path() == 'admin/testimonials') active 
              @elseif(request()->is('admin/testimonial/*/edit')) active 
              @elseif(request()->path() == 'admin/invitation') active 
              @elseif(request()->path() == 'admin/partners') active 
              @elseif(request()->is('admin/partner/*/edit')) active 
              @elseif(request()->path() == 'admin/portfoliosection') active 
			  @elseif(request()->path() == 'admin/productsection') active
              @elseif(request()->path() == 'admin/blogsection') active 
              @elseif(request()->path() == 'admin/member/create') active 
              @elseif(request()->path() == 'admin/sections') active 
              @elseif(request()->path() == 'admin/package/background') active 
              @elseif(request()->path() == 'admin/heading') active
              @elseif(request()->path() == 'admin/footers') active
              @elseif(request()->path() == 'admin/ulinks') active
              @elseif(request()->path() == 'admin/scategorys') active
              @elseif(request()->is('admin/scategory/*/edit')) active
              @elseif(request()->path() == 'admin/services') active
                @elseif(request()->is('admin/service/*/edit')) active
                @elseif(request()->path() == 'admin/page/create') active
                @elseif(request()->path() == 'admin/pages') active
                @elseif(request()->is('admin/page/*/edit')) active
                @elseif(request()->path() == 'admin/jcategorys') active
                @elseif(request()->path() == 'admin/job/create') active
                @elseif(request()->is('admin/jcategory/*/edit')) active
                @elseif(request()->path() == 'admin/jobs') active
                @elseif(request()->is('admin/job/*/edit')) active
                @elseif(request()->path() == 'admin/portfolios') active
                @elseif(request()->path() == 'admin/portfolio/create') active
                @elseif(request()->is('admin/portfolio/*/edit')) active
                @elseif(request()->path() == 'admin/calendars') active
                @elseif(request()->path() == 'admin/gallery') active
                @elseif(request()->path() == 'admin/gallery/create') active
                @elseif(request()->is('admin/gallery/*/edit')) active
                @elseif(request()->path() == 'admin/faqs') active
                @elseif(request()->path() == 'admin/bcategorys') active
                @elseif(request()->path() == 'admin/blogs') active
                @elseif(request()->path() == 'admin/archives') active
                @elseif(request()->is('admin/blog/*/edit')) active
                @elseif(request()->path() == 'admin/rss/create') active
                @elseif(request()->path() == 'admin/rss/feeds') active
                @elseif(request()->path() == 'admin/rss') active
                @elseif(request()->is('admin/rss/edit/*')) active
                @elseif(request()->path() == 'admin/features') active
                @elseif(request()->is('admin/feature/*/edit')) active
                @endif">
            <a class="
            
            " data-toggle="collapse" href="#cms">
              <i class="la flaticon-home"></i>
              <p>{{ __('trans.CMS') }}</p>  
              <span class="caret"></span>
            </a>

            <div class="collapse
                @if(request()->path() == 'admin/introsection') show
                @elseif(request()->path() == 'admin/servicesection') show
                @elseif(request()->path() == 'admin/herosection/static') show
              
                @elseif(request()->path() == 'admin/approach') show
                @elseif(request()->is('admin/approach/*/pointedit')) show
                @elseif(request()->path() == 'admin/statistics') show
                @elseif(request()->is('admin/statistics/*/edit')) show
                @elseif(request()->path() == 'admin/members') show
                @elseif(request()->is('admin/member/*/edit')) show
                @elseif(request()->path() == 'admin/cta') show
                
                @elseif(request()->path() == 'admin/testimonials') show
                @elseif(request()->is('admin/testimonial/*/edit')) show
                @elseif(request()->path() == 'admin/invitation') show
                @elseif(request()->path() == 'admin/partners') show
                @elseif(request()->is('admin/partner/*/edit')) show
                @elseif(request()->path() == 'admin/portfoliosection') show
				@elseif(request()->path() == 'admin/productsection') show
                @elseif(request()->path() == 'admin/blogsection') show
                @elseif(request()->path() == 'admin/member/create') show
                @elseif(request()->path() == 'admin/sections') show
                @elseif(request()->path() == 'admin/package/background') show
                @elseif(request()->path() == 'admin/heading') show
                @elseif(request()->path() == 'admin/footers') show
                @elseif(request()->path() == 'admin/ulinks') show
                @elseif(request()->path() == 'admin/scategorys') show
                @elseif(request()->is('admin/scategory/*/edit')) show
                @elseif(request()->path() == 'admin/services') show
                @elseif(request()->is('admin/service/*/edit')) show
                @elseif(request()->path() == 'admin/page/create') show
                @elseif(request()->path() == 'admin/pages') show
                @elseif(request()->is('admin/page/*/edit')) show
                @elseif(request()->path() == 'admin/jcategorys') show
                @elseif(request()->path() == 'admin/job/create') show
                @elseif(request()->is('admin/jcategory/*/edit')) show
                @elseif(request()->path() == 'admin/jobs') show
                @elseif(request()->is('admin/job/*/edit')) show
                @elseif(request()->path() == 'admin/portfolios') show
                @elseif(request()->path() == 'admin/portfolio/create') show
                @elseif(request()->is('admin/portfolio/*/edit')) show
                @elseif(request()->path() == 'admin/calendars') show
                @elseif(request()->path() == 'admin/gallery') show
                @elseif(request()->path() == 'admin/gallery/create') show
                @elseif(request()->is('admin/gallery/*/edit')) show
                @elseif(request()->path() == 'admin/faqs') show
                @elseif(request()->path() == 'admin/bcategorys') show
                @elseif(request()->path() == 'admin/blogs') show
                @elseif(request()->path() == 'admin/archives') show
                @elseif(request()->is('admin/blog/*/edit')) show
                @elseif(request()->path() == 'admin/rss/create') show
                @elseif(request()->path() == 'admin/rss/feeds') show
                @elseif(request()->path() == 'admin/rss') show
                @elseif(request()->is('admin/rss/edit/*')) show
                @elseif(request()->path() == 'admin/features') show
                @elseif(request()->is('admin/feature/*/edit')) show
                @endif" id="cms">
                  <ul class="nav nav-collapse">
                    <li class="sub-item
              ">
                <a data-toggle="collapse" href="#home">
                  <i class="fa-microphone flaticon-home la"></i>
                  <p>{{ __('trans.Home Page') }}</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse 
                @if(request()->path() == 'admin/introsection') show
                @elseif(request()->path() == 'admin/servicesection') show
                @elseif(request()->path() == 'admin/herosection/static') show
              
                @elseif(request()->path() == 'admin/approach') show
                @elseif(request()->is('admin/approach/*/pointedit')) show
                @elseif(request()->path() == 'admin/statistics') show
                @elseif(request()->is('admin/statistics/*/edit')) show
                @elseif(request()->path() == 'admin/members') show
                @elseif(request()->is('admin/member/*/edit')) show
                @elseif(request()->path() == 'admin/cta') show
                
                @elseif(request()->path() == 'admin/testimonials') show
                @elseif(request()->is('admin/testimonial/*/edit')) show
                @elseif(request()->path() == 'admin/invitation') show
                @elseif(request()->path() == 'admin/partners') show
                @elseif(request()->is('admin/partner/*/edit')) show
                @elseif(request()->path() == 'admin/portfoliosection') show
				@elseif(request()->path() == 'admin/productsection') show
                @elseif(request()->path() == 'admin/blogsection') show
                @elseif(request()->path() == 'admin/member/create') show
                @elseif(request()->path() == 'admin/sections') show
                @elseif(request()->path() == 'admin/package/background') show
                @elseif(request()->path() == 'admin/footers') show
                @elseif(request()->path() == 'admin/ulinks') show
                @elseif(request()->path() == 'admin/features') show
                @elseif(request()->is('admin/feature/*/edit')) show
                
                @endif" id="home">
                  <ul class="nav nav-collapse">
                  
                  <li class="
                    @if(request()->path() == 'admin/sections') active
                    @endif">
                      <a href="{{route('admin.sections.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Section Customization') }}</span>
                      </a>
                    </li>

                    <li class="
                    @if(request()->path() == 'admin/features') active
                    @elseif(request()->is('admin/feature/*/edit')) active
                    @endif">
                      <a href="{{route('admin.feature.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Features') }}</span>
                      </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/introsection') active @endif">
                      <a href="{{route('admin.introsection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Intro Section') }}</span>
                      </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/servicesection') active @endif">
                      <a href="{{route('admin.servicesection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Service Section') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/approach') active
                    @elseif(request()->is('admin/approach/*/pointedit')) active
                    @endif">
                      <a href="{{route('admin.approach.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Approach Section') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/statistics') active
                    @elseif(request()->is('admin/statistics/*/edit')) active
                    @endif">
                      <a href="{{route('admin.statistics.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Statistics Section') }}</span>
                      </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/cta') active @endif">
                      <a href="{{route('admin.cta.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Call to Action Section') }}</span>
                      </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/portfoliosection') active @endif">
                      <a href="{{route('admin.portfoliosection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Portfolio Section') }}</span>
                      </a>
                    </li>
					<li class="@if(request()->path() == 'admin/productsection') active @endif">
                      <a href="{{route('admin.productsection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Product Section') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/testimonials') active
                    @elseif(request()->is('admin/testimonial/*/edit')) active
                    @endif">
                      <a href="{{route('admin.testimonial.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Testimonials') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/members') active
                    @elseif(request()->is('admin/member/*/edit')) active
                    @elseif(request()->path() == 'admin/member/create') active
                    @endif">
                      <a href="{{route('admin.member.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Team Section') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/package/background') active
                    @endif">
                      <a href="{{route('admin.package.background') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Package Background') }}</span>
                      </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/blogsection') active @endif">
                      <a href="{{route('admin.blogsection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Blog Section') }}</span>
                      </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/partners') active
                    @elseif(request()->is('admin/partner/*/edit')) active
                    @endif">
                      <a href="{{route('admin.partner.index') . '?language=' . $default->code}}">
                        <span class="sub-item">{{ __('trans.Partners') }}</span>
                      </a>
                    </li>
              
                    @if (empty($admin->role) || (!empty($permissions) && in_array('Footer', $permissions)))
          {{-- Footer --}}
          <li class="sub-item">
            <a data-toggle="collapse" href="#footer">
              <i class="la flaticon-layers"></i>
              <p>{{ __('trans.Footer') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/footers') show
            @elseif(request()->path() == 'admin/ulinks') show
            @endif" id="footer">
              <ul class="nav nav-collapse">
             
                <li class="@if(request()->path() == 'admin/footers') active @endif">
                  <a href="{{route('admin.footer.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Logo & Text') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/ulinks') active @endif">
                  <a href="{{route('admin.ulink.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Useful Links') }}</span>
                  </a>
                </li>

              </ul>
            </div>
          </li>              
              </li>
             </ul>
            </div>
          </li>


          <li class="@if(request()->path() == 'admin/heading') active @endif">
                  <a href="{{route('admin.heading') . '?language=' . $default->code}}">
                  <i class="far fa-clone"></i>
              <p>{{ __('trans.Page Headings') }}</p>
                  </a>
                </li>


          <li class="sub-item">
            <a data-toggle="collapse" href="#service">
              <i class="la flaticon-customer-support"></i>
              <p>{{ __('trans.Service Page') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/scategorys') show
            @elseif(request()->is('admin/scategory/*/edit')) show
            @elseif(request()->path() == 'admin/services') show
            @elseif(request()->is('admin/service/*/edit')) show
            @endif" id="service">
              <ul class="nav nav-collapse">
                @if (hasCategory($be->theme_version))
                <li class="
                @if(request()->path() == 'admin/scategorys') active
                @elseif(request()->is('admin/scategory/*/edit')) active
                @endif">
                  <a href="{{route('admin.scategory.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Category') }}</span>
                  </a>
                </li>
                @endif
                <li class="
                @if(request()->path() == 'admin/services') active
                @elseif(request()->is('admin/service/*/edit')) active
                @endif">
                  <a href="{{route('admin.service.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Services') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          
        @endif
          
        <li class="sub-item">
            <a data-toggle="collapse" href="#pages">
              <i class="la flaticon-file"></i>
              <p>{{ __('trans.creat pages') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/page/create') show
            @elseif(request()->path() == 'admin/pages') show
            @elseif(request()->is('admin/page/*/edit')) show
            @endif" id="pages">
              <ul class="nav nav-collapse">
                <li class="@if(request()->path() == 'admin/page/create') active @endif">
                  <a href="{{route('admin.page.create')}}">
                    <span class="sub-item">{{ __('trans.Create Page') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/pages') active @endif">
                  <a href="{{route('admin.page.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Pages') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>


          <li class="sub-item">
            <a data-toggle="collapse" href="#career">
                <i class="fas fa-user-md"></i>
              <p>{{ __('trans.Career Page') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/jcategorys') show
            @elseif(request()->path() == 'admin/job/create') show
            @elseif(request()->is('admin/jcategory/*/edit')) show
            @elseif(request()->path() == 'admin/jobs') show
            @elseif(request()->is('admin/job/*/edit')) show
            @endif" id="career">
              <ul class="nav nav-collapse">
                <li class="
                @if(request()->path() == 'admin/jcategorys') active
                @elseif(request()->is('admin/jcategory/*/edit')) active
                @endif">
                  <a href="{{route('admin.jcategory.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Category') }}</span>
                  </a>
                </li>
                <li class="
                @if(request()->path() == 'admin/jobs') active
                @elseif(request()->is('admin/job/*/edit')) active
                @elseif(request()->is('admin/job/create')) active
                @endif">
                  <a href="{{route('admin.job.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Job Management') }}</span>
                  </a>
                </li>

               
              </ul>
            </div>
          </li> 
          </li>
         
          @if (empty($admin->role) || (!empty($permissions) && in_array('Portfolio Management', $permissions)))
          {{-- Portfolio Management --}}
          <li class="sub-item
           @if(request()->path() == 'admin/portfolios') active
           @elseif(request()->path() == 'admin/portfolio/create') active
           @elseif(request()->is('admin/portfolio/*/edit')) active
           @endif">
            <a href="{{route('admin.portfolio.index') . '?language=' . $default->code}}">
              <i class="far fa-address-book	"></i>
              <p>{{ __('trans.Portfolio Management') }}</p>

            </a>
          </li>
        @endif


        @if (empty($admin->role) || (!empty($permissions) && in_array('Event Calendar', $permissions)))
          {{-- Event Calendar --}}
          <li class="sub-item
           @if(request()->path() == 'admin/calendars') active
           @endif">
            <a href="{{route('admin.calendar.index') . '?language=' . $default->code}}">
              <i class="la flaticon-calendar"></i>
              <p>{{ __('trans.Event Calendar') }}</p>
            </a>
          </li>
        @endif

        @if (empty($admin->role) || (!empty($permissions) && in_array('Gallery Management', $permissions)))
          {{-- Gallery Management --}}
          <li class="sub-item
           @if(request()->path() == 'admin/gallery') active
           @elseif(request()->path() == 'admin/gallery/create') active
           @elseif(request()->is('admin/gallery/*/edit')) active
           @endif">
            <a href="{{route('admin.gallery.index') . '?language=' . $default->code}}">
              <i class="la flaticon-picture"></i>
              <p>{{ __('trans.Gallery Management') }}</p>
            </a>
          </li>
        @endif



        @if (empty($admin->role) || (!empty($permissions) && in_array('FAQ Management', $permissions)))
          {{-- FAQ Management --}}
          <li class="sub-item
           @if(request()->path() == 'admin/faqs') active @endif">
            <a href="{{route('admin.faq.index') . '?language=' . $default->code}}">
              <i class="la flaticon-round"></i>
              <p>{{ __('trans.FAQ Management') }}</p>
            </a>
          </li>
        @endif

       
          



          <li class="sub-item">
            <a data-toggle="collapse" href="#blog">
              <i class="la flaticon-chat-4"></i>
              <p>{{ __('trans.Blogs') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/bcategorys') show
            @elseif(request()->path() == 'admin/blogs') show
            @elseif(request()->path() == 'admin/archives') show
            @elseif(request()->is('admin/blog/*/edit')) show
            @elseif(request()->path() == 'admin/rss/create') show
            @elseif(request()->path() == 'admin/rss/feeds') show
            @elseif(request()->path() == 'admin/rss') show
            @elseif(request()->is('admin/rss/edit/*')) show
            @endif" id="blog">
              <ul class="nav nav-collapse">
                <li class="@if(request()->path() == 'admin/bcategorys') active @endif">
                  <a href="{{route('admin.bcategory.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Category') }}</span>
                  </a>
                </li>
                <li class="
                @if(request()->path() == 'admin/blogs') active
                @elseif(request()->is('admin/blog/*/edit')) active
                @endif">
                  <a href="{{route('admin.blog.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Blogs') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/archives') active @endif">
                  <a href="{{route('admin.archive.index')}}">
                    <span class="sub-item">{{ __('trans.Archives') }}</span>
                  </a>
                </li>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Pages', $permissions)))
          {{-- Dynamic Pages --}}
          <li class="sub-item">
          <a data-toggle="collapse" href="#rss">
            <i class="fa fa-rss"></i>
            <p>{{ __('trans.RSS Feeds') }}</p>
            <span class="caret"></span>
          </a>
          <div class="collapse
          @if(request()->path() == 'admin/rss/create') show
          @elseif(request()->path() == 'admin/rss/feeds') show
          @elseif(request()->path() == 'admin/rss') show
          @elseif(request()->is('admin/rss/edit/*')) show
          @endif" id="rss">
            <ul class="nav nav-collapse">
              <li class="@if(request()->path() == 'admin/rss/create') active @endif">
                <a href="{{route('admin.rss.create')}}">
                  <span class="sub-item">{{ __('trans.Import RSS Feeds') }}</span>
                </a>
              </li>

              <li class="@if(request()->path() == 'admin/rss/feeds') active @endif">
                <a href="{{route('admin.rss.feed'). '?language=' . $default->code}}">
                  <span class="sub-item">{{ __('trans.RSS Feeds') }}</span>
                </a>
              </li>

              <li class="@if(request()->path() == 'admin/rss') active @endif">
                <a href="{{route('admin.rss.index'). '?language=' . $default->code}}">
                  <span class="sub-item">{{ __('trans.RSS Posts') }}</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

              </ul>
            </div>
          </li>
        @endif



       


        </ul>
            </div>

    {{--------------------------------------- the End --}}





            

          
      @if (empty($admin->role) || (!empty($permissions) && in_array('Menu Builder', $permissions)))
      {{-- Sitemap--}}
  
    @endif



        {{---------------------------------------------------------------- 
            E-comerce section 
            ----------------------------------------------------------------}}

            <li class="nav-item
			@if(request()->routeIs('admin.register.user')) active
            @elseif(request()->routeIs('register.user.view')) active
			@elseif(request()->path() == 'admin/shipping') active
            @elseif(request()->routeIs('admin.shipping.edit')) active
			@elseif(request()->path() == 'admin/gateways') active
            @elseif(request()->path() == 'admin/offline/gateways') active
			@elseif(request()->path() == 'admin/category') active
            @elseif(request()->path() == 'admin/product') active
            @elseif(request()->is('admin/product/*/edit')) active
            @elseif(request()->is('admin/category/*/edit')) active
            @elseif(request()->path() == 'admin/product/all/orders') active
            @elseif(request()->path() == 'admin/product/pending/orders') active
            @elseif(request()->path() == 'admin/product/processing/orders') active
            @elseif(request()->path() == 'admin/product/completed/orders') active
            @elseif(request()->path() == 'admin/product/rejected/orders') active
            @elseif(request()->routeIs('admin.product.create')) active
            @elseif(request()->routeIs('admin.product.details')) active
			@elseif(request()->path() == 'admin/packages') active
            @elseif(request()->path() == 'admin/package/form') active
            @elseif(request()->is('admin/package/*/inputEdit')) active
            @elseif(request()->path() == 'admin/all/orders') active
            @elseif(request()->path() == 'admin/pending/orders') active
            @elseif(request()->path() == 'admin/processing/orders') active
            @elseif(request()->path() == 'admin/completed/orders') active
            @elseif(request()->path() == 'admin/rejected/orders') active
			      @elseif(request()->path() == 'admin/quote/form') active
           @elseif(request()->is('admin/quote/*/inputEdit')) active
           @elseif(request()->path() == 'admin/all/quotes') active
           @elseif(request()->path() == 'admin/pending/quotes') active
           @elseif(request()->path() == 'admin/processing/quotes') active
           @elseif(request()->path() == 'admin/completed/quotes') active
           @elseif(request()->path() == 'admin/rejected/quotes') active
           @elseif(request()->path() == 'admin/quote/visibility') active
           @elseif(request()->routeIs('admin.product.tags')) active
            @endif">
              <a data-toggle="collapse" href="#e-comerce">
                <i class="la flaticon-cart"></i>
                <p>{{ __('trans.E-Comerce') }}</p>  
                <span class="caret"></span>
              </a>
  
              <div class="collapse
			  @if(request()->routeIs('admin.register.user')) show
            @elseif(request()->routeIs('register.user.view')) show
			@elseif(request()->path() == 'admin/shipping') show
            @elseif(request()->routeIs('admin.shipping.edit')) show
			@elseif(request()->path() == 'admin/gateways') show
            @elseif(request()->path() == 'admin/offline/gateways') show
			@elseif(request()->path() == 'admin/category') show
            @elseif(request()->path() == 'admin/product') show
            @elseif(request()->is('admin/product/*/edit')) show
            @elseif(request()->is('admin/category/*/edit')) show
            @elseif(request()->path() == 'admin/product/all/orders') show
            @elseif(request()->path() == 'admin/product/pending/orders') show
            @elseif(request()->path() == 'admin/product/processing/orders') show
            @elseif(request()->path() == 'admin/product/completed/orders') show
            @elseif(request()->path() == 'admin/product/rejected/orders') show
            @elseif(request()->routeIs('admin.product.create')) show
            @elseif(request()->routeIs('admin.product.details')) show
			@elseif(request()->path() == 'admin/packages') show
            @elseif(request()->path() == 'admin/package/form') show
            @elseif(request()->is('admin/package/*/inputEdit')) show
            @elseif(request()->path() == 'admin/all/orders') show
            @elseif(request()->path() == 'admin/pending/orders') show
            @elseif(request()->path() == 'admin/processing/orders') show
            @elseif(request()->path() == 'admin/completed/orders') show
            @elseif(request()->path() == 'admin/rejected/orders') show
			@elseif(request()->path() == 'admin/quote/form') show
           @elseif(request()->is('admin/quote/*/inputEdit')) show
           @elseif(request()->path() == 'admin/all/quotes') show
           @elseif(request()->path() == 'admin/pending/quotes') show
           @elseif(request()->path() == 'admin/processing/quotes') show
           @elseif(request()->path() == 'admin/completed/quotes') show
           @elseif(request()->path() == 'admin/rejected/quotes') show
           @elseif(request()->path() == 'admin/quote/visibility') show
           @elseif(request()->routeIs('admin.product.tags')) show
            @endif" id="e-comerce">
                    <ul class="nav nav-collapse">
                      <li class="sub-item
					  @if(request()->routeIs('admin.register.user')) active
                      @elseif(request()->routeIs('register.user.view')) active
			           @endif">
                        <a href="{{route('admin.register.user')}}">
                            <i class="la flaticon-users"></i>
                            <p>{{ __('trans.Customers') }}</p>
                        </a>
                      </li>
                      <li class="submenu">
                  <a data-toggle="collapse" href="#shopset" aria-expanded="{{(request()->path() == 'admin/shipping' || request()->routeIs('admin.shipping.edit')) || request()->routeIs('admin.product.tags') ? 'true' : 'false' }}">
                    <i class="fas fa-shopping-cart	"></i>
                            <p>{{ __('trans.Shop Settings') }}</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse {{(request()->path() == 'admin/shipping' || request()->routeIs('admin.shipping.edit')) || request()->routeIs('admin.product.tags') ? 'show' : '' }}" id="shopset" style="">
                    <ul class="nav nav-collapse subnav">
                      <li class="
                      @if(request()->path() == 'admin/shipping') active
                      @elseif(request()->routeIs('admin.shipping.edit')) active
                      @endif">
                        <a href="{{route('admin.shipping.index'). '?language=' . $default->code}}">
                          <span class="sub-item">{{ __('trans.Shipping Charges') }}</span>
                        </a>
                      </li>
                      <li class="@if(request()->routeIs('admin.product.tags')) active @endif">
                        <a href="{{route('admin.product.tags'). '?language=' . $default->code}}">
                          <span class="sub-item">{{ __('trans.Popular Tags') }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sub-item">
            <a data-toggle="collapse" href="#gateways">
              <i class="la flaticon-paypal"></i>
              <p>{{ __('trans.Payment Gateways') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/gateways') show
            @elseif(request()->path() == 'admin/offline/gateways') show
            @endif" id="gateways">
              <ul class="nav nav-collapse">
                <li class="@if(request()->path() == 'admin/gateways') active @endif">
                  <a href="{{route('admin.gateway.index')}}">
                    <span class="sub-item">{{ __('trans.Online Gateways') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/offline/gateways') active @endif">
                  <a href="{{route('admin.gateway.offline') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Offline Gateways') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sub-item">
            <a data-toggle="collapse" href="#category">
              <i class="fab fa-product-hunt"></i>
              <p>{{ __('trans.Product Management') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/category') show
            @elseif(request()->is('admin/category/*/edit')) show
            @elseif(request()->path() == 'admin/product') show
            @elseif(request()->is('admin/product/*/edit')) show
            @elseif(request()->path() == 'admin/product/all/orders') show
            @elseif(request()->path() == 'admin/product/pending/orders') show
            @elseif(request()->path() == 'admin/product/processing/orders') show
            @elseif(request()->path() == 'admin/product/completed/orders') show
            @elseif(request()->path() == 'admin/product/rejected/orders') show
            @elseif(request()->routeIs('admin.product.create')) show
            @elseif(request()->routeIs('admin.product.details')) show
            @endif" id="category">
              <ul class="nav nav-collapse">
                <li class="
                @if(request()->path() == 'admin/category') active
                @elseif(request()->is('admin/category/*/edit')) active
                @endif">
                  <a href="{{route('admin.category.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Category') }}</span>
                  </a>
                </li>

                <li class="
                @if(request()->path() == 'admin/product') active
                @elseif(request()->is('admin/product/*/edit')) active
                @elseif(request()->routeIs('admin.product.create')) active
                @endif">
                  <a href="{{route('admin.product.index'). '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Products') }}</span>
                  </a>
                </li>


                <li class="@if(request()->path() == 'admin/product/all/orders') active @endif">
                  <a href="{{route('admin.all.product.orders')}}">
                    <span class="sub-item">{{ __('trans.All Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/product/pending/orders') active @endif">
                  <a href="{{route('admin.pending.product.orders')}}">
                    <span class="sub-item">{{ __('trans.Pending Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/product/processing/orders') active @endif">
                  <a href="{{route('admin.processing.product.orders')}}">
                    <span class="sub-item">{{ __('trans.Processing Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/product/completed/orders') active @endif">
                  <a href="{{route('admin.completed.product.orders')}}">
                    <span class="sub-item">{{ __('trans.Completed Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/product/rejected/orders') active @endif">
                  <a href="{{route('admin.rejected.product.orders')}}">
                    <span class="sub-item">{{ __('trans.Rejected Orders') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>


          <li class="sub-item">
            <a data-toggle="collapse" href="#packages">
              <i class="la flaticon-box-1"></i>
              <p>{{ __('trans.Package Management') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/packages') show
            @elseif(request()->path() == 'admin/package/form') show
            @elseif(request()->is('admin/package/*/inputEdit')) show
            @elseif(request()->path() == 'admin/all/orders') show
            @elseif(request()->path() == 'admin/pending/orders') show
            @elseif(request()->path() == 'admin/processing/orders') show
            @elseif(request()->path() == 'admin/completed/orders') show
            @elseif(request()->path() == 'admin/rejected/orders') show
            @endif" id="packages">
              <ul class="nav nav-collapse">
                <li class="
                @if(request()->path() == 'admin/package/form') active
                @elseif(request()->is('admin/package/*/inputEdit')) active
                @endif">
                  <a href="{{route('admin.package.form') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Form Builder') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/packages') active @endif">
                  <a href="{{route('admin.package.index') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Packages') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/all/orders') active @endif">
                  <a href="{{route('admin.all.orders')}}">
                    <span class="sub-item">{{ __('trans.All Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/pending/orders') active @endif">
                  <a href="{{route('admin.pending.orders')}}">
                    <span class="sub-item">{{ __('trans.Pending Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/processing/orders') active @endif">
                  <a href="{{route('admin.processing.orders')}}">
                    <span class="sub-item">{{ __('trans.Processing Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/completed/orders') active @endif">
                  <a href="{{route('admin.completed.orders')}}">
                    <span class="sub-item">{{ __('trans.Completed Orders') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/rejected/orders') active @endif">
                  <a href="{{route('admin.rejected.orders')}}">
                    <span class="sub-item">{{ __('trans.Rejected Orders') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sub-item">
            <a data-toggle="collapse" href="#quote">
              <i class="la flaticon-list"></i>
              <p>{{ __('trans.Quote Management') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/quote/form') show
            @elseif(request()->is('admin/quote/*/inputEdit')) show
            @elseif(request()->path() == 'admin/all/quotes') show
            @elseif(request()->path() == 'admin/pending/quotes') show
            @elseif(request()->path() == 'admin/processing/quotes') show
            @elseif(request()->path() == 'admin/completed/quotes') show
            @elseif(request()->path() == 'admin/rejected/quotes') show
            @elseif(request()->path() == 'admin/quote/visibility') show
            @endif" id="quote">
              <ul class="nav nav-collapse">
               
                <li class="
                @if(request()->path() == 'admin/quote/form') active
                @elseif(request()->is('admin/quote/*/inputEdit')) active
                @endif">
                  <a href="{{route('admin.quote.form') . '?language=' . $default->code}}">
                    <span class="sub-item">{{ __('trans.Form Builder') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/all/quotes') active @endif">
                  <a href="{{route('admin.all.quotes')}}">
                    <span class="sub-item">{{ __('trans.All Quotes') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/pending/quotes') active @endif">
                  <a href="{{route('admin.pending.quotes')}}">
                    <span class="sub-item">{{ __('trans.Pending Quotes') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/processing/quotes') active @endif">
                  <a href="{{route('admin.processing.quotes')}}">
                    <span class="sub-item">{{ __('trans.Processing Quotes') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/completed/quotes') active @endif">
                  <a href="{{route('admin.completed.quotes')}}">
                    <span class="sub-item">{{ __('trans.Completed Quotes') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/rejected/quotes') active @endif">
                  <a href="{{route('admin.rejected.quotes')}}">
                    <span class="sub-item">{{ __('trans.Rejected Quotes') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
                      

                    </ul>
              </div>
            </li>
  
            {{---------------------------------------------------------------- 
              Technecal Suport section 
              ----------------------------------------------------------------}}
  
            <li class="nav-item
			        @if(request()->path() == 'admin/all/tickets') active
              @elseif(request()->path() == 'admin/pending/tickets') active
              @elseif(request()->path() == 'admin/open/tickets') active
              @elseif(request()->path() == 'admin/closed/tickets') active
              @elseif(request()->routeIs('admin.ticket.messages')) active
              @endif">
              <a data-toggle="collapse" href="#tickets">
                <i class="fa fa-sliders-h"></i>
                <p>{{ __('trans.support/tickets') }}</p>  
                <span class="caret"></span>
              </a>
                    
            <div class="collapse
            @if(request()->path() == 'admin/all/tickets') show
            @elseif(request()->path() == 'admin/pending/tickets') show
            @elseif(request()->path() == 'admin/open/tickets') show
            @elseif(request()->path() == 'admin/closed/tickets') show
            @elseif(request()->routeIs('admin.ticket.messages')) show
            @endif" id="tickets">
                <ul class="nav nav-collapse">
                    <li class="@if(request()->path() == 'admin/all/tickets') active @endif">
                        <a href="{{route('admin.tickets.all')}}">
                        <span class="sub-item">{{ __('trans.All Tickets') }}</span>
                        </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/pending/tickets') active @endif">
                        <a href="{{route('admin.tickets.pending')}}">
                        <span class="sub-item">{{ __('trans.Pending Tickets') }}</span>
                        </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/open/tickets') active @endif">
                        <a href="{{route('admin.tickets.open')}}">
                        <span class="sub-item">{{ __('trans.Open Tickets') }}</span>
                        </a>
                    </li>
                    <li class="@if(request()->path() == 'admin/closed/tickets') active @endif">
                        <a href="{{route('admin.tickets.closed')}}">
                        <span class="sub-item">{{ __('trans.Closed Tickets') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
              
  
  
            {{---------------------------------------------------------------- 
              Digital Markting section 
              ----------------------------------------------------------------}}
      

            <li class="nav-item
            @if(request()->path() == 'admin/subscribers') active
            @elseif(request()->path() == 'admin/mailsubscriber') active
            @elseif(request()->path() == 'admin/seo') active
            @elseif(request()->path() == 'admin/social') active
            @elseif(request()->is('admin/social/*')) active
            @elseif(request()->path() == 'admin/announcement') active
            @elseif(request()->path() == 'admin/sitemap') active
            @endif
            ">
              <a data-toggle="collapse" href="#digital-markting">
                <i class="fa fa-magic"></i>
                <p>{{ __('trans.Digital-Markting') }}</p>  
                <span class="caret"></span>
              </a>
  
              <div class="collapse
              @if(request()->path() == 'admin/subscribers') show
              @elseif(request()->path() == 'admin/mailsubscriber') show
              @elseif(request()->path() == 'admin/seo') show
              @elseif(request()->path() == 'admin/social') show
              @elseif(request()->is('admin/social/*')) show
              @elseif(request()->path() == 'admin/announcement') show
              @elseif(request()->path() == 'admin/sitemap') show
              @endif
              " id="digital-markting">
                    <ul class="nav nav-collapse">
                    @if (empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions)))
          {{-- Subscribers --}}
          @if (empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions)))
          {{-- Subscribers --}}
          <li class="nav-item">
            <a data-toggle="collapse" href="#subscribers">
              <i class="la flaticon-envelope"></i>
              <p>{{ __('trans.Subscribes') }}</p>
              <span class="caret"></span>
            </a>
            <div class="collapse
            @if(request()->path() == 'admin/subscribers') show
            @elseif(request()->path() == 'admin/mailsubscriber') show
            @endif" id="subscribers">
              <ul class="nav nav-collapse">
                <li class="@if(request()->path() == 'admin/subscribers') active @endif">
                  <a href="{{route('admin.subscriber.index')}}">
                    <span class="sub-item">{{ __('trans.Subscribe') }}</span>
                  </a>
                </li>
                <li class="@if(request()->path() == 'admin/mailsubscriber') active @endif">
                  <a href="{{route('admin.mailsubscriber')}}">
                    <span class="sub-item">{{ __('trans.Mail to Subscribers') }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        @endif

          
        @endif
                      


          <li class="@if(request()->path() == 'admin/seo') active @endif">
            <a href="{{route('admin.seo') . '?language=' . $default->code}}">
              <span class="sub-item">{{ __('trans.SEO Information') }}</span>
            </a>
          </li>
          <li class="@if(request()->path() == 'admin/social') active
            @elseif(request()->is('admin/social/*')) active @endif">
              <a href="{{route('admin.social.index')}}">
                <span class="sub-item">{{ __('trans.Social Links') }}</span>
              </a>
          </li>

          <li class="@if(request()->path() == 'admin/announcement') active @endif">
            <a href="{{route('admin.announcement') . '?language=' . $default->code}}">
              <span class="sub-item">{{ __('trans.Announcement Popup') }}</span>
            </a>
          </li>

          @if (empty($admin->role) || (!empty($permissions) && in_array('Sitemap', $permissions)))
            {{-- Sitemap--}}
            <li class="
              @if(request()->path() == 'admin/sitemap') active @endif">
              <a href="{{route('admin.sitemap.index') . '?language=' . $default->code}}">
                <p></p>
                <span class="sub-item">{{ __('trans.Sitemap') }}</span>

              </a>
            </li>
          @endif
                    </ul>
              </div>
            </li>


            {{---------------------------------------------------------------- 
              adminstration section 
              ----------------------------------------------------------------}}
              
                      <li class="nav-item
                      @if(request()->path() == 'admin/mail-from-admin') active
                      @elseif(request()->path() == 'admin/mail-to-admin') active
                      @elseif(request()->path() == 'admin/support') active
                      @elseif(request()->path() == 'admin/maintainance') active
                      @elseif(request()->path() == 'admin/roles') active
                      @elseif(request()->path() == 'admin/users') active
                      @elseif(request()->is('admin/user/*/edit')) active
                      @elseif(request()->is('admin/role/*/permissions/manage')) active
                      @elseif(request()->path() == 'admin/languages') active
                      @elseif(request()->is('admin/language/*/edit')) active
                      @elseif(request()->is('admin/language/*/edit/keyword')) active
                      
                      @elseif(request()->routeIs('admin.featuresettings')) active
                      @elseif(request()->path() == 'admin/script') active
                      @elseif(request()->path() == 'admin/cookie-alert') active
                      @elseif(request()->path() == 'admin/backup') active
                      @elseif(request()->path() == 'admin/contact') active
                      @endif
                      ">
                        <a data-toggle="collapse" href="#admin-seting">
                          <i class="la flaticon-settings"></i>
                          <p>{{ __('trans.adminstration') }}</p>  
                          <span class="caret"></span>
                        </a>
            
                        <div class="collapse
                        @if(request()->path() == 'admin/mail-from-admin') show
                        @elseif(request()->path() == 'admin/mail-to-admin') show
                        @elseif(request()->path() == 'admin/support') show
                        @elseif(request()->path() == 'admin/maintainance') show
                        @elseif(request()->path() == 'admin/roles') show
                        @elseif(request()->path() == 'admin/users') show
                        @elseif(request()->is('admin/user/*/edit')) show
                        @elseif(request()->is('admin/role/*/permissions/manage')) show
                        @elseif(request()->path() == 'admin/languages') show
                        @elseif(request()->is('admin/language/*/edit')) show
                        @elseif(request()->is('admin/language/*/edit/keyword')) show
                        
                        @elseif(request()->routeIs('admin.featuresettings')) show
                        @elseif(request()->path() == 'admin/script') show
                        @elseif(request()->path() == 'admin/cookie-alert') show
                        @elseif(request()->path() == 'admin/backup') show
                        @elseif(request()->path() == 'admin/contact') show
                        @endif 
                        " id="admin-seting">
                          <ul class="nav nav-collapse">
                            <li class="submenu">
                              <a data-toggle="collapse" href="#emailset" aria-expanded="{{(request()->path() == 'admin/mail-from-admin' || request()->path() == 'admin/mail-to-admin') ? 'true' : 'false' }}">
                                <i class="fa fa-mail-bulk"></i>
                                <p >{{ __('trans.Email Settings') }}</p>
                                <span class="caret"></span>
                              </a>
                              <div class="collapse {{(request()->path() == 'admin/mail-from-admin' || request()->path() == 'admin/mail-to-admin') ? 'show' : '' }}" id="emailset" style="">
                                <ul class="nav nav-collapse subnav">
                                  <li class="@if(request()->path() == 'admin/mail-from-admin') active @endif">
                                    <a href="{{route('admin.mailFromAdmin')}}">
                                      <span class="sub-item">{{ __('trans.Mail from Admin') }}</span>
                                    </a>
                                  </li>
                                  <li class="@if(request()->path() == 'admin/mail-to-admin') active @endif">
                                    <a href="{{route('admin.mailToAdmin')}}">
                                      <span class="sub-item">{{ __('trans.Mail to Admin') }}</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                          </li>

                          @if (empty($admin->role) || (!empty($permissions) && in_array('Contact Page', $permissions)))
                            {{-- Contact Page --}}
                            <li class="sub-item
                              @if(request()->path() == 'admin/contact') active @endif">
                              <a href="{{route('admin.contact.index') . '?language=' . $default->code}}">
                                <i class="la flaticon-whatsapp"></i>
                                <p>{{ __('trans.Contact Page') }}</p>
                              </a>
                            </li>
                          @endif

                          <li class="sub-item @if(request()->path() == 'admin/support') active @endif">
                            <a href="{{route('admin.support') . '?language=' . $default->code}}">
                              <i class="fa fa-info"></i>
                              <p>{{ __('trans.Support Informations') }}</p>
                            </a>
                          </li>

                          <li class="sub-item @if(request()->path() == 'admin/maintainance') active @endif">
                            <a href="{{route('admin.maintainance')}}">
                              <i class="fa fa-clock"></i>
                              <p>{{ __('trans.Maintainance Mode') }}</p>
                            </a>
                          </li>


                          @if (empty($admin->role) || (!empty($permissions) && in_array('Role Management', $permissions)))
                          {{-- Role Management Page --}}
                          <li class="sub-item
                            @if(request()->path() == 'admin/roles') active
                            @elseif(request()->is('admin/role/*/permissions/manage')) active
                            @endif">
                            <a href="{{route('admin.role.index')}}">
                              <i class="la flaticon-multimedia-2"></i>
                              <p>{{ __('trans.Role Management') }}</p>
                            </a>
                          </li>
                        @endif

                        @if (empty($admin->role) || (!empty($permissions) && in_array('Users Management', $permissions)))
          {{-- Role Management Page --}}
          <li class="sub-item
            @if(request()->path() == 'admin/users') active
            @elseif(request()->is('admin/user/*/edit')) active
            @endif">
            <a href="{{route('admin.user.index')}}">
              <i class="la flaticon-user-5"></i>
              <p>{{ __('trans.Users Management') }}</p>
            </a>
          </li>
        @endif


        @if (empty($admin->role) || (!empty($permissions) && in_array('Language Management', $permissions)))
        {{-- Language Management Page --}}
        <li class="sub-item
         @if(request()->path() == 'admin/languages') active
         @elseif(request()->is('admin/language/*/edit')) active
         @elseif(request()->is('admin/language/*/edit/keyword')) active
         @endif">
          <a href="{{route('admin.language.index')}}">
            <i class="la flaticon-chat-8"></i>
            <p>{{ __('trans.Language Management') }}</p>
          </a>
        </li>
        @endif

        
        <li class="sub-item @if(request()->routeIs('admin.featuresettings')) active @endif">
          <a href="{{route('admin.featuresettings') . '?language=' . $default->code}}">
            <i class="fa fa-feather-alt"></i>
            <p>{{ __('trans.Features Settings') }}</p>
          </a>
        </li>

        
          
       
        <li class="@if(request()->path() == 'admin/script') active @endif">
          <a href="{{route('admin.script')}}">
            <i class="fa fa-th"></i>
            <p >{{ __('trans.Scripts') }}</p>
          </a>
        </li>


        <li class="@if(request()->path() == 'admin/cookie-alert') active @endif">
          <a href="{{route('admin.cookie.alert') . '?language=' . $default->code}}"> 
          <i class="fa flaticon-line la"></i>
          <p>{{ __('trans.Cookie Alert') }}</p>
        </a>
        </li>

        @if (empty($admin->role) || (!empty($permissions) && in_array('Backup', $permissions)))
        {{-- Backup Database --}}
        <li class="sub-item
         @if(request()->path() == 'admin/backup') active
         @endif">
          <a href="{{route('admin.backup.index')}}">
            <i class="la flaticon-down-arrow-3"></i>
            <p>{{ __('trans.Backup') }}</p>
          </a>
        </li>
        @endif



        {{-- Cache Clear --}}
        <li class="sub-item">
          <a href="{{route('admin.cache.clear')}}">
            <i class="la flaticon-close"></i>
            <p>{{ __('trans.Clear Cache') }}</p>
          </a>
        </li>
                          
                    </ul>
              </div>
            


            {{---------------------------------------------------------------- 
              smart section 
              ----------------------------------------------------------------}}
              <li class="nav-item
              @if(request()->path() == 'admin/smart/support') active 
              @elseif(request()->path() == 'admin/smart/explain') active
              @elseif(request()->path() == 'admin/smart/marketing') active
              @elseif(request()->path() == 'admin/smart/problem') active
              @endif
              ">
                <a data-toggle="collapse" href="#smart-online">
                  <i class="flaticon- flaticon-web-1 la"></i>
                  <p>{{ __('trans.smartonline') }}</p>  
                  <span class="caret"></span>
                </a>
    
                <div class="collapse
                @if(request()->path() == 'admin/smart/support') show 
                @elseif(request()->path() == 'admin/smart/explain') show
                @elseif(request()->path() == 'admin/smart/marketing') show
                @elseif(request()->path() == 'admin/smart/problem') show
                @endif
                " id="smart-online">
                      <ul class="nav nav-collapse">
                       
                        
                        

                        <li class="@if(request()->path() == 'admin/smart/explain') active @endif">
                          <a href="{{route('admin.smart.explain')}}">
                            <span class="sub-item">{{ __('trans.Explain the program') }}</span>
                          </a>
                        </li>
  
                        <li class="@if(request()->path() == 'admin/smart/support') active @endif">
                          <a href="{{route('admin.smart.support')}}">
                            <span class="sub-item">{{ __('trans.support.vip') }}</span>
                          </a>
                        </li>

                        <li class="@if(request()->path() == 'admin/smart/marketing') active @endif">
                          <a href="{{route('admin.smart.marketing')}}">
                            <span class="sub-item">{{ __('trans.marketing') }}</span>
                          </a>
                        </li>
  
                        <li class="@if(request()->path() == 'admin/smart/problem') active @endif">
                          <a href="{{route('admin.smart.problem')}}">
                            <span class="sub-item">{{ __('trans.Have-proplem') }}</span>
                          </a>
                        </li>
  
                      
                       

                        
                      </ul>

                     
                </div>
                {{-- <footer  style="text-align: center;padding: 5px;background-color: #564b45;color: white;/* margin-top: auto; */position: fixed;bottom: 0;left: 0;width: 250px;">
                <p style="font-size: 18px;"> Smart online v2.0</p>

              </footer> --}}

              <li class="active mt-5 py-3 text-center" style = "background-color: #0b1c24;">
                <span class="sub-item" style="color: #364f6e;"><strong>Smart Online</strong> V2.0</span>
              </li>
               
              </li>
              

              
        @endif



        @if (empty($admin->role) || (!empty($permissions) && in_array('Service Page', $permissions)))
          {{-- Service Page --}}
         
        @endif



      



        @if (empty($admin->role) || (!empty($permissions) && in_array('Career Page', $permissions)))
          {{-- Career Page --}}

        @endif


      


       




        @if (empty($admin->role) || (!empty($permissions) && in_array('Blogs', $permissions)))
          {{-- Blogs --}}
          
        @endif

        @if (empty($admin->role) || (!empty($permissions) && in_array('RSS Feeds', $permissions)))
        {{-- Blogs --}}
        
      @endif

      </ul>
    
    </div>
  </div>

</div>


