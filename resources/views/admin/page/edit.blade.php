@extends('admin.layout')

@if(!empty($page->language) && $page->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

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
        <a href="#">{{ __('trans.Edit Page') }}</a>
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
        <div class="card-header">
          <div class="card-title d-inline-block">{{ __('trans.Edit Page') }}</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.page.index') . '?language=' . request()->input('language')}}">
						<span class="btn-label">
							<i class="fas fa-backward" style="font-size: 12px;"></i>
						</span>
						{{ __('trans.Back') }}
					</a>
        </div>
        <div class="card-body pt-5 pb-4">
          <div class="row justify-content-center">


            

            <div class="col-lg-10">

              <div class="mb-3">

                <div style="background-color: #68554b;" class="card-header  card-head-raduis" id="headingOne">
              <h5 class="mb-0 breadcrumb-bg">
                <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h3 class="m-0">{{ __('trans.page Bg property') }}</h3>
                </button>
              </h5>
            </div>
        
            <div id="collapseOne" class="collapse card-body-raduis border" style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">

              <div class="card-body">
                      <div class="row">
            
             <form class="mb-3 dm-uploader drag-and-drop-zone" enctype="multipart/form-data" action="{{route('admin.page.updateBackground', $page->id)}}" method="POST">
                       <div class="form-row px-2">
                          <div class="col-lg-6">
                             <label for=""><strong>{{ __('trans.Background') }}  **</strong></label>
                          </div>
                          <div class="col-md-12 d-md-block d-sm-none mb-3">
                             <img src="{{asset('assets/front/img/pages/'.$page->background_img)}}" alt="..." class="img-thumbnail">
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
                              <form class="deleteform d-inline-block" action="" method="post">
                                      <button type="submit" class="btn btn-danger deletebtn">
                                      <span class="btn-label">
                                          <i class="fas fa-trash"></i>
                                      </span>
                                      Delete
                                      </button>
                                  </form>
                                <div role="button" class="btn btn-primary mr-2">
                                   <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                                   <input type="file" title='{{ __('trans.Click to Add file') }}' name="background_img"/>
                                   <p class="em text-danger mb-0" id="errbackground_img"></p>
                                </div>
                                <small class="status text-muted">{{ __('trans.selectFile') }}</small>
                                <p class="em text-danger mb-0" id="errbackground_img"></p>
                             </div>
                          </div>
                          
                       </div>
                       
                    </form>
                   
                    <form class="mb-3 dm-uploader drag-and-drop-zone-1" enctype="multipart/form-data" action="{{route('admin.page.updateInnerImg', $page->id)}}" method="POST">
                      <hr style="background-color: #68554b">
                       <div class="form-row px-2">
                          
                          <h3>{{__('trans.Background / Vedio')}}</h3>
                          
                          <div class="col-lg-12">
                             <label for=""><strong>{{ __('trans.Background') }} </strong></label>
                          </div>
                          <div class="col-md-12 d-md-block d-sm-none mb-3">
                             <img src="{{asset('assets/front/img/pages/'.$page->inner_image)}}" alt="..." class="img-thumbnail">
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
                              <form class="deleteform d-inline-block" action="" method="post">
                                      <button type="submit" class="btn btn-danger deletebtn">
                                      <span class="btn-label">
                                          <i class="fas fa-trash"></i>
                                      </span>
                                      Delete
                                      </button>
                                  </form>
                                <div role="button" class="btn btn-primary mr-2">
                                   <i class="fa fa-folder-o fa-fw"></i>  {{ __('trans.browseFiles') }}
                                   <input type="file" title='{{ __('trans.Click to Add file') }}' name="inner_image" />
                                   <p class="em text-danger mb-0" id="errinner_img"></p>
                                </div>
                                <small class="status text-muted">{{ __('trans.selectFile') }}</small>
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
                <form id="ajaxForm" action="{{route('admin.page.update')}}" method="post">
                   <h3> {{ __('trans.vedio Bg Link') }} </h3> 
                   <input type="text"  name="video_link" alue="$page->video_link" class="form-control" />
                   <br>
                   
             </div>
            </div>
            </div>
                  </div>
              </div>

              
              <form id="ajaxForm" action="{{route('admin.page.update')}}" method="post">
                @csrf
                <input type="hidden" name="pageid" value="{{$page->id}}">
                <div class="row">
                  <div class="col-lg-3 p-0">
                    <div class="form-group">
                      <label for="">{{ __('trans.Name') }} **</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$page->name}}">
                      <p id="errname" class="em text-danger mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-3 p-0">
                    <div class="form-group">
                      <label for="">{{ __('trans.Title') }} **</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$page->title}}">
                      <p id="errtitle" class="em text-danger mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-3 p-0">
                    <div class="form-group">
                      <label for="">{{ __('trans.Subtitle') }} **</label>
                      <input type="text" class="form-control" name="subtitle" placeholder="Enter Subtitle" value="{{$page->subtitle}}">
                      <p id="errsubtitle" class="em text-danger mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-3 p-0">
                    <div class="form-group">
                      <label for="">{{ __('trans.Status') }} **</label>
                      <select class="form-control ltr" name="status">
                        <option value="1" {{$page->status == 1 ? 'selected' : ''}}>{{ __('trans.Active') }}</option>
                        <option value="0" {{$page->status == 0 ? 'selected' : ''}}>{{ __('trans.Deactive') }}</option>
                      </select>
                      <p id="errstatus" class="em text-danger mb-0"></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">{{ __('trans.Body') }} **</label>
                  <textarea id="body" class="form-control summernote" name="body" data-height="500">{{replaceBaseUrl($page->body)}}</textarea>
                  <p id="errbody" class="em text-danger mb-0"></p>
                </div>
                <div class="form-group">
                  <label for="">{{ __('trans.Serial Number') }} **</label>
                  <input type="number" class="form-control ltr" name="serial_number" value="{{$page->serial_number}}" placeholder="Enter Serial Number">
                  <p id="errserial_number" class="mb-0 text-danger em"></p>
                  <p class="text-warning"><small>.{{ __('trans.text-warning') }}</small></p>
                </div>
                <div class="form-group">
                   <label>{{ __('trans.Meta Keywords') }}</label>
                   <input class="form-control" name="meta_keywords" value="{{$page->meta_keywords}}" placeholder="Enter meta keywords" data-role="tagsinput">
                </div>
                <div class="form-group">
                   <label>{{ __('trans.Meta Description') }}</label>
                   <textarea class="form-control" name="meta_description" rows="5" placeholder="Enter meta description">{{$page->meta_description}}</textarea>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">{{ __('trans.Update') }}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
