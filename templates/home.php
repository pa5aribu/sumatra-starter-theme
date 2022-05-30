<?php

	// Template Name: Home

	$sumatraGlobal = $GLOBALS['sumatra_global'];
	get_header();

?>

<!-- home -->
<section id="home" class="py-16 bg-gray-300 md:py-24">
	<div class="container">
		<div class="flex flex-wrap items-center">
			<div class="mb-10 md:w-1/2 md:pr-8 lg:pr-16 md:mb-0">
				<div class="mb-4 font-bold text-45px">Some Long Title</div>
				<div class="mb-6 space-y-6">
					<p>Lorem Ipsum is simply dummy text of the <a href="#">some link</a> printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
				<div class="button" data-type="solid-primary">button</div>
			</div>
			<div class="md:w-1/2">
				<img src="<?php bloginfo('template_url') ?>/assets/img/illustration-home.png" alt="Home Illustration">
			</div>
		</div>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
