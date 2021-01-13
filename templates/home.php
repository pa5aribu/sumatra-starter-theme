<?php

	// Template Name: Homepage

	$sumatraGlobal = $GLOBALS['sumatra_global'];
	get_header();

?>

<!-- home -->
<section id="home" class="py-32 bg-gray-100">
	<div class="container">
		<div class="text-7xl">I'm HOME YO</div>
		<p><?php get_template_part('template-parts/home', 'component') ?></p>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
