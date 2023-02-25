<!DOCTYPE html>
<html>
	{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<title>{{$bs->website_title}}</title>
	<link rel="icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
    @includeif('admin.partials.styles')

    @yield('styles')
 
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet"> 

     <style>
      :not(i){
        font-family:'Tajawal', sans-serif !important; 
        
      }
      
    </style>

@if(session('language')=="ar")
    {{-- Start rtl styles --}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/rtl.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">
    {{-- End rtl styles --}}
@endif
    {{-- Update color file --}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/loader.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/css/rootColors.css')}}">


    
</head>
<body data-background-color="dark">

	<div class="wrapper">


    {{-- top navbar area start --}}
    @includeif('admin.partials.top-navbar')
    {{-- top navbar area end --}}


    {{-- side navbar area start --}}
    @includeif('admin.partials.side-navbar')
    {{-- side navbar area end --}}


		<div class="main-panel">
        <div class="content">
            <div class="page-inner">
			
            @yield('content')
			
            </div>
					
        </div>
            @includeif('admin.partials.footer')
		</div>

	</div>

	@includeif('admin.partials.scripts')

    {{-- Loader --}}
    <div class="request-loader">
        <img src="{{asset('assets/admin/img/loader.gif')}}" alt="">
    </div>
    {{-- Loader --}}
</body>
</html>
