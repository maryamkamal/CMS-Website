<!-- Details Modal -->

<div class="modal fade" id="detailsModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('trans.Details') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">{{ __('trans.Name') }}:</strong>
                </div>
                <div class="col-lg-8">{{$order->name}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">{{ __('trans.email') }}:</strong>
                </div>
                <div class="col-lg-8">{{$order->email}}</div>
            </div>
            <hr>

          @php
            $fields = json_decode($order->fields, true);
          @endphp

          @foreach ($fields as $key => $field)
          <div class="row">
            <div class="col-lg-4">
              <strong style="text-transform: capitalize;">{{str_replace("_"," ",$key)}}:</strong>
            </div>
            <div class="col-lg-8">
                @if (is_array($field))
                    @php
                        $str = implode(", ", $field);
                    @endphp
                    {{convertUtf8($str)}}
                @else
                    {{convertUtf8($field)}}
                @endif
            </div>
          </div>
          <hr>
          @endforeach
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Package Title') }}:</strong>
            </div>
            <div class="col-lg-8">
              {{convertUtf8($order->package_title)}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Package Price') }}:</strong>
            </div>
            <div class="col-lg-8">
                {{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}}{{convertUtf8($order->package_price)}}{{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Payment Method') }}:</strong>
            </div>
            <div class="col-lg-8">
              {{$order->method}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Payment Status') }}:</strong>
            </div>
            <div class="col-lg-8">
                @if ($order->payment_status == 1)
                    <span class="badge badge-success">{{ __('trans.Completed') }}</span>
                @elseif ($order->payment_status == 0)
                    <span class="badge badge-danger">{{ __('trans.Incomplete') }}</span>
                @endif
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Order Date') }}:</strong>
            </div>
            <div class="col-lg-8">
              {{$order->created_at}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Status') }}:</strong>
            </div>
            <div class="col-lg-8">
              @if ($order->status == 0)
                <span class="badge badge-warning">{{ __('trans.Pending') }}</span>
              @elseif ($order->status == 1)
                <span class="badge badge-secondary">{{ __('trans.Processing') }}</span>
              @elseif ($order->status == 2)
                <span class="badge badge-success">{{ __('trans.Completed') }}</span>
              @elseif ($order->status == 3)
                <span class="badge badge-danger">{{ __('trans.Rejected') }}</span>
              @endif
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.Package Description') }}:</strong>
            </div>
            <div class="col-lg-8">
              {!! $order->package_description !!}
            </div>
          </div>
          <hr>
          @if (!empty($order->nda))
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.NDA File') }}:</strong>
            </div>
            <div class="col-lg-8">
              <a class="btn btn-secondary btn-sm" href="{{asset('assets/front/ndas/'.$order->nda)}}" target="_blank">
                <span class="btn-label">
                  <i class="fa fa-eye"></i>
                </span>
                {{ __('trans.View') }}
              </a>
            </div>
          </div>
          <hr>
          @endif

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Close') }}</button>
      </div>
    </div>
  </div>
</div>
