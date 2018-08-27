<template>
    <div class="business-page pt-3" v-if='business'>

        <!-- Business Logo -->
        <div class="card text-center card-logo">
            <img src="/images/dummy-logo.svg" alt="" class="img-fluid">
        </div>

        <!-- Business title -->
        <div class="card card-business-title">
            <h1 class="h4 mt-2 mb-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h1>
            <p class="subtitle">Founded on 14 February 2015</p>

            <div class="ratings mt-1">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="subtitle text-right"> 9,11,432 Ratings & 1,35,957 Review</span>
            </div>
        </div>

        <!-- Address and contact info -->
        <div class="card phone-and-address mb-0">
            <div class="phone-card grid-col-2">
                <span class='icons icon-phone'></span> <div><strong> {{ business.contacts.join() }}</strong></div>
            </div>

            <div class="address-card grid-col-2">
                <!-- <h4>How to reach</h4> -->
                <span class='icons icon-location-pin'></span><p> {{ business.address }}</p>
                <span class='icons icon-envelope'></span><p> contact@example.com</p>
                <span class='icons icon-globe'></span><p> www.example.com</p>
            </div>

            <div class="social-links-card">
                <a href="#!" title="Share page"><i class="fa fa-fw fa-twitter"></i></a>

                <a href="#!" title="Rate & review"><i class="fa fa-fw fa-facebook"></i></a>

                <a href="#!" title="Save for later"><i class="fa fa-fw fa-google-plus"></i></a>

                <a href="#!" title="Report"><i class="fa fa-fw fa-linkedin"></i></a>

                <a href="#!" title="Report"><i class="fa fa-fw fa-youtube"></i></a>
            </div>
        </div>

        <!-- Page banner -->
        <div class="business-page-banner" style="overflow: hidden; background-image: url(https://lorempixel.com/1028/480/business/?14686); background-size: cover">
            <!-- <img src="https://lorempixel.com/1028/480/business/?14686" alt="" class="img-fluid" style="width: 100%"> -->
        </div>

        <!-- Page desicription -->
        <div class="card about-card">
            <h3 class="my-2">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error at quasi tempore nostrum unde, consequuntur atque tempora. Deserunt commodi asperiores unde libero maxime dolores, labore, laudantium eum eos cumque voluptatem dicta ad beatae. Provident nam debitis laborum eveniet animi facere ea harum ad, odit quam.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur, accusantium, dicta saepe, blanditiis vero ea! Quidem eveniet deleniti nulla.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolore unde quaerat necessitatibus, aperiam saepe! Harum, distinctio ut cupiditate non impedit nemo, dolores accusamus quia voluptate et, accusantium explicabo aspernatur.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi cum voluptatibus sunt sit! Earum qui natus quasi dolorem rem esse possimus non fuga, saepe veritatis iure quae illo minus est numquam nobis ullam minima perferendis officia dolor? Soluta fugit nihil ea cum dolore, nulla, aliquam dignissimos at quae, delectus quos illo iste amet maxime! Vero voluptates quibusdam molestias aspernatur accusantium soluta laborum natus. In harum et earum nemo.</p>
        </div>

        <!-- User action (Share, report etc.) -->
        <div class="card businesspage-u-activity">
            <div class="grid-col-4 text-center">
                <div>
                    <a href="#!" title="Share page"><i class="fa fa-fw fa-share-alt"></i></a><br>
                    Share
                </div>
                <div>
                    <a href="#!" title="Rate & review"><i class="fa fa-fw fa-star"></i></a><br>
                    Review
                </div>
                <div>
                    <bookmark-button :post="business" />
                    Save
                </div>
                <div>
                    <a href="#!" title="Report"><i class="fa fa-fw fa-exclamation-triangle"></i></a><br>
                    Report
                </div>
            </div>
        </div>

        <!-- Services highlights -->
        <div class="card highlights-card">
            <h4>Highlights</h4>
            <ul class="pl-2">
                <li> - Lorem ipsum dolor sit amet consectetur.</li>
                <li> - Corporis similique aut mollitia aperiam nihil!</li>
                <li> - Voluptatem accusantium ut nisi repellat! Consequuntur!</li>
            </ul>

        </div>

        <!-- Services offered -->
        <div class="card service-offered">
            <h3 class="my-2">Services Offered</h3>
            <div class="">
                <div v-for="index in 4" :key="index">
                    <div class="mb-2">
                        <div class="card-thumb">
                            <img :src="business.image" class='img-fluid'>
                        </div>
                        <h2 class="h6 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-col-2 reviews-and-faqs">
            <!-- Rate & reviews -->
            <div class="card rate-and-review-card">
                <h4>Ratings and Reviews</h4>
                <div class="qa">
                    <div class="ratings mt-1">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="subtitle">By John Doe on Jan 15, 2018</span>
                    </div>
                    <p class="isBold">One of the best service provider with domain expertise.</p>
                    <p class="ans">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam beatae quibusdam deleniti quod, rerum ratione quis facilis quam accusantium, magni corrupti laudantium odit dolore eum temporibus a sequi sed nihil. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio at corporis omnis quod quos vel quia fugiat odit. </p>
                    <div class="ratings mt-1">
                        <a href="" class="fa fa-thums-up">
                            <span class="icons icon-like"></span>
                        </a>
                        <a href="" class="fa fa-thums-up">
                            <span class="icons icon-dislike"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Rate & reviews -->

            <!-- FAQs -->
            <div class="card faqs-card">
                <h4>Questions and Answers</h4>
                <div class="qa">
                    <p class="isBold"> Q: Do you deals in car parts?</p>
                    <p class="ans"> A: Yes.  Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur.</p>
                </div>
            </div>
            <!-- FAQs -->
        </div>


    </div>
</template>

<script>
import BookmarkButton from '../partials/BookmarkButton.vue';
export default {
	name: 'business',
	mounted() {
		this.fetchBusiness();
	},
    components: {
        BookmarkButton
    },
	data() {
		return {
			business: null
		}
	},
	methods: {
		fetchBusiness() {
			var businessId = this.$route.params.businessid
			axios.get('/api/v1/businesses/' + businessId).then(response => {
				this.business = response.data.data;
				document.title = this.business.title;
			});
		}
	}
}
</script>
