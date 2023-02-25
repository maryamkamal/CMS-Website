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
		<h4 class="page-title">{{__('trans.Contact With Egtaz')}}</h4>
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
			<a href="#">{{__('trans.smart online')}}</a>
		  </li>
		  <li class="separator">
			<i class="flaticon-right-arrow"></i>
		  </li>
		  <li class="nav-item">
			<a href="#">{{__('trans.have a problem')}}</a>
		  </li>
		</ul>
	  </div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="http://online.egtaz.com/admin/contact/169/post" method="POST">
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">{{__('trans.conact')}}</div>
                  </div>
                  
              </div>
          </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <input type="hidden" name="_token" value="GeIwCt2H2eWhXJeCvmufv9pxMlK73XFoa0u91Slv">                <div class="form-group">
                <label>{{__('trans.Name')}} **</label>
                <input class="form-control" name="Name" value="" placeholder="Name">
                                </div>
              
              <div class="form-group">
                <label> {{__('trans.id number')}}**</label>
                <input class="form-control" name="id_number" value="" placeholder="1234567">
                                </div>
              <div class="form-group">
                <label> {{__('trans.Phone')}}**</label>
                <input class="form-control" name="contact_number" value="" placeholder="Enter Phone Number">
                                </div>
              
              <div class="form-group">
                <label >{{__('trans.problem')}} **</label>
                <textarea class="form-control ltr" name="problem" value="" placeholder="what is a problem"></textarea>
                                </div>
              
            </div>
          </div>
        </div>
        <div class="card-footer pt-3">
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
</div>
    
 @endsection