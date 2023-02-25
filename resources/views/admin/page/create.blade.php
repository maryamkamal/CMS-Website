@extends('admin.layout')
@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
<div class="page-header">
   <h4 class="page-title">{{ __('trans.Pages') }}</h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="{{route('admin.dashboard')}}">
            <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">{{ __('trans.Create Pages') }}</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">{{ __('trans.Pages') }}</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div  class="card-header rounded">
            <div class="card-title">{{ __('trans.Create Pages') }}</div>
         </div>
         <div class="card-body pt-5 pb-4">
            <div class="row justify-content-center">
               
            
            
            <div class="col-lg-10">
               <div style="background-color: #68554b;" class="card-header card-head-raduis breadcrumb-bg" id="headingOne">
                  <h5 class="mb-0 breadcrumb-bg">
                     <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h3>{{ __('trans.page Bg property') }}</h3>
                     </button>
                  </h5>
               </div>
               
               <div id="collapseOne" class="collapse card-body-raduis border" style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                     <div class="row">
                        
                        <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.page.uploadBackground')}}" method="POST">
                           <div class="form-row px-2">
                              <div class="col-lg-6">
                                 <label for="" class="mb-1"><strong>{{ __('trans.Background') }} **</strong></label>
                              </div>
                              <div class="col-md-12 d-md-block d-sm-none mb-3">
                                 <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                              </div>
                              <div class="col-sm-12">
                                 <div class="from-group mb-2">
                                    <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{ __('trans.No File Added') }}" readonly="readonly" />
                                    <div class="progress mb-2 d-none">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                       role="progressbar"
                                       style="width: 0%;"
                                       aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
                                       0%
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-4">
                                 
                                 <div role="button" class="btn btn-primary mr-2">
                                    <i class="fa fa-folder-o fa-fw"></i>{{ __('trans.browseFiles') }} 
                                    <input type="file" title='أنقر لاضافه ملف' name="background_img"/>
                                    <p class="em text-danger mb-0" id="errbackground_img"></p>
                                 </div>
                                 <small class="status text-muted">{{ __('trans.selectFileStruc') }}</small>
                                 <p class="em text-danger mb-0" id="errbackground_img"></p>
                              </div>
                           </div>
                        </div>
                        <hr style="background-color: #68554bd0">
                     </form>
                     
                     <form class="mb-3 dm-uploader drag-and-drop-zone-1" enctype="multipart/form-data" action="{{route('admin.page.uploadInnerImg')}}" method="POST">
                        <h3>{{__('trans.Background / Vedio')}}</h3>
                        <div class="form-row px-2">
                           <div class="col-lg-6">
                              <label for=""><strong>{{ __('trans.Background') }} </strong></label>
                           </div>
                           <div class="col-md-12 d-md-block d-sm-none mb-3">
                              <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                           </div>
                           <div class="col-sm-12">
                              <div class="from-group mb-2">
                                 <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{ __('trans.No File Added') }}" readonly="readonly" />
                                 <div class="progress mb-2 d-none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                    role="progressbar"
                                    style="width: 0%;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
                                    0%
                                 </div>
                              </div>
                           </div>
                           <div class="mt-4">
                              
                              <div role="button" class="btn btn-primary mr-2">
                                 <i class="fa fa-folder-o fa-fw"></i>{{ __('trans.browseFiles') }} 
                                 <input type="file" title='أنقر لاضافه ملف' name="inner_image" />
                                 <p class="em text-danger mb-0" id="errinner_img"></p>
                              </div>
                              <small class="status text-muted">{{ __('trans.selectFileStruc') }}</small>
                              <p class="em text-danger mb-0" id="errinner_img"></p>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <br>
               <br>
               <div class="row">
                  <div class="col-lg-6">
                     <form id="ajaxForm" action="{{route('admin.page.store')}}" method="post">
                        <h3>  {{ __('trans.vedio Bg Link') }}</h3> 
                        <input type="text"  name="video_link" class="form-control" />
                        <br>
                        
                     </div>
                  </div>
               </div>
            </div>
               @csrf
               <div class="row mt-3">
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">{{ __('trans.Language') }} </label>
                        <select id="language" name="language_id" class="form-control">
                           <option value="" selected disabled>{{ __('trans.selectLanguage') }}</option>
                           @foreach ($langs as $lang)
                           <option value="{{$lang->id}}">{{$lang->name}}</option>
                           @endforeach
                        </select>
                        <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">{{ __('trans.Name') }} **</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="">
                        <p id="errname" class="em text-danger mb-0"></p>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label for="">{{ __('trans.Title') }} **</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="">
                        <p id="errtitle" class="em text-danger mb-0"></p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="">{{ __('trans.Subtitle') }} **</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Enter Subtitle" value="">
                        <p id="errsubtitle" class="em text-danger mb-0"></p>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="">{{ __('trans.Status') }} **</label>
                        <select class="form-control ltr" name="status">
                           <option value="1">{{ __('trans.activ') }}</option>
                           <option value="0">{{ __('trans.disable') }}</option>
                        </select>
                        <p id="errstatus" class="em text-danger mb-0"></p>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="">{{ __('trans.Body') }} **</label>
                  <textarea id="body" class="form-control summernote" name="body" data-height="500"></textarea>
                  <p id="errbody" class="em text-danger mb-0"></p>
               </div>
               <div class="form-group">
                  <label for="">{{ __('trans.Serial Number') }} </label>
                  <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                  <p id="errserial_number" class="mb-0 text-danger em"></p>
                  <p class="text-warning"><small>{{ __('trans.text-warning') }}</small></p>
               </div>
               <div class="form-group">
                  <label>{{ __('trans.Meta Keywords') }}</label>
                  <input class="form-control" name="meta_keywords" value="" placeholder="Enter meta keywords" data-role="tagsinput">
               </div>
               <div class="form-group">
                  <label>{{ __('trans.Meta Description') }}</label>
                  <textarea class="form-control" name="meta_description" rows="5" placeholder="Enter meta description"></textarea>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="card-footer">
      <div class="form">
         <div class="form-group from-show-notify row">
            <div class="col-12 text-center">
               <button type="submit" id="submitBtn" class="btn btn-success">{{ __('trans.Submit') }}</button>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
   $(document).ready(function() {
      
      // make input fields RTL
      $("select[name='language_id']").on('change', function() {
         $(".request-loader").addClass("show");
         let url = "{{url('/')}}/admin/rtlcheck/" + $(this).val();
         console.log(url);
         $.get(url, function(data) {
            $(".request-loader").removeClass("show");
            if (data == 1) {
               $("form input").each(function() {
                  if (!$(this).hasClass('ltr')) {
                     $(this).addClass('rtl');
                  }
               });
               $("form select").each(function() {
                  if (!$(this).hasClass('ltr')) {
                     $(this).addClass('rtl');
                  }
               });
               $("form textarea").each(function() {
                  if (!$(this).hasClass('ltr')) {
                     $(this).addClass('rtl');
                  }
               });
               $("form .summernote").each(function() {
                  $(this).siblings('.note-editor').find('.note-editable').addClass('rtl text-right');
               });
               
            } else {
               $("form input, form select, form textarea").removeClass('rtl');
               $("form .summernote").siblings('.note-editor').find('.note-editable').removeClass('rtl text-right');
            }
         })
      });
   });
</script>
@endsection
