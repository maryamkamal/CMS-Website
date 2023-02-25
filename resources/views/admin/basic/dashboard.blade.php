@extends('admin.layout')

@section('content')
@if(session('language')!=null)
@php( App::setLocale(session('language')))
@else
@php( App::setLocale("en"))
@endif
  <div class="mt-2 mb-4">
    <h2 class="text-white pb-2">{{ __('trans.Welcome back') }}, {{Auth::guard('admin')->user()->first_name}} {{Auth::guard('admin')->user()->last_name}}!</h2>
  </div>
  <div class="row">
	<div class="col-lg-6">
		<iframe class="pb-4" width="100%" height="100%" src="https://www.youtube.com/embed/fQEhjNMMKZY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-primary card-round">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-users"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">{{ __('trans.Team Members') }}</p>
								<h4 class="card-title">{{$currentLang->members()->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-info card-round">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-interface-6"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">{{ __('trans.Subscribers') }}</p>
								<h4 class="card-title">{{\App\Subscriber::count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-secondary card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-success"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">{{ __('trans.Quotations') }}</p>
								<h4 class="card-title">{{\App\Quote::count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-success card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-analytics"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category"> {{ __('trans.Projects') }}</p>
								<h4 class="card-title">{{$currentLang->portfolios()->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-warning card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="fab fa-blogger-b"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">{{ __('trans.Blogs') }}</p>
								<h4 class="card-title">{{$currentLang->blogs()->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card card-stats card-danger card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="la flaticon-bars-2"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category">{{ __('trans.Services') }}</p>
								<h4 class="card-title">{{$currentLang->services()->count()}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
		


	</div>


  <div class="row">
    <div class="col-lg-6">
      <div class="row row-card-no-pd">
    		<div class="col-md-12">
    			<div class="card">
    				<div class="card-header">
    					<div class="card-head-row">
    						<h4 class="card-title">{{ __('trans.Recent Quotations') }}</h4>
    					</div>
    					<p class="card-category">
    					{{ __('trans.card category') }}</p>
    				</div>
    				<div class="card-body">
              <div class="row">
                  <div class="col-lg-12">
                      @if (count($quotes) == 0)
                      <h3 class="text-center">{{ __('trans.NO QUOTE REQUEST FOUND') }}</h3>
                      @else
                      <div class="table-responsive">
                          <table class="table table-striped mt-3">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">{{ __('trans.Deatails') }}</th>
                              <th scope="col">{{ __('trans.Mail') }}</th>
                              <th scope="col">{{ __('trans.Action') }}</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($quotes as $key => $quote)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>
                                  <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailsModal{{$quote->id}}"><i class="fas fa-eye"></i>{{ __('trans.View') }}</button>
                                  </td>
                                  <td>
                                  <a href="#" class="btn btn-primary btn-sm editbtn" data-target="#mailModal" data-toggle="modal" data-email="{{$quote->email}}"><i class="far fa-envelope"></i>{{ __('trans.Send') }}</a>
                                  </td>
                                  <td>
                                  <form class="deleteform d-inline-block" action="{{route('admin.quote.delete')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="quote_id" value="{{$quote->id}}">
                                      <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                      <span class="btn-label">
                                          <i class="fas fa-trash"></i>
                                      </span>
                                      {{ __('trans.Delete') }}
                                      </button>
                                  </form>
                                  </td>
                              </tr>

                              @includeif('admin.quote.quote-details')
                              @endforeach
                          </tbody>
                          </table>
                      </div>
                      @endif
                  </div>
              </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col-lg-6">
      <div class="row row-card-no-pd">
    		<div class="col-md-12">
    			<div class="card">
    				<div class="card-header">
    					<div class="card-head-row">
    						<h4 class="card-title">{{ __('trans.Recent Projecs') }}</h4>
    					</div>
    					<p class="card-category">
    					{{ __('trans.Top 10 latest submitted projects') }}</p>
    				</div>
    				<div class="card-body">
    					<div class="row">
    						<div class="col-md-12">
    							<div class="table-responsive table-hover table-sales">
    								<table class="table">
                      <thead>
                        <tr>
                          <th>{{ __('trans.Image') }}</th>
                          <th>{{ __('trans.Title') }}</th>
                          <th>{{ __('trans.Client') }}</th>
                          <th>{{ __('trans.Architecht') }}</th>
                          <th>{{ __('trans.Submission Date') }}</th>
                        </tr>
                      </thead>
    									<tbody>
                        @foreach ($portfolios as $key => $portfolio)
                          <tr>
                            <td><img src="{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}" width="80" /></td>
                            <td>{{strlen($portfolio->title) > 25 ? substr($portfolio->title, 0, 25) . '...' : $portfolio->title}}</td>
                            <td>{{$portfolio->client_name}}</td>
                            <td>{{$portfolio->start_date}}</td>
      											<td>{{$portfolio->submission_date}}</td>
      										</tr>
                        @endforeach
    									</tbody>
    								</table>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
  </div>




  <!-- Send Mail Modal -->
  <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ __('trans.Send Mail') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ajaxEditForm" class="" action="{{route('admin.quotes.mail')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">{{ __('trans.Client Mail') }} **</label>
              <input id="inemail" type="text" class="form-control" name="email" value="" placeholder="Enter email">
              <p id="eerremail" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">{{ __('trans.Subject') }} **</label>
              <input id="insubject" type="text" class="form-control" name="subject" value="" placeholder="Enter subject">
              <p id="eerrsubject" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">{{ __('trans.Message') }} **</label>
              <textarea id="inmessage" class="form-control nic-edit" name="message" rows="5" cols="80" placeholder="Enter message"></textarea>
              <p id="eerrmessage" class="mb-0 text-danger em"></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Close') }}</button>
          <button id="updateBtn" type="button" class="btn btn-primary">{{ __('trans.Send Mail') }}</button>
        </div>
      </div>
    </div>
  </div>
@endsection
