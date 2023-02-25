@extends('admin.layout')

@php
$selLang = \App\Language::where('code', request()->input('language'))->first();
@endphp
@if(!empty($selLang) && $selLang->rtl == 1)
@section('styles')
<style>
    form:not(.modal-form) input,
    form:not(.modal-form) textarea,
    form:not(.modal-form) select,
    select[name='language'] {
        direction: rtl;
    }
    form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
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
   <h4 class="page-title">{{ __('trans.Services') }}</h4>
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
         <a href="#">{{ __('trans.Service Page') }}</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">{{ __('trans.Services') }}</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-lg-4">
                  <div class="card-title d-inline-block">{{ __('trans.Services') }}</div>
               </div>
               <div class="col-lg-3">
                  @if (!empty($langs))
                  <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                     <option value="" selected disabled>{{ __('trans.selectLanguage') }}</option>
                     @foreach ($langs as $lang)
                     <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                     @endforeach
                  </select>
                  @endif
               </div>
               <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                  <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i>{{ __('trans.Add Service') }} </a>
                  <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.service.bulk.delete')}}"><i class="flaticon-interface-5"></i> {{ __('trans.delete') }}</button>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-12">
                  @if (count($services) == 0)
                  <h3 class="text-center">{{ __('trans.NO SERVICE FOUND') }}</h3>
                  @else
                  <div class="table-responsive">
                     <table class="table table-striped mt-3">
                        <thead>
                           <tr>
                              <th scope="col">
                                 <input type="checkbox" class="bulk-check" data-val="all">
                              </th>
                              <th scope="col">{{ __('trans.Image') }}</th>
                              <th scope="col">{{ __('trans.Title') }}</th>
                              @if (hasCategory($be->theme_version))
                                <th scope="col">{{ __('trans.Category') }}</th>
                              @endif
                              @if (!hasCategory($be->theme_version))
                                <th scope="col">{{ __('trans.Featured') }}</th>
                              @endif
                              <th scope="col">{{ __('trans.Serial Number') }}</th>
                              <th scope="col">{{ __('trans.actions') }}</th>
                           </tr>
                        </thead>


                        <tbody>
                           @foreach ($services as $key => $service)
                           <tr>
                              <td>
                                 <input type="checkbox" class="bulk-check" data-val="{{$service->id}}">
                              </td>
                              <td><img src="{{asset('assets/front/img/services/'.$service->main_image)}}" alt="" width="70"></td>
                              <td>{{strlen(convertUtf8($service->title)) > 100 ? convertUtf8(substr($service->title, 0, 100)) . '...' : convertUtf8($service->title)}}</td>

                              @if (hasCategory($be->theme_version))
                                <td>
                                    @if (!empty($service->scategory))
                                    {{convertUtf8($service->scategory->name)}}
                                    @endif
                                </td>
                              @endif

                              @if (!hasCategory($be->theme_version))
                                <td>
                                    <form id="featureForm{{$service->id}}" class="d-inline-block" action="{{route('admin.service.feature')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{$service->id}}">
                                    <select class="form-control {{$service->feature == 1 ? 'bg-success' : 'bg-danger'}}" name="feature" onchange="document.getElementById('featureForm{{$service->id}}').submit();">
                                        <option value="1" {{$service->feature == 1 ? 'selected' : ''}}>{{ __('trans.Yes') }}</option>
                                        <option value="0" {{$service->feature == 0 ? 'selected' : ''}}>{{ __('trans.No') }}</option>
                                    </select>
                                    </form>
                                </td>
                              @endif

                              <td>{{$service->serial_number}}</td>
                              <td>
                                 <a class="btn btn-secondary btn-sm" href="{{route('admin.service.edit', $service->id) . '?language=' . request()->input('language')}}">
                                    <span class="btn-label">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    {{ __('trans.edit') }}
                                 </a>
                                 <form class="deleteform d-inline-block" action="{{route('admin.service.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{$service->id}}">
                                    <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                        <span class="btn-label">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        {{ __('trans.delete') }}
                                    </button>
                                 </form>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  @endif
               </div>
            </div>
         </div>
         <div class="card-footer">
            <div class="row">
               <div class="d-inline-block mx-auto">
                  {{$services->appends(['language' => request()->input('language')])->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Create Service Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('trans.Add Service') }}</h5>
            
         </div>
         <div class="modal-body">
            <form class="mb-3 dm-uploader drag-and-drop-zone modal-form" enctype="multipart/form-data" action="{{route('admin.service.upload')}}" method="POST">
               <div class="form-row px-2">
                  <div class="col-12 mb-2">
                     <label for=""><strong>{{ __('trans.Image') }} </strong></label>
                  </div>
                  <div class="col-md-12 d-md-block d-sm-none mb-3">
                     <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                  </div>
                  <div class="col-sm-12">
                     <div class="from-group mb-2">
                        <input type="text" class="form-control progressbar" aria-describedby="fileHelp" placeholder="No image uploaded..." readonly="readonly" />
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
                           <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                           <input type="file" title='Click to add Files' />
                        </div>
                        <small class="status text-muted">{{ __('trans.selectFile') }} </small>
                        <p class="em text-danger mb-0" id="errservice_image"></p>
                     </div>
                  </div>
               </div>
            </form>

			 <div class="card">
			  <div class="card-header  card-head-raduis" style="background-color: #68554b;" id="headingOne">
                     <h5 class="mb-0 ">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <i class="fa fa-plus mr-2"></i>
                           <h3 class="d-inline-block">{{ __('trans.page Bg property') }}</h3>
                        </button>
                     </h5>
                  </div>

    <div id="collapseOne" class="collapse rounded border" style="border-color:#68554b !important" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
