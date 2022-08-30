@extends('admin.layout')

@section('content')
@if(session('language')!=null)
<?php App::setLocale(session('language'));
?>
@else
<?php App::setLocale("en");
?>
@endif

<div class="page-header">
  <h4 class="page-title">{{__('trans.Marketing')}}</h4>
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
      <a href="#">{{__('trans.Smart Online')}}</a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="#">{{__('trans.Marketing')}}</a>
    </li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">

    <div class="card">
          <div class="card-header">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card-title">{{__('trans.Marketing')}}</div>
              </div>
          </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
              <div class="row">

                <div class="col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <img src="http://online.egtaz.com/assets/admin/img/versions/static.jpg" alt="" style="width:100%;">
                          <h3 class="text-center text-white mt-3 mb-0">{{__('trans.service 1')}} </h3>
                      </div>
                      <div class="card-footer text-center">
                                                      <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                              <input type="hidden" name="_token" value="pmdzyB0LhQp5CAcRJXdy2JZYUdgXDjI5DuN3x1Pc">                                <input type="hidden" name="home_version" value="static">
                              <button type="submit" class="btn btn-info btn-sm confirmbtn">
                              <span class="btn-label">
                                  <i class="fas fa-arrow-alt-circle-down"></i>
                              </span>
                              {{__('trans.buy now')}}
                              </button>
                          </form>
                                                  </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/slider.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">{{__('trans.service 2')}}</h3>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-info btn-sm confirmbtn">
                        <span class="btn-label">
                            <i class="fas fa-arrow-alt-circle-down"></i>
                        </span>
                        {{__('trans.buy now')}}
                        </button>                                            </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/video.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">{{__('trans.service 3')}}</h3>
                    </div>
                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="pmdzyB0LhQp5CAcRJXdy2JZYUdgXDjI5DuN3x1Pc">                            <input type="hidden" name="home_version" value="video">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            {{__('trans.buy now')}}
                          </button>
                        </form>
                                            </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <img src="http://online.egtaz.com/assets/admin/img/versions/video.jpg" alt="" style="width:100%;">
                      <h3 class="text-center text-white mt-3 mb-0">{{__('trans.service 4')}}</h3>
                    </div>

                    <div class="card-footer text-center">
                                                <form class="deleteform d-inline-block" action="http://online.egtaz.com/admin/homeversion/169/post" method="post">
                          <input type="hidden" name="_token" value="pmdzyB0LhQp5CAcRJXdy2JZYUdgXDjI5DuN3x1Pc">                            <input type="hidden" name="home_version" value="video">
                          <button type="submit" class="btn btn-info btn-sm confirmbtn">
                            <span class="btn-label">
                              <i class="fas fa-arrow-alt-circle-down"></i>
                            </span>
                            {{__('trans.buy now')}}
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


    <div class="col-12  mt-3">
      <div class="row rounded mt-4 py-4" style=" background-color:#071f29;">
        <div class="col-lg-12 border-bottom" style="border-color: rgba(181, 181, 181, 0.1) !important">
          <h2>{{__('trans.Markting articels')}}</h2>
        </div>
    
        
        <div class="col-12 d-flex align-items-lg-start align-items-center border-bottom border-secondary my-3 pb-2">
          <img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">
    
          <div class="mx-3">
            <h2>{{__('trans.markting articel  1')}}</h2>
            <p>
              {{__('trans.markting articel  body 1')}}
            </p>
            <a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
              {{__('trans.Read more')}}
            </a>
          </div>
        </div>
    
        <div class="col-12 d-flex align-items-lg-start align-items-center border-bottom border-secondary my-3 pb-2">
          <img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">
    
          <div class="mx-3">
            <h2>{{__('trans.markting articel  2')}}</h2>
            <p>
              {{__('trans.markting articel  body 2')}}
            </p>
            <a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
              {{__('trans.Read more')}}
            </a>
          </div>
        </div>
    
        <div class="col-12 d-flex align-items-lg-start align-items-center ">
          <img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">
    
          <div class="mx-3">
            <h2>{{__('trans.markting articel  3')}}</h2>
            <p>
              {{__('trans.markting articel  body 3')}}
            </p>
            <a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
              {{__('trans.Read more')}}
            </a>
          </div>
        </div>
        
    
      </div>
    </div>



  </div>
</div>
    
 @endsection