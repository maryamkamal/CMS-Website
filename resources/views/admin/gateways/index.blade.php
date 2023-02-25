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
    <h4 class="page-title">{{ __('trans.Payment Gateways') }}</h4>
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
        <a href="#">{{ __('trans.Payment Gateways') }}</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <form action="{{route('admin.paypal.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Paypal') }}</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf

                <div class="form-group">
                  <label>{{ __('trans.Paypal') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" {{$paypal->status == 1 ? 'checked' : ''}}>
                      <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" {{$paypal->status == 0 ? 'checked' : ''}}>
                      <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                    </label>
                  </div>
                </div>
                @php
                    $paypalInfo = json_decode($paypal->information, true);
                    // dd($paypalInfo);
                @endphp
                <div class="form-group">
                  <label>{{ __('trans.Paypal Test Mode') }}</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" {{$paypalInfo["sandbox_check"] == 1 ? 'checked' : ''}}>
                      <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" {{$paypalInfo["sandbox_check"] == 0 ? 'checked' : ''}}>
                      <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('trans.Paypal Client ID') }}</label>
                  <input class="form-control" name="client_id" value="{{$paypalInfo["client_id"]}}">
                  @if ($errors->has('client_id'))
                    <p class="mb-0 text-danger">{{$errors->first('client_id')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>{{ __('trans.Paypal Client Secret') }}</label>
                  <input class="form-control" name="client_secret" value="{{$paypalInfo["client_secret"]}}">
                  @if ($errors->has('client_secret'))
                    <p class="mb-0 text-danger">{{$errors->first('client_secret')}}</p>
                  @endif
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form class="" action="{{route('admin.stripe.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Stripe') }}</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf
                @php
                    $stripeInfo = json_decode($stripe->information, true);
                    // dd($stripeInfo);
                @endphp
                <div class="form-group">
                    <label>{{ __('trans.Stripe') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="1" class="selectgroup-input" {{$stripe->status == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="0" class="selectgroup-input" {{$stripe->status == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Stripe Key') }}</label>
                    <input class="form-control" name="key" value="{{$stripeInfo['key']}}">
                    @if ($errors->has('key'))
                        <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Stripe Secret') }}</label>
                    <input class="form-control" name="secret" value="{{$stripeInfo['secret']}}">
                    @if ($errors->has('secret'))
                        <p class="mb-0 text-danger">{{$errors->first('secret')}}</p>
                    @endif
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form class="" action="{{route('admin.paytm.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Paytm') }}</div>
                  </div>
              </div>
          </div>


          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf
                @php
                    $paytmInfo = json_decode($paytm->information, true);
                    // dd($paytmInfo);
                @endphp
                <div class="form-group">
                    <label>{{ __('trans.Paytm') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="1" class="selectgroup-input" {{$paytm->status == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="0" class="selectgroup-input" {{$paytm->status == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Paytm Merchant Key') }}</label>
                    <input class="form-control" name="secret" value="{{$paytmInfo['secret']}}">
                    @if ($errors->has('secret'))
                        <p class="mb-0 text-danger">{{$errors->first('secret')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Paytm Merchant mid') }}</label>
                    <input class="form-control" name="merchant" value="{{$paytmInfo['merchant']}}">
                    @if ($errors->has('merchant'))
                        <p class="mb-0 text-danger">{{$errors->first('merchant')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Paytm Merchant website') }}</label>
                    <input class="form-control" name="website" value="{{$paytmInfo['website']}}">
                    @if ($errors->has('website'))
                        <p class="mb-0 text-danger">{{$errors->first('website')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Industry type id') }}</label>
                    <input class="form-control" name="industry" value="{{$paytmInfo['industry']}}">
                    @if ($errors->has('industry'))
                        <p class="mb-0 text-danger">{{$errors->first('industry')}}</p>
                    @endif
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form class="" action="{{route('admin.instamojo.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Instamojo') }}</div>
                  </div>
              </div>
          </div>


          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf
                @php
                    $instamojoInfo = json_decode($instamojo->information, true);
                    // dd($instamojoInfo);
                @endphp
                <div class="form-group">
                    <label>{{ __('trans.Instamojo') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="1" class="selectgroup-input" {{$instamojo->status == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="0" class="selectgroup-input" {{$instamojo->status == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Test Mode') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" {{$instamojoInfo['sandbox_check'] == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" {{$instamojoInfo['sandbox_check'] == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Instamojo API Key') }}</label>
                    <input class="form-control" name="key" value="{{$instamojoInfo['key']}}">
                    @if ($errors->has('key'))
                        <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Instamojo Auth Token') }}</label>
                    <input class="form-control" name="token" value="{{$instamojoInfo['token']}}">
                    @if ($errors->has('token'))
                        <p class="mb-0 text-danger">{{$errors->first('token')}}</p>
                    @endif
                </div>

              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form class="" action="{{route('admin.paystack.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Paystack') }}</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf
                @php
                    $paystackInfo = json_decode($paystack->information, true);
                    // dd($paystackInfo);
                @endphp
                <div class="form-group">
                    <label>{{ __('trans.Paystack') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="1" class="selectgroup-input" {{$paystack->status == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="0" class="selectgroup-input" {{$paystack->status == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Paystack Public Key') }}</label>
                    <input class="form-control" name="key" value="{{$paystackInfo['key']}}">
                    @if ($errors->has('key'))
                        <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.confirmInfo') }}Paystack Business Email</label>
                    <input class="form-control" name="email" value="{{$paystackInfo['email']}}">
                    @if ($errors->has('email'))
                        <p class="mb-0 text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-lg-4">
      <div class="card">
        <form class="" action="{{route('admin.flutterwave.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">{{ __('trans.Flutterwave') }}</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-12">
                @csrf
                @php
                    $flutterwaveInfo = json_decode($flutterwave->information, true);
                    // dd($flutterwaveInfo);
                @endphp
                <div class="form-group">
                    <label>{{ __('trans.Flutterwave') }}</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="1" class="selectgroup-input" {{$flutterwave->status == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status" value="0" class="selectgroup-input" {{$flutterwave->status == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Flutterwave Public Key') }}</label>
                    <input class="form-control" name="public_key" value="{{$flutterwaveInfo['public_key']}}">
                    @if ($errors->has('public_key'))
                        <p class="mb-0 text-danger">{{$errors->first('public_key')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('trans.Flutterwave Secret Key') }}</label>
                    <input class="form-control" name="secret_key" value="{{$flutterwaveInfo['secret_key']}}">
                    @if ($errors->has('secret_key'))
                        <p class="mb-0 text-danger">{{$errors->first('secret_key')}}</p>
                    @endif
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <form class="" action="{{route('admin.mollie.update')}}" method="post">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">{{ __('trans.Mollie Payment') }}</div>
                    </div>
                </div>
            </div>


            <div class="card-body pt-5 pb-5">
                <div class="row">
                <div class="col-lg-12">
                    @csrf
                    @php
                        $mollieInfo = json_decode($mollie->information, true);
                        // dd($mollieInfo);
                    @endphp
                    <div class="form-group">
                        <label>{{ __('trans.Mollie Payment') }}</label>
                        <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="1" class="selectgroup-input" {{$mollie->status == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="0" class="selectgroup-input" {{$mollie->status == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('trans.Mollie Payment Key') }}</label>
                        <input class="form-control" name="key" value="{{$mollieInfo['key']}}">
                        @if ($errors->has('key'))
                            <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                        @endif
                    </div>

                </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="form">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <form class="" action="{{route('admin.razorpay.update')}}" method="post">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">{{ __('trans.Razorpay') }}</div>
                    </div>
                </div>
            </div>


            <div class="card-body pt-5 pb-5">
                <div class="row">
                <div class="col-lg-12">
                    @csrf
                    @php
                        $razorpayInfo = json_decode($razorpay->information, true);
                        // dd($razorpayInfo);
                    @endphp
                    <div class="form-group">
                        <label>Razorpay</label>
                        <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="1" class="selectgroup-input" {{$razorpay->status == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="0" class="selectgroup-input" {{$razorpay->status == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('trans.Razorpay Key') }}</label>
                        <input class="form-control" name="key" value="{{$razorpayInfo['key']}}">
                        @if ($errors->has('key'))
                            <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>{{ __('trans.Razorpay Secret') }}</label>
                        <input class="form-control" name="secret" value="{{$razorpayInfo['secret']}}">
                        @if ($errors->has('secret'))
                            <p class="mb-0 text-danger">{{$errors->first('secret')}}</p>
                        @endif
                    </div>

                </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="form">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <form class="" action="{{route('admin.payumoney.update')}}" method="post">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">{{ __('trans.PayUmoney') }}</div>
                    </div>
                </div>
            </div>


            <div class="card-body pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-12">
                        @csrf
                        @php
                            $payumoneyInfo = json_decode($payumoney->information, true);
                        @endphp
                        <div class="form-group">
                            <label>{{ __('trans.PayUmoney') }}</label>
                            <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="1" class="selectgroup-input" {{$payumoney->status == 1 ? 'checked' : ''}}>
                                <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="0" class="selectgroup-input" {{$payumoney->status == 0 ? 'checked' : ''}}>
                                <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                            </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('trans.PayUmoney Merchant Key') }}</label>
                            <input class="form-control" name="key" value="{{$payumoneyInfo['key']}}">
                            @if ($errors->has('key'))
                                <p class="mb-0 text-danger">{{$errors->first('key')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ __('trans.PayUmoney Salt') }}</label>
                            <input class="form-control" name="salt" value="{{$payumoneyInfo['salt']}}">
                            @if ($errors->has('salt'))
                                <p class="mb-0 text-danger">{{$errors->first('salt')}}</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="form">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <form class="" action="{{route('admin.mercadopago.update')}}" method="post">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">{{ __('trans.Mercado pago') }}</div>
                    </div>
                </div>
            </div>


            <div class="card-body pt-5 pb-5">

                    @csrf
                    @php
                        $mercadopagoInfo = json_decode($mercadopago->information, true);
                        // dd($mercadopagoInfo);
                    @endphp
                    <div class="form-group">
                        <label>{{ __('trans.Mercado Pago') }}</label>
                        <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="1" class="selectgroup-input" {{$mercadopago->status == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="0" class="selectgroup-input" {{$mercadopago->status == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                        </div>
                    </div>

                    <div class="form-group">
                      <label>{{ __('trans.Mercado Pago Test Mode') }}</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="sandbox_check" value="1" class="selectgroup-input" {{$mercadopagoInfo["sandbox_check"] == 1 ? 'checked' : ''}}>
                          <span class="selectgroup-button">{{ __('trans.activ') }}</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="sandbox_check" value="0" class="selectgroup-input" {{$mercadopagoInfo["sandbox_check"] == 0 ? 'checked' : ''}}>
                          <span class="selectgroup-button">{{ __('trans.disable') }}</span>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('trans.Mercadopago Token') }}</label>
                        <input class="form-control" name="token" value="{{$mercadopagoInfo['token']}}">
                        @if ($errors->has('token'))
                            <p class="mb-0 text-danger">{{$errors->first('token')}}</p>
                        @endif
                    </div>
            </div>

            <div class="card-footer">
                <div class="form">
                <div class="form-group from-show-notify row">
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">{{ __('trans.confirmInfo') }}</button>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
  </div>

@endsection
