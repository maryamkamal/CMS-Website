<!-- Details Modal -->

<div class="modal fade" id="detailsModal{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <div class="col-lg-8">{{convertUtf8($quote->name)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">{{ __('trans.Email') }}:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->email)}}</div>
            </div>
            <hr>

          @php
            $fields = json_decode($quote->fields, true);
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
              <strong>{{ __('trans.Status') }}:</strong>
            </div>
            <div class="col-lg-8">
              @if ($quote->status == 0)
                <span class="badge badge-warning">{{ __('trans.Pending') }}</span>
              @elseif ($quote->status == 1)
                <span class="badge badge-secondary">{{ __('trans.Processing') }}</span>
              @elseif ($quote->status == 2)
                <span class="badge badge-success">{{ __('trans.Completed') }}</span>
              @elseif ($quote->status == 3)
                <span class="badge badge-danger">{{ __('trans.Rejected') }}</span>
              @endif
            </div>
          </div>
          <hr>

          @if (!empty($quote->nda))
          <div class="row">
            <div class="col-lg-4">
              <strong>{{ __('trans.NDA File') }}:</strong>
            </div>
            <div class="col-lg-8">
              <a class="btn btn-secondary btn-sm" href="{{asset('assets/front/ndas/'.$quote->nda)}}" target="_blank">
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
