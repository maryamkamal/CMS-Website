{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLongTitle">{{ __('trans.Add Gateway') }}</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">

             <form id="ajaxForm" class="modal-form" action="{{route('admin.gateway.offline.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="">{{ __('trans.Name') }}</label>
                           <input type="text" class="form-control" name="name" placeholder="Enter name" value="">
                           <p id="errname" class="mb-0 text-danger em"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                   <label for="">{{ __('trans.Short Description') }}</label>
                   <textarea class="form-control" name="short_description" rows="3" cols="80" placeholder="Enter short description"></textarea>
                   <p id="errshort_description" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                   <label for="">{{ __('trans.Instructions') }}</label>
                   <textarea class="form-control summernote" name="instructions" rows="3" cols="80" placeholder="Enter instructions" data-height="150"></textarea>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>{{ __('trans.Receipt Image') }} </label>
                          <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="is_receipt" value="1" class="selectgroup-input" checked>
                                    <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="is_receipt" value="0" class="selectgroup-input">
                                    <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="">{{ __('trans.serialNumber') }}</label>
                           <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
                           <p id="errserial_number" class="mb-0 text-danger em"></p>
                           <p class="text-warning"><small>{{ __('trans.serialNumberAlert') }}T</small></p>
                        </div>
                    </div>
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
