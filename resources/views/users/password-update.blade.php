@extends('layouts.user')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <div class="card">
            {{ Form::open() }}
                <div class="form-group">
                    <label for="">Current Password</label>
                    {{ Form::password('current_password', ['placeholder'=>'password', 'class'=>'form-control', 'autofocus']) }}
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    {{ Form::password('new_password', ['placeholder'=>'Enter new password', 'class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    {{ Form::password('confirm_password', ['placeholder'=>'Confirm new password', 'class'=>'form-control']) }}
                </div>
                <div class="form-group clearfix">
                    {{ Form::submit('Submit', ['class'=>'btn btn-primary pull-right']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
