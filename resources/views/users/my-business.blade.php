@extends('layouts.user')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="card">My Business Page</h1>

		<div class="card">
			<div class="businessBanner">
				<img src="{{ asset("/images/businessBanner.png") }}" alt="" class="img-responsive">

				<div class="businessTitle f20">
					<div class="col-md-8">Umbrella Corp.</div>
					<div class="ratings">
						<div class="col-md-4">
							<span class="hidden-xs">Rating</span>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="card">
			<div class="businessAbout">
				<h3>About</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error at quasi tempore nostrum unde, consequuntur atque tempora. Deserunt commodi asperiores unde libero maxime dolores, labore, laudantium eum eos cumque voluptatem dicta ad beatae. Provident nam debitis laborum eveniet animi facere ea harum ad, odit quam.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur, accusantium, dicta saepe, blanditiis vero ea! Quidem eveniet deleniti nulla.</p>
			</div>

			<hr>
			<div class="businessAdderess">
				<h3>Address</h3>
				<p>Lorem ipsum dolor sit amet.</p>
			</div>
			<hr>
			<div class="businessOfferings">
				<h3>Servies/Offerings</h3>
				<div id="main_area">
					<div class="row">
			            <div class="col-sm-6" id="slider-thumbs">
			                <!-- Bottom switcher of slider -->
			                <ul class="hide-bullets">
			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-0">
			                            <img src="http://placehold.it/150x150&text=zero">
			                        </a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/150x150&text=1"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/150x150&text=2"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/150x150&text=3"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-4"><img src="http://placehold.it/150x150&text=4"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-5"><img src="http://placehold.it/150x150&text=5"></a>
			                    </li>
			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-6"><img src="http://placehold.it/150x150&text=6"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-7"><img src="http://placehold.it/150x150&text=7"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-8"><img src="http://placehold.it/150x150&text=8"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-9"><img src="http://placehold.it/150x150&text=9"></a>
			                    </li>
			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-10"><img src="http://placehold.it/150x150&text=10"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-11"><img src="http://placehold.it/150x150&text=11"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-12"><img src="http://placehold.it/150x150&text=12"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-13"><img src="http://placehold.it/150x150&text=13"></a>
			                    </li>
			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-14"><img src="http://placehold.it/150x150&text=14"></a>
			                    </li>

			                    <li class="col-sm-3">
			                        <a class="thumbnail" id="carousel-selector-15"><img src="http://placehold.it/150x150&text=15"></a>
			                    </li>
			                </ul>
			            </div>
			            <div class="col-sm-6">
			                <div class="col-xs-12" id="slider">
			                    <!-- Top part of the slider -->
			                    <div class="row">
			                        <div class="col-sm-12" id="carousel-bounding-box">
			                            <div class="carousel slide" id="myCarousel">
			                                <!-- Carousel items -->
			                                <div class="carousel-inner">
			                                    <div class="active item" data-slide-number="0">
			                                        <img src="http://placehold.it/470x480&text=zero"></div>

			                                    <div class="item" data-slide-number="1">
			                                        <img src="http://placehold.it/470x480&text=1"></div>

			                                    <div class="item" data-slide-number="2">
			                                        <img src="http://placehold.it/470x480&text=2"></div>

			                                    <div class="item" data-slide-number="3">
			                                        <img src="http://placehold.it/470x480&text=3"></div>

			                                    <div class="item" data-slide-number="4">
			                                        <img src="http://placehold.it/470x480&text=4"></div>

			                                    <div class="item" data-slide-number="5">
			                                        <img src="http://placehold.it/470x480&text=5"></div>

			                                    <div class="item" data-slide-number="6">
			                                        <img src="http://placehold.it/470x480&text=6"></div>

			                                    <div class="item" data-slide-number="7">
			                                        <img src="http://placehold.it/470x480&text=7"></div>

			                                    <div class="item" data-slide-number="8">
			                                        <img src="http://placehold.it/470x480&text=8"></div>

			                                    <div class="item" data-slide-number="9">
			                                        <img src="http://placehold.it/470x480&text=9"></div>

			                                    <div class="item" data-slide-number="10">
			                                        <img src="http://placehold.it/470x480&text=10"></div>

			                                    <div class="item" data-slide-number="11">
			                                        <img src="http://placehold.it/470x480&text=11"></div>

			                                    <div class="item" data-slide-number="12">
			                                        <img src="http://placehold.it/470x480&text=12"></div>

			                                    <div class="item" data-slide-number="13">
			                                        <img src="http://placehold.it/470x480&text=13"></div>

			                                    <div class="item" data-slide-number="14">
			                                        <img src="http://placehold.it/470x480&text=14"></div>

			                                    <div class="item" data-slide-number="15">
			                                        <img src="http://placehold.it/470x480&text=15"></div>
			                                </div>
			                                <!-- Carousel nav -->
			                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			                                    <span class="glyphicon glyphicon-chevron-left"></span>
			                                </a>
			                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			                                    <span class="glyphicon glyphicon-chevron-right"></span>
			                                </a>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            <!--/Slider-->
			        </div>
				</div>
			</div>

			<hr>
			<div class="ratingReview clearfix">
				<h3>Rating and Reviews</h3>
				<div class="ratings col-md-6">
					Total Rating
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<div class="reviews col-md-6">
					Total Reviews <span class="label label-primary">35</span> <a href="#reviews" class="btn btn-xs btn-danger">View All Reviews</a>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="businessReviews" id="reviews">
				<div class="panel panel-default">
					<div class="panel-heading">Lorem ipsum dolor sit amet.</div>
					<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint officiis vero nam illo praesentium quasi temporibus facere labore cum sapiente maiores, quia distinctio! Tempora, consectetur!</div>
					<div class="panel-footer">Submitted by <strong>Satay</strong> |  1 day ago</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Lorem ipsum dolor sit amet.</div>
					<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint officiis vero nam illo praesentium quasi temporibus facere labore cum sapiente maiores, quia distinctio! Tempora, consectetur!</div>
					<div class="panel-footer">Submitted by <strong>Satay</strong> |  1 day ago</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Lorem ipsum dolor sit amet.</div>
					<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint officiis vero nam illo praesentium quasi temporibus facere labore cum sapiente maiores, quia distinctio! Tempora, consectetur!</div>
					<div class="panel-footer">Submitted by <strong>Satay</strong> |  1 day ago</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Lorem ipsum dolor sit amet.</div>
					<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint officiis vero nam illo praesentium quasi temporibus facere labore cum sapiente maiores, quia distinctio! Tempora, consectetur!</div>
					<div class="panel-footer">Submitted by <strong>Satay</strong> |  1 day ago</div>
				</div>
				<div class="moreReviews text-center">
					<ul class="pagination">
						<li><a href="#">1</a></li>
						<li class="active"><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection