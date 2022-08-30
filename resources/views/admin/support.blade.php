@extends('admin.layout')

@section('content')
@if(session('language')!=null)
<?php App::setLocale(session('language'));
?>
@else
<?php App::setLocale("en");
?>
@endif
    <<div class="main-panel">
      <div class="content">
          <div class="page-inner">
    
          

<div class="page-header">
  <h4 class="page-title">Home Versions</h4>
  <ul class="breadcrumbs">
    <li class="nav-home">
      <a href="http://online.egtaz.com/admin/dashboard">
        <i class="flaticon-home"></i>
      </a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="#">Basic Settings</a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="#">Home Versions</a>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">

    <div class="card">
          <div class="card-header">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card-title">Home Versions</div>
              </div>
          </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
              <div class="row">

                <div class="col-md-4">
                  <div class="card">
                      <div class="card-body">
                          <img src="http://online.egtaz.com/assets/admin/img/versions/static.jpg" alt="" style="width:100%;">
                          <h3 class="text-center text-white mt-3 mb-0"> Static Version </h3>
                      </div>
                      <div class="card-footer text-center">
                                                      <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                              <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                                <input type="hidden" name="home_version" value="static">
                              <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                  <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              Activate
                              </button>
                          </form>
                                                  </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/slider.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">Slider Version</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <span class="badge badge-success">Activate</span>
                                            </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/video.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">Video Version</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                            <input type="hidden" name="home_version" value="video">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            Activate
                          </button>
                        </form>
                                            </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/water.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">Water Version</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                            <input type="hidden" name="home_version" value="water">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            Activate
                          </button>
                        </form>
                                            </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/parallax.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">Parallax Version</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                            <input type="hidden" name="home_version" value="parallax">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            Activate
                          </button>
                        </form>
                                            </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/particles.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">Particles Version</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                            <input type="hidden" name="home_version" value="particles">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            Activate
                          </button>
                        </form>
                                            </div>
                  </div>
                </div>

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



    
          </div>
        
      </div>
          <footer class="footer">
<div class="container-fluid">
  <div class="d-block mx-auto">
    Copyright © 2020 . All rights reserved by Egtaz Software&nbsp;
  </div>
</div>
</footer>
  </div>div class="main-panel">
            <div class="content">
                <div class="page-inner">
                
                
        
      <div class="page-header">
        <h4 class="page-title">Theme Version</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="http://online.egtaz.com/admin/dashboard">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Basic Settings</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Theme Version</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">Update Theme Version</div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-3 pb-4">
              <div class="row">
                <div class="col-lg-6 offset-lg-3">
    
                  <form id="ajaxForm" action="" method="post" onsubmit="return false">
                    <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">                <div class="form-group">
                      <label for="">Select a Theme **</label>
                      <select class="form-control" name="theme_version" id="">
                          <option value="default_service_category">
                            theme 1
                          </option>
                          <option value="default_no_category">
                            theme2
                          </option>
                          <option value="dark_service_category">
                            theme3
                          </option>
                          <option value="dark_no_category">
                            theme4
                          </option>
                          <option value="gym_service_category">
                            theme5
                          </option>
                          <option value="gym_no_category">
                            theme6
                          </option>
                          <option value="car_service_category" selected="">
                            theme7
                          </option>
                          <option value="car_no_category">
                            theme8
                          </option>
                          <option value="cleaning_service_category">
                            theme9
                          </option>
                          <option value="cleaning_no_category">
                            theme10
                          </option>
                          <option value="construction_service_category">
                            theme11
                          </option>
                          <option value="construction_no_category">
                            theme12
                          </option>
                          <option value="logistic_service_category">
                            theme13
                          </option>
                          <option value="logistic_no_category">
                            theme14
                          </option>
                          <option value="lawyer_service_category">theme15
                          </option>
                          <option value="lawyer_no_category">
                            theme16
                          </option>
                      </select>
                    </div>
                  </form>
    
                </div>
              </div>
            </div>
    
            <div class="card-footer">
              <div class="form">
                <div class="form-group from-show-notify row">
                  <div class="col-12 text-center">
                    <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
                
                </div>
                        
            </div>
                
            </div>
    
 @endsection