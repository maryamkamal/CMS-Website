<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>{{$bs->website_title}}</title>
  	<link rel="icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}">
  </head>
  <body>
    <div class=" container py-3">
      <div class="row d-flex justify-content-center">
        <div class="text-center mb-4 col-lg-12">
          <img class="login-logo" src="{{asset('assets/front/img/'.$bs->logo)}}" alt="">
        </div>
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
          <div class="form">
            @if (session()->has('alert'))
              <div class="alert alert-danger fade show" role="alert" style="font-size: 14px;">
                <strong>Oops!</strong> {{session('alert')}}
              </div>
            @endif
            <form class="login-form" action="{{route('admin.auth')}}" method="POST">
              @csrf
              <input class="form-input" type="text" name="username" placeholder="username" />
              @if ($errors->has('username'))
                <p class="text-danger text-left">{{$errors->first('username')}}</p>
              @endif
              <input class="form-input" type="password" name="password" placeholder="password"/>
              @if ($errors->has('password'))
                <p class="text-danger text-left">{{$errors->first('password')}}</p>
              @endif
              
              <fieldset class="form-group">
    
                <div class="">
                  <select name="language" class="form-control col-lg-12">
                    <option>Select Language</option>
                    <option value="en">English</option>
                    <option value="ar">عربي</option>
                  </select>
                 
                </div>
              </fieldset>
    
              <button class="mt-3" type="submit">login</button>
            </form>
            <a class="forget-link" href="{{route('admin.forget.form')}}">Forgot Password / Username ?</a>
          </div>
        </div>
      </div>
      
      
      
    </div>

    <footer class=" footer mt-3 mb-2" >
      <p class=" text-center">Copyright © 2020 All rights reseved by <strong>Egtaz Software</strong> </p>
    </footer>


    <!-- jquery js -->
    <script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    @if (session()->has('warning'))
    <script>
      var content = {};

      content.message = '{{session('warning')}}';
      content.title = 'Sorry!';
      content.icon = 'fa fa-bell';

      $.notify(content,{
        type: 'warning',
        placement: {
          from: 'top',
          align: 'right'
        },
        showProgressbar: true,
        time: 1000,
        delay: 4000,
      });
    </script>
    @endif
	

  </body>
</html>