<div class="row">
     <form class="mb-3 dm-uploader drag-and-drop-zone-1 modal-form" enctype="multipart/form-data" action="{{route('admin.service.uploadBackground')}}" method="POST">
               <div class="form-row px-2">
                  <div class="col-12 mb-2">
                     <label for=""><strong>{{ __('trans.Bg') }}**</strong></label>
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
                           <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                           <input type="file" title='Click to add Files' />
                        </div>
                        <small class="status text-muted">{{ __('trans.selectFileStruc') }}</small>
                        <p class="em text-danger mb-0" id="errservice_image"></p>
                     </div>
                  </div>
               </div>
            </form>
            </div>
            <div class="row">
            <form class="mb-3 dm-uploader drag-and-drop-zone-2 modal-form" enctype="multipart/form-data" action="{{route('admin.service.uploadInnerImg')}}" method="POST">
               <div class="form-row px-2">
                  <div class="col-12 mb-2">
                     <label for=""><strong>{{ __('trans.Image') }} **</strong></label>
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
                           <i class="fa fa-folder-o fa-fw"></i> {{ __('trans.browseFiles') }}
                           <input type="file" title='Click to add Files' />
                        </div>
                        <small class="status text-muted">{{ __('trans.selectFileStruc') }}</small>
                        <p class="em text-danger mb-0" id="errservice_image"></p>
                     </div>
                  </div>
               </div>
            </form>
          </div>
          <br>
          <br>
    <div class="row">
         <div class="col-md-12">
         <form id="ajaxForm" class="modal-form" action="{{route('admin.service.store')}}" method="POST">
           <h3>{{ __('trans.vedio Bg Link') }}  </h3> 
           <input type="text"  name="video_link" class="form-control" />
           <br>
           
     </div>
    </div>
    </div>
  </div>
          </div>
           
               @csrf
          
               <input type="hidden" id="image" name="" value="">
               <div class="form-group">
                  <label for="">{{ __('trans.Language') }} </label>
                  <select id="language" name="language_id" class="form-control">
                     @foreach ($langs as $lang)
                     <option value="{{$lang->id}}">{{$lang->name}}</option>
                     @endforeach
                  </select>
                  <p id="errlanguage_id" class="mb-0 text-danger em"></p>
               </div>
               <div class="form-group">
                    <label for="">{{ __('trans.Title') }} **</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="">
                    <p id="errtitle" class="mb-0 text-danger em"></p>
               </div>
               @if (hasCategory($be->theme_version))
               <div class="form-group">
                  <label for="">{{ __('trans.Category') }} **</label>
                  <select id="scategory" class="form-control" name="category" disabled>
                     <option value="" selected disabled>{{ __('trans.Select a category') }}</option>
                  </select>
                  <p id="errcategory" class="mb-0 text-danger em"></p>
               </div>
               @endif

                <div class="form-group">
                    <label for="">{{ __('trans.Summary') }} **</label>
                    <textarea class="form-control" name="summary" placeholder="Enter summary" rows="3"></textarea>
                    <p id="errsummary" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                    <label>{{ __('trans.Details Page') }} **</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="details_page_status" value="1" class="selectgroup-input" checked>
                            <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="details_page_status" value="0" class="selectgroup-input">
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                    </div>
                    <p id="errdetails_page_status" class="mb-0 text-danger em"></p>
                </div>

               <div class="form-group" id="contentFg">
                  <label for="">{{ __('trans.Content') }} **</label>
                  <textarea class="form-control summernote" name="content" data-height="300" placeholder="Enter content"></textarea>
                  <p id="errcontent" class="mb-0 text-danger em"></p>
               </div>
               <div class="row">
                   <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">{{ __('trans.Serial Number') }} **</label>
                            <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                            <p id="errserial_number" class="mb-0 text-danger em"></p>
                            <p class="text-warning"><small>{{ __('trans.warning') }}</small></p>
                        </div>
                   </div>
               </div>
               <div class="form-group">
                  <label>{{ __('trans.Meta Keywords') }}</label>
                  <input class="form-control" name="meta_keywords" value="" placeholder="Enter meta keywords" data-role="tagsinput">
                  <p id="errmeta_keywords" class="mb-0 text-danger em"></p>
               </div>
               <div class="form-group">
                  <label>{{ __('trans.Meta Description') }}</label>
                  <textarea class="form-control" name="meta_description" rows="5" placeholder="Enter meta description"></textarea>
                  <p id="errmeta_description" class="mb-0 text-danger em"></p>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Close') }}</button>
            <button id="submitBtn" type="button" class="btn btn-primary">{{ __('trans.Submit') }}</button>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')


