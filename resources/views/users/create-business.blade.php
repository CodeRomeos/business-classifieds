@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card">
					<h1>List Your Business. <small>It's Free.</small></h1>
				</div>
				<div class="card">
					{{ Form::open() }}
					<div class="form-group">
						{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Business Title']) }}
					</div>
					<div class="form-group">
						{{ Form::file('title', null, ['class'=>'form-control', 'placeholder'=>'Business Title']) }}
					</div>
					<div class="form-group row">
						<div class="col-md-4">{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Business Contact ']) }}</div>
						<div class="col-md-4">{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Business Contact (Optional..)']) }}</div>
						<div class="col-md-4">{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Business Contact (Optional..)']) }}</div>
					</div>
					<div class="form-group">
						{{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Business Email']) }}
					</div>
					<div class="form-group">
						{{ Form::url('website', null, ['class'=>'form-control', 'placeholder'=>'Webiste URL']) }}
					</div>
					<div class="form-group">
						{{ Form::textarea('website', null, ['class'=>'form-control', 'placeholder'=>'Write an amazing and unique description about your business']) }}
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection