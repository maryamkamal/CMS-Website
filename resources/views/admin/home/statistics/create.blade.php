@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
<div class="modal fade" id="createStatisticModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form id="ajaxForm" class="modal-form" action="{{route('admin.statistics.store')}}" method="POST">
           <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">{{ __('trans.Add Statistic') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
           </div>
           <div class="modal-body">
              <div class="row">
                 <div class="col-lg-12">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('trans.Language') }} **</label>
                        <select name="language_id" class="form-control">
                            <option value="" selected disabled>{{ __('trans.selectLanguage') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                            @endforeach
                        </select>
                        <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                       <label for="">{{ __('trans.icon') }} **</label>
                       <div class="btn-group d-block">
                          <button type="button" class="btn btn-primary iconpicker-component"><i
                             class="fa fa-fw fa-heart"></i></button>
                          <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                             data-selected="fa-car" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu"></div>
                       </div>
                       <input id="inputIcon" type="hidden" name="icon" value="fas fa-heart">
                       <div class="mt-2">
                          <small>{{ __('trans.select an icon') }}</small>
                       </div>
                    </div>
                    <div class="form-group">
                       <label for="">{{ __('trans.Title') }} **</label>
                       <input type="text" class="form-control" name="title" value="" placeholder="{{__('trans.Enter Title')}}">
                       <p id="errtitle" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                       <label for="">{{ __('trans.Quantity') }} **</label>
                       <div class="input-group mb-3">
                          <input type="text" class="form-control" name="quantity" value="" placeholder="{{__('trans.Enter Quantity')}}" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                             <span class="input-group-text" id="basic-addon2">+</span>
                          </div>
                       </div>
                       <p id="errquantity" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                      <label for="">{{ __('trans.Serial Number') }} **</label>
                      <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="{{__('trans.Enter Serial Number')}}">
                      <p id="errserial_number" class="mb-0 text-danger em"></p>
                      <p class="text-warning"><small>{{ __('trans.Quantity Serial Number') }}</small></p>
                    </div>
                 </div>
              </div>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Close') }}</button>
              <button id="submitBtn" type="submit" class="btn btn-success @if(session('language') == "ar") mr-2 @else ml-2 @endif">{{ __('trans.Submit') }}</button>
           </div>
         </form>
      </div>
   </div>
</div>
