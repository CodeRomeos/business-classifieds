<template>
    <div class="business-page pt-3" v-if='business'>
        <div class="">
            <div class="card mb-0">
                <h1 class="h1 my-2"><router-link :to="{ name: 'business', params: { businessid: business.businessid }}">{{ business.title }}</router-link></h1>
            </div>
            <div class="carsd">
                <img src="https://lorempixel.com/1024/550/business/?14686" alt="" class="img-fluid" style="width: 100%">
            </div>
            <div class="card">
                <h3 class="my-2">About</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error at quasi tempore nostrum unde, consequuntur atque tempora. Deserunt commodi asperiores unde libero maxime dolores, labore, laudantium eum eos cumque voluptatem dicta ad beatae. Provident nam debitis laborum eveniet animi facere ea harum ad, odit quam.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur, accusantium, dicta saepe, blanditiis vero ea! Quidem eveniet deleniti nulla.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolore unde quaerat necessitatibus, aperiam saepe! Harum, distinctio ut cupiditate non impedit nemo, dolores accusamus quia voluptate et, accusantium explicabo aspernatur.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi cum voluptatibus sunt sit! Earum qui natus quasi dolorem rem esse possimus non fuga, saepe veritatis iure quae illo minus est numquam nobis ullam minima perferendis officia dolor? Soluta fugit nihil ea cum dolore, nulla, aliquam dignissimos at quae, delectus quos illo iste amet maxime! Vero voluptates quibusdam molestias aspernatur accusantium soluta laborum natus. In harum et earum nemo.</p>
            </div>

            <div class="card">
                <h4>Questions and Answers</h4>
                <div class="qa">
                    <p class="que"> Q: Do you deals in car parts?</p>
                    <p class="ans"> A: Yes.  Soluta eaque ut nemo facere eius itaque praesentium consequuntur aspernatur.</p>
                </div>
            </div>
        </div>
        <div class="">
            <div class="card">
                <h4>How many people trust?</h4>
                <div class="ratings">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="subtitle text-right"> 9,11,432 Ratings & 1,35,957 Review</span>
                </div>
            </div>
            <div class="card">
                <h4>How to reach</h4>
                <p><span class='icons icon-phone'></span> {{ business.contacts.join() }}</p>
                <p><span class='icons icon-location-pin'></span> {{ business.address }}</p>
                <p><span class='icons icon-envelope'></span> contact@example.com</p>                
                <p><span class='fa fa-globe'></span> www.example.com</p>                
            </div>
            <div class="card">
                <h4>Highlights</h4>
                <ul class="pl-2">
                    <li> - Lorem ipsum dolor sit amet consectetur.</li>
                    <li> - Corporis similique aut mollitia aperiam nihil!</li>
                    <li> - Voluptatem accusantium ut nisi repellat! Consequuntur!</li>
                </ul>
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
			axios.get('/api/v1/businesses/' + businessId).then(response => {
				this.business = response.data.data;
				document.title = this.business.title;
			});
		}
	}
}
</script>
