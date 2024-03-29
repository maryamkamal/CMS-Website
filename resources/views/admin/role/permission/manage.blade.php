@extends('admin.layout')

@section('content')
@if(session('language')!=null)
<?php App::setLocale(session('language'));
?>
@else
<?php App::setLocale("en");
?>
@endif
  <div class="page-header">
    <h4 class="page-title">{{ __('trans.Roles') }}</h4>
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
        <a href="#">{{$role->name}}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{ __('trans.Permissions Management') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">{{ __('trans.Permissions Management') }}</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.role.index')}}">
            <span class="btn-label">
              <i class="fas fa-backward" style="font-size: 12px;"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              {{--  onsubmit="return false;" --}}
              <form id="permissionsForm" class="" action="{{route('admin.role.permissions.update')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="role_id" value="{{Request::route('id')}}">

                @php
                  $permissions = $role->permissions;
                  if (!empty($role->permissions)) {
                    $permissions = json_decode($permissions, true);
                    // dd($permissions);
                  }
                @endphp

                <div class="form-group">
                  <label for="">{{ __('trans.Permissions') }}: </label>
                	<div class="selectgroup selectgroup-pills mt-2">
                		<label class="selectgroup-item">
                			<input type="hidden" name="permissions[]" value="Dashboard" class="selectgroup-input">
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Basic Settings" class="selectgroup-input" @if(is_array($permissions) && in_array('Basic Settings', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Basic Settings') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Customers" class="selectgroup-input" @if(is_array($permissions) && in_array('Customers', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Customers') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Subscribers" class="selectgroup-input" @if(is_array($permissions) && in_array('Subscribers', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Subscribers') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Package Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Package Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Package Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Quote Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Quote Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Quote Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Product Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Product Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Product Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Tickets" class="selectgroup-input" @if(is_array($permissions) && in_array('Tickets', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Tickets') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Payment Gateways" class="selectgroup-input" @if(is_array($permissions) && in_array('Payment Gateways', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Payment Gateways') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Home Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Home Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Home Page') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Menu Builder" class="selectgroup-input" @if(is_array($permissions) && in_array('Menu Builder', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Drag') }} & {{ __('trans.Drop Menu Builder') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Footer" class="selectgroup-input" @if(is_array($permissions) && in_array('Footer', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Footer') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Pages" class="selectgroup-input" @if(is_array($permissions) && in_array('Pages', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Pages') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Service Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Service Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Service Page') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Portfolio Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Portfolio Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Portfolio Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Career Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Career Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Career Page') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Event Calendar" class="selectgroup-input" @if(is_array($permissions) && in_array('Event Calendar', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Event Calendar') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Gallery Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Gallery Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Gallery Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="FAQ Management" class="selectgroup-input" @if(is_array($permissions) && in_array('FAQ Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.FAQ Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Blogs" class="selectgroup-input" @if(is_array($permissions) && in_array('Blogs', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Blogs') }}</span>
						</label>

						<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="RSS Feeds" class="selectgroup-input" @if(is_array($permissions) && in_array('RSS Feeds', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.RSS Feeds') }}</span>
						</label>

						<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Sitemap" class="selectgroup-input" @if(is_array($permissions) && in_array('Sitemap', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Sitemap') }}</span>
						</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Contact Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Contact Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Contact Page') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Role Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Role Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Role Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Users Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Users Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Users Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Language Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Language Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Language Management') }}</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Backup" class="selectgroup-input" @if(is_array($permissions) && in_array('Backup', $permissions)) checked @endif>
                			<span class="selectgroup-button">{{ __('trans.Backup') }}</span>
                		</label>
                	</div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success" onclick="document.getElementById('permissionsForm').submit();">{{ __('trans.Update') }}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
