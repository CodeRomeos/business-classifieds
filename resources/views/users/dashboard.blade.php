@extends('layouts.user')
@section('content')
<div class="card">
	<h2>Dashboard</h2>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card clearfix">
            <h4 class="title pull-left">Total Ads</h4>
            <h4 class="count pull-right"><span class="badge">42</span></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card clearfix">
            <h4 class="title pull-left">Active Ads</h4>
            <h4 class="count pull-right"><span class="badge">29</span></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card clearfix">
            <h4 class="title pull-left">Total Page View</h4>
            <h4 class="count pull-right"><span class="badge">55</span></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card clearfix">
            <h4 class="title pull-left">New Comments</h4>
            <h4 class="count pull-right"><span class="badge">5</span></h4>
        </div>
    </div>
</div>

@endsection