<script>
function toggleDetails() {
    let val = $("input[name='details_page_status']:checked").val();

    // if 'details page' is 'enable', then show 'content' & hide 'summary'
    if (val == 1) {
        $("#contentFg").show();
    }
    // if 'details page' is 'disable', then show 'summary' & hide 'content'
    else if (val == 0) {
        $("#contentFg").hide();
    }
}

$("input[name='details_page_status']").on('change', function() {
    toggleDetails();
});
</script>

@if(hasCategory($be->theme_version))
    <script>
        function loadCategories() {
            $("#scategory").removeAttr('disabled');
            let langid = $("select[name='language_id']").val();
            let url = "{{url('/')}}/admin/service/" + langid + "/getcats";
            // console.log(url);
            $.get(url, function(data) {
                console.log(data);
                let options = `<option value="" disabled selected>Select a category</option>`;
                for (let i = 0; i < data.length; i++) {
                    options += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                $("#scategory").html(options);

            });
        }

        $(document).ready(function() {

            loadCategories();

            $("select[name='language_id']").on('change', function() {
                loadCategories();
            });

        });
    </script>
@endif

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
                    $("form.modal-form input").each(function() {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form select").each(function() {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form textarea").each(function() {
                        if (!$(this).hasClass('ltr')) {
                            $(this).addClass('rtl');
                        }
                    });
                    $("form.modal-form .summernote").each(function() {
                        $(this).siblings('.note-editor').find('.note-editable').addClass('rtl text-right');
                    });

                } else {
                    $("form.modal-form input, form.modal-form select, form.modal-form textarea").removeClass('rtl');
                    $("form.modal-form .summernote").siblings('.note-editor').find('.note-editable').removeClass('rtl text-right');
                }
            })
        });
    });
</script>
@endsection
