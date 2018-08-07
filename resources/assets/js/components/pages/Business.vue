<template>
    <div class="business-page" v-if='business'>

        <div class="card text-center card-logo">
            <img src="/images/dummy-logo.svg" alt="" class="img-fluid">
            <h1 class="h4 mt-2 mb-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h1>
            <p class="subtitle">Founded on 14 February 2015<br>Joined August 2015</p>
        </div>

        <div class='card card-business-title'>
            <div class="ratings mt-1 text-center">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <br>
                <span class="subtitle"> 9,11,432 Ratings & 1,35,957 Review<br>
                <span class="icons icon-eye"></span> 2120 Views  <span class="icons icon-heart"></span> 68 Favorites</span>
            </div>
        </div>

        <div class="card phone-and-address mb-0">
            <div class="phone-card">
                <h4 class="h6"><span class='icons icon-phone'></span> {{ business.contacts.join() }}</h4>
            </div>

            <div class="address-card">
                <!-- <h4>How to reach</h4> -->
                <p><span class='icons icon-location-pin'></span> {{ business.address }}</p>
                <p><span class='icons icon-envelope'></span> contact@example.com</p>
                <p class='m-0'><span class='icons icon-globe'></span> www.example.com</p>
            </div>
        </div>

        <div class="slider" style="overflow: hidden">
            <img src="https://lorempixel.com/1024/480/business/?14686" alt="" class="img-fluid" style="width: 100%">
        </div>

        <div class="card px-5 about-card">
            <h4 class="my-2">About</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error at quasi tempore nostrum unde, consequuntur atque tempora. Deserunt commodi asperiores unde libero maxime dolores, labore, laudantium eum eos cumque voluptatem dicta ad beatae. Provident nam debitis laborum eveniet animi facere ea harum ad, odit quam.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur, accusantium, dicta saepe, blanditiis vero ea! Quidem eveniet deleniti nulla.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolore unde quaerat necessitatibus, aperiam saepe! Harum, distinctio ut cupiditate non impedit nemo, dolores accusamus quia voluptate et, accusantium explicabo aspernatur.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi cum voluptatibus sunt sit! Earum qui natus quasi dolorem rem esse possimus non fuga, saepe veritatis iure quae illo minus est numquam nobis ullam minima perferendis officia dolor? Soluta fugit nihil ea cum dolore, nulla, aliquam dignissimos at quae, delectus quos illo iste amet maxime! Vero voluptates quibusdam molestias aspernatur accusantium soluta laborum natus. In harum et earum nemo.</p>
        </div>

        <div class="card highlights-card">
            <h4>Highlights</h4>
            <ul class="pl-2">
                <li> - Lorem ipsum dolor sit amet consectetur.</li>
                <li> - Corporis similique aut mollitia aperiam nihil!</li>
                <li> - Voluptatem accusantium ut nisi repellat! Consequuntur!</li>
            </ul>
        </div>

        <div class="card social-links-card">
            <h4>Connect</h4>
            <a href="#!" title="Share page"><i class="fa fa-fw fa-twitter"></i></a>

            <a href="#!" title="Rate & review"><i class="fa fa-fw fa-facebook"></i></a>

            <a href="#!" title="Save for later"><i class="fa fa-fw fa-google-plus"></i></a>

            <a href="#!" title="Report"><i class="fa fa-fw fa-linkedin"></i></a>

            <a href="#!" title="Report"><i class="fa fa-fw fa-youtube"></i></a>
        </div>

        <div class="card businesspage-u-activity">
            <div class="grid-col-4">
                <div>
                    <a href="#!" title="Share page"><i class="fa fa-fw fa-2x fa-share-alt"></i> <br>Share</a>
                </div>
                <div>
                    <a href="#!" title="Rate & review"><i class="fa fa-fw fa-2x fa-star"></i>
                    <br>Review</a>

                </div>
                <div>
                    <a href="#!" title="Save for later"><i class="fa fa-fw fa-2x fa-bookmark-o"></i>
                    <br>Save</a>
                </div>
                <div>
                    <a href="#!" title="Report"><i class="fa fa-fw fa-2x fa-exclamation-triangle"></i>
                    <br>Report</a>
                </div>
            </div>
        </div>

        <div class="card px-5 service-offered">
            <h4 class="my-2">Services Offered</h4>
            <div class="-">
                <div>
                    <div class="mb-2">
                        <div class="card-thumb">
                            <img :src="business.image" class='img-fluid'>
                        </div>
                        <h2 class="h6 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h2>
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <div class="card-thumb">
                            <img :src="business.image" class='img-fluid'>
                        </div>
                        <h2 class="h6 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h2>
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <div class="card-thumb">
                            <img :src="business.image" class='img-fluid'>
                        </div>
                        <h2 class="h6 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h2>
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <div class="card-thumb">
                            <img :src="business.image" class='img-fluid'>
                        </div>
                        <h2 class="h6 card-title mt-1"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card px-5 faqs-card">
            <h4>Questions and Answers</h4>
            <div class="qa">
                <p class="que"> Q: Do you deals in car parts?</p>
                <p class="ans"> A: Yes.  Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur.</p>
            </div>
        </div>

    </div>
</template>

<script>
export default {
	name: 'business',
	mounted() {
		this.fetchBusiness();
	},
	data() {
		return {
			business: null
		}
	},
	methods: {
		fetchBusiness() {
			var businessId = this.$route.params.businessid
			axios.get('/spa/businesses/' + businessId).then(response => {
				this.business = response.data.data;
				document.title = this.business.title;
			});
		}
	}
}
</script>
