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
<h4 class="page-title">{{__('trans.support')}}</h4>
<ul class="breadcrumbs">
<li class="nav-home">
  <a href="http://online.egtaz.com/admin/dashboard">
    <i class="flaticon-home">{{__('trans.smart online')}}</i>
  </a>
</li>
<li class="separator">
  <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
  <a href="#">{{__('trans.support')}}</a>
</li>
</ul>
</div>
<div class="row">
<div class="col-lg-6">
<div class="card">
  <form action="http://online.egtaz.com/admin" method="post">
    <input type="hidden" name="_token" value="">          
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-title">{{__('trans.support for free')}}</div>
            </div>
        </div>
    </div>
    <div class="card-body pt-5 pb-5">
      <div class="row">
        <div class="col-lg-12">
          <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">
          
          <div class="form-group">
            <label>{{__('trans.Email')}}</label>
            <input class="form-control" name="client_id" value="" placeholder="email">
                            </div>
          

                            <div class="form-group">
                              <label>{{__('trans.supject')}}</label>
                              <input class="form-control" name="client_secret" value=""  placeholder="title">
                                              </div>

                            <div class="form-group">
                              <label > {{__('trans.massage')}}**</label>
                              <textarea class="form-control ltr" name="massage" value="" placeholder="massage"></textarea>
                                              </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="form">
        <div class="form-group from-show-notify row">
          <div class="col-12 text-center">
            <button style="background: #f0ff0a !important; border-color: #ffc107 !important;" id="displayNotif" class="btn btn-success">{{__('trans.Submit')}}</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</div>


<div class="col-lg-6">
<div class="card">
  <form class="" action="http://online.egtaz.com/admin/stripe/update" method="post">
    <input type="hidden" name="_token" value="ykJ2ickapvPlrtgfpoZ0cfEaDfa91YZvPu9d0gnM">          <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-title">{{__('trans.support vip')}}</div>
            </div>
        </div>
    </div>
    <div class="card-body pt-5 pb-5">
      <div class="row">
        <div class="col-lg-12" style="
        text-align: center;
    ">

		<a href="https://wa.me/+201150850000?text=السلام%20عليكم،%20لدي%20استفسار." class="float" target="_blank">
      <i style="       color: #e8c415;
      font-size: xxx-large;
      " class="fab fa-whatsapp"></i>		</a>

<div class="form">
  <div class="form-group from-show-notify row">
    <div class="col-12 text-center">
<h1>{{__('trans.For direct technical support and speed of response')}}
</h1>
    </div>
  </div>
</div>

<div class="form">
  <div class="form-group from-show-notify row">
    <div class="col-12 text-center">
      <button style="background: #f0ff0a !important; border-color: #ffc107 !important;" id="displayNotif" class="btn btn-success">{{__('trans.subscribe now')}}</button>
    </div>
  </div>
</div>
          
          
        </div>
      </div>
    </div>
      
  </form>
</div>
</div>


</div>


    
    
    
 @endsection