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
			<div class="col-md-8">
				<div class="card">
					<h4>Business Details</h4>
					<hr>
					@if($errors->has('message'))
					<p class='text-danger'>{{ $errors->first('message') }}</p>
					@endif
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Business Title']) }}
					</div>
					<div class="form-group row">
						<div class="col-md-4">{{ Form::text('contacts', null, ['class'=>'form-control', 'placeholder'=>'Business Contacts ']) }}</div>
						<div class="col-md-4">{{ Form::text('emails', null, ['class'=>'form-control', 'placeholder'=>'Business Emails (optional..)']) }}</div>
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						{{ Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Write an amazing and unique description about your business']) }}
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				@if(!Auth::user())
				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<h4>Personal Details</h4>
							<hr>
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Your Name']) }}
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							{{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Your Email']) }}
							</div>
							<div class="form-group {{ (Session::has('incorrect_password') || $errors->has('password')) ? 'has-error' : '' }}">
							{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter Password']) }}
							</div>
						</div>
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