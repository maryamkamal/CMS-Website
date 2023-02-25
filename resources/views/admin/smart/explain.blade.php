@extends('admin.layout')

@section('content')
@if(session('language')!=null)
<?php App::setLocale(session('language'));
?>
@else
<?php App::setLocale("en");
?>
@endif
  


<div class="container">
	<div class="page-header">
		<h4 class="page-title">{{__('trans.Explain the program')}}</h4>
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
			<a href="#">{{__('trans.Explain the program')}}</a>
		  </li>
		</ul>
	  </div>
	<div class="row pt-3 pb-4 rounded" style="background-color:#071f29;">
		<div class="card-header">
			<div class="row">
				<div class="col-lg-12">
					<div class="card-title">{{__('trans.Explain the program')}}</div>
				</div>
			</div>
		</div>
	
		<div class="col-lg-12">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<iframe class="" width="100%" height="400px" src="https://www.youtube.com/embed/zyXmsVwZqX4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					<p class="pt-1 pb-3 h2">
						{{__('trans.explination vedio title')}}
					</p>
				</div>
			</div>
		</div>
		
	
		<div class="col-lg-10 py-3 d-lg-flex justify-content-center text-center">
			
			<h1 class="">{{__('trans.Go to the annotations library')}}</h1>
			<a href="https://www.youtube.com/" class="btn btn-success ml-lg-5" style="border-radius: 25px"> 
				{{__('trans.Know more')}}
			</a>

		</div>
	</div>
	
	<div class="row rounded mt-4 py-4" style="background-color:#071f29;">
		<div class="col-lg-12">
			<h2>{{__('trans.Articels about the system')}}</h2>
		</div>

		
		<div class="col-12 d-flex align-items-lg-start align-items-center border-bottom border-secondary my-3 pb-2">
			<img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">

			<div class="mx-3">
				<h2>{{__('trans.explination articel titel 1')}}</h2>
				<p>
					{{__('trans.explination articel body 1')}}
				</p>
				<a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
					{{__('trans.Read more')}}
				</a>
			</div>
		</div>

		<div class="col-12 d-flex align-items-lg-start align-items-center border-bottom border-secondary my-3 pb-2">
			<img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">

			<div class="mx-3">
				<h2>{{__('trans.explination articel titel 2')}}</h2>
				<p>				
						{{__('trans.explination articel body 2')}}
				</p>
				<a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
					{{__('trans.Read more')}}
				</a>
			</div>
		</div>

		<div class="col-12 d-flex align-items-lg-start align-items-center ">
			<img width="80px" height="80px" src="https://via.placeholder.com/80" class=" rounded" alt="img">

			<div class="mx-3">
				<h2>{{__('trans.explination articel titel 3')}}</h2>
				<p>
					{{__('trans.explination articel body 3')}}
				</p>
				<a href="#" class="btn btn-primary btn-sm" style="border-radius: 25px">
					{{__('trans.Read more')}}
				</a>
			</div>
		</div>
		

	</div>

</div>

@endsection