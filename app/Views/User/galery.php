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

	<div class="container mb-5 pt-3 d-flex flex-wrap">

		<div class="row">
			<?php for ($i = 0; $i < 12; $i++) {
				# code...
			?>
				<div class="col-12 col-sm-12 col-md-6 col-xl-4 p-1 rounded">
					<a href="#0"><img class="rounded mx-auto d-block" src="https://picsum.photos/600/<?= $i * 100 ?>/?<?= $i ?>">
					</a>
				</div>
			<?php } ?>
		</div>
		<div class="text-over-image">
			<p class=" subname text-center sarif text-uppercase m-0">galery</p>
		</div>
	</div>

	<div class="container overflow-hidden py-6">
		<div class="grid-wrapper col">
		<?php for ($i = 0; $i < 12; $i++) {
				# code...
			?>
			<div class="lc-block">
				<img class="img-fluid rounded rounded" src="https://picsum.photos/600/<?= $i * 100 ?>/?<?= $i ?>" alt="" loading="lazy">
			</div>
			<?php } ?>
		</div>
	</div>

</section>