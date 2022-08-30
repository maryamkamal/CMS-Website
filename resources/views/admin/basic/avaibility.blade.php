@extends('admin.layout')

@if(!empty($abe->language) && $abe->language->rtl == 1)
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
{{-- set local --}}
	
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
<div class="page-header">
    <h4 class="page-title">تفعيل الصفحه</h4>
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
          <a href="#">الصفحه الرئيسيه</a>
       </li>
       <li class="separator">
          <i class="flaticon-right-arrow"></i>
       </li>
       <li class="nav-item">
          <a href="#">تفعيل الصفحه</a>
       </li>
    </ul>
 </div>
 <div class="row">
    <div class="col-md-12">
       <div class="card">
          <form class="" action="{{route('admin.avaibility.update', $lang_id)}}" method="post">
             @csrf
             <div class="card-header">
                <div class="row">
                   <div class="col-lg-10">
                      <div class="card-title">تحديث فاعليه الصفحه</div>
                   </div>
                   <div class="col-lg-2">
                      @if (!empty($langs))
                      <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                         <option value="" selected disabled>أختر لغه</option>
                         @foreach ($langs as $lang)
                         <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                         @endforeach
                      </select>
                      @endif
                   </div>
                </div>
             </div>
             <div class="card-body pt-5 pb-5">
                <div class="row">
                   <div class="col-lg-6 offset-lg-3">
                      @csrf
                      <div class="form-group">
                         <label>الخدمات **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_service" value="1" class="selectgroup-input" {{$abs->is_service == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_service" value="0" class="selectgroup-input" {{$abs->is_service == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>الباقات والعروض **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_packages" value="1" class="selectgroup-input" {{$be->is_packages == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_packages" value="0" class="selectgroup-input" {{$be->is_packages == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>الطلبيات الخاصه **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_order_package" value="1" class="selectgroup-input" {{$be->is_order_package == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_order_package" value="0" class="selectgroup-input" {{$be->is_order_package == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>معرض الاعمال **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_portfolio" value="1" class="selectgroup-input" {{$abs->is_portfolio == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_portfolio" value="0" class="selectgroup-input" {{$abs->is_portfolio == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>فريق العمل**</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_team" value="1" class="selectgroup-input" {{$abs->is_team == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_team" value="0" class="selectgroup-input" {{$abs->is_team == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>الوظائف **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_career" value="1" class="selectgroup-input" {{$abe->is_career == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_career" value="0" class="selectgroup-input" {{$abe->is_career == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>التقويم والمناسبات **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_calendar" value="1" class="selectgroup-input" {{$abe->is_calendar == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_calendar" value="0" class="selectgroup-input" {{$abe->is_calendar == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>معرض الصور **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_gallery" value="1" class="selectgroup-input" {{$abs->is_gallery == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_gallery" value="0" class="selectgroup-input" {{$abs->is_gallery == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>الأسئله الشائعه **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_faq" value="1" class="selectgroup-input" {{$abs->is_faq == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_faq" value="0" class="selectgroup-input" {{$abs->is_faq == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>المدونات **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_blog" value="1" class="selectgroup-input" {{$abs->is_blog == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_blog" value="0" class="selectgroup-input" {{$abs->is_blog == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>أـصل بنا **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_contact" value="1" class="selectgroup-input" {{$abs->is_contact == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_contact" value="0" class="selectgroup-input" {{$abs->is_contact == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                      <div class="form-group">
                         <label>طلب طلبيه خاصه **</label>
                         <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                            <input type="radio" name="is_quote" value="1" class="selectgroup-input" {{$abs->is_quote == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تفعيل</span>
                            </label>
                            <label class="selectgroup-item">
                            <input type="radio" name="is_quote" value="0" class="selectgroup-input" {{$abs->is_quote == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">تعطيل</span>
                            </label>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="card-footer">
                <div class="form">
                   <div class="form-group from-show-notify row">
                      <div class="col-12 text-center">
                         <button type="submit" id="displayNotif" class="btn btn-success">تحديث</button>
                      </div>
                   </div>
                </div>
             </div>
          </form>
       </div>
    </div>
 </div>
@endsection
