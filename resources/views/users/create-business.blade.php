@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			{{ Form::open() }}
			<div class="col-md-12">
				<div class="card">
					<h1>List Your Business. <small>It's Free.</small></h1>
				</div>
			</div>
			<div class="col-md-7">
				<div class="card">
					<h4 class="title">Business Details</h4>
					<hr>
					@if($errors->has('message'))
					<p class='text-danger'>{{ $errors->first('message') }}</p>
					@endif
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						{{ Form::text('title', null, ['class'=>'form-control input-sm', 'placeholder'=>'Business Title']) }}
					</div>
					<div class="row">
						<div class="col-md-6">
						<div class="form-group {{ $errors->has('emails.0') ? 'has-error' : '' }}">
							{{ Form::text('emails[]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Business Email']) }}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group {{ $errors->has('emails.1') ? 'has-error' : '' }}">
							{{ Form::text('emails[]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Business Email']) }}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group {{ $errors->has('contacts.0') ? 'has-error' : '' }}">
							{{ Form::text('contacts[]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Business Contact']) }}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group {{ $errors->has('contacts.1') ? 'has-error' : '' }}">
							{{ Form::text('contacts[]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Business Contact (optional..)']) }}
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
							{{ Form::text('city', null, ['class'=>'form-control input-sm', 'placeholder'=>'City']) }}
						</div>
						</div>
						<div class="col-md-9">
						<div class="form-group">
							{{ Form::text('address', null, ['class'=>'form-control input-sm', 'placeholder'=>'Address']) }}
						</div>
						</div>
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						{{ Form::textarea('body', null, ['class'=>'form-control input-sm', 'placeholder'=>'Write an amazing and unique description about your business']) }}
					</div>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="card">
					<h4 class="title">Web Links</h4>
					<hr>
					<div class="form-group">
						{{ Form::text('urls["website"]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Website Url']) }}
					</div>
					<div class="form-group">
						{{ Form::text('urls["facebook"]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Facebook']) }}
					</div>
					<div class="form-group">
						{{ Form::text('urls["twitter"]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Twitter']) }}
					</div>
					<div class="form-group">
						{{ Form::text('urls["youtube"]', null, ['class'=>'form-control input-sm', 'placeholder'=>'YouTube']) }}
					</div>
					<div class="form-group">
						{{ Form::text('urls["googleplus"]', null, ['class'=>'form-control input-sm', 'placeholder'=>'Google+']) }}
					</div>
				</div>
				@if(!Auth::user())
				<div class="card">
					<h4 class="title">Personal Details</h4>
					<hr>
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{{ Form::text('name', null, ['class'=>'form-control input-sm', 'placeholder'=>'Your Name']) }}
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					{{ Form::email('email', null, ['class'=>'form-control input-sm', 'placeholder'=>'Your Email']) }}
					</div>
					<div class="form-group {{ (Session::has('incorrect_password') || $errors->has('password')) ? 'has-error' : '' }}">
					{{ Form::password('password', ['class'=>'form-control input-sm', 'placeholder'=>'Enter Password']) }}
					</div>
				</div>
				@endif
				<div class="form-group clearfix">
					{{ Form::submit('Submit', ['class'=>'btn btn-primary pull-right']) }}
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
@endsection