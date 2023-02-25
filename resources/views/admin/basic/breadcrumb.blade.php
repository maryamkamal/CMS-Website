@extends('admin.layout')

@section('content')
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.breadcrumb') }}</h4>
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
        <a href="#">{{ __('trans.manSetting') }}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.breadcrumb') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">{{ __('trans.updateBreadcrumb') }}</div>
                </div>
                <div class="col-lg-2">
                    @if (!empty($langs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>{{ __('trans.selectLanguage') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pt-5 pb-4">
          <div class="row">
            <div class="col-lg-8">
              <h3 class="my-2">{{__('trans.Background Image')}}</h3>
              <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.breadcrumb.update', $lang_id)}}" method="POST">
                <div class="form-row">
                  <div class="col-md-12 d-md-block d-sm-none mb-3">
                    @if (!empty($abs->breadcrumb))
                        <img src="{{asset('assets/front/img/'.$abs->breadcrumb)}}" alt="..." class="img-thumbnail">
                    @else
                        <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                    @endif
                  </div>
                  <div class="col-sm-12">
                    <div class="from-group mb-2">
                      <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{__('trans.No image uploaded')}}" readonly="readonly" />

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
					@if($abs->breadcrumb!=null)
                         <a href="{{route('admin.deleteBreadcrumbImage.delete', $lang_id)}}" class="btn btn-danger ">
                          <span class="btn-label">
                              <i class="fas fa-trash"></i>
                          </span>
                          Delete
                          </a>
					@endif
                      <div role="button" class="btn btn-primary mr-2">
                        <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                        <input type="file" title='Click to add Files' name="breadcrumb" />
                      </div>
                      <small class="status text-muted">{{ __('trans.selectFile') }}</small>
                      <p class="text-warning mb-0">{{ __('trans.selectFileStruc') }}</p>
                      <p class="text-danger mb-0 em" id="errbreadcrumb"></p>
                    </div>
                  </div>
                </div>
              </form>

            </div>

            

      <div class="col-lg-8">
        <hr style="background-color: #68554b">
              <h2>{{__('trans.Background / Vedio')}}</h2>
              <form class="mb-3 dm-uploader drag-and-drop-zone-1" enctype="multipart/form-data" action="{{route('admin.updateInnerImage.update', $lang_id)}}" method="POST">
                <div class="form-row">
                  <div class="col-md-12 d-md-block d-sm-none mb-3">
                    @if (!empty($abs->inner_image))
                        <img src="{{asset('assets/front/img/'.$abs->inner_image)}}" alt="..." class="img-thumbnail">
                    @else
                        <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                    @endif
                  </div>
                  <div class="col-sm-12">
                    <div class="from-group mb-2">
                      <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="{{__('trans.No image uploaded')}}" readonly="readonly" />

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
					@if($abs->inner_image!=null)
                      <a href="{{route('admin.deleteInnerImage.delete', $lang_id)}}" class="btn btn-danger ">
                         
                          <span class="btn-label">
                              <i class="fas fa-trash"></i>
                          </span>
                          Delete
                     </a>
					 @endif
                         <div role="button" class="btn btn-primary mr-2">
                        

                        <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                        <input type="file" title='Click to add Files' name="breadcrumb" />

                        
                      </div>
                     
                      <small class="status text-muted">{{ __('trans.selectFile') }}</small>
                      <p class="text-warning mb-0">{{ __('trans.selectFileStruc') }}</p>
                      <p class="text-danger mb-0 em" id="errbreadcrumb"></p>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
		  <div class="row">
         <div class="col-lg-6">
        <form id="ajaxForm" action="{{route('admin.updateVideoLink.update', $lang_id)}}" method="post">
		@csrf
           <h3> {{__('trans.Vedio Link')}} </h3> 
           <input type="text"  name="video_link" value="{{$abs->video_link}}" class="form-control" />
           
           
	  </form>
	   <div class="col-12 text-center mt-2">
          <button type="submit" id="submitBtn" class="btn btn-success ">{{__('trans.Submit')}}</button>
      </div>
     </div>
    </div>
        </div>
      </div>
    </div>
  </div>

@endsection
