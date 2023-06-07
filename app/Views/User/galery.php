<link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css" media="all">
<style>
	/* Main CSS */
	.grid-wrapper>div {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.grid-wrapper>div>img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.grid-wrapper {
		display: grid;
		grid-gap: 10px;
		grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
		grid-auto-rows: 200px;
		grid-auto-flow: dense;
	}

	.grid-wrapper .wide {
		grid-column: span 2;
	}

	.grid-wrapper .tall {
		grid-row: span 2;
	}

	.grid-wrapper .big {
		grid-column: span 2;
		grid-row: span 2;
	}
</style>
<section id="galery">

		<!-- Gallery -->
	<div class="container mb-5 pt-3 d-flex flex-wrap">
		<div class="row">
			<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
				<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

				<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
			</div>

			<div class="col-lg-4 mb-4 mb-lg-0">
				<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

				<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
			</div>

			<div class="col-lg-4 mb-4 mb-lg-0">
				<img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

				<img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
			</div>
		</div>
		<div class="text-over-image">
			<p class=" subname text-center sarif text-uppercase m-0">galery</p>
		</div>
	</div>
	<!-- Gallery -->
</section>