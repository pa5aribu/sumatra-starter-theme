<?php

	// Template Name: Contact

	get_header();

?>

<!-- home -->
<section id="contact">
	<div class="container">
		<?php
			echo do_shortcode('[gravityforms id="1" title="false" description="false"]');
		?>
	</div>
</section>
<!-- home ends -->

<?php get_footer(); ?>
