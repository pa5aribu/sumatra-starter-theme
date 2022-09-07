<?php

	// Template Name: Home

	$sumatraGlobal = $GLOBALS['sumatra_global'];
	get_header();

?>

<section id="home" class="py-12 text-white md:py-20 from-blue-500 to-purple-500 bg-gradient-to-r">
	<div class="container">
		<div class="flex flex-wrap items-center">
			<div class="mb-10 md:w-1/2 md:pr-8 lg:pr-16 md:mb-0">
				<div data-aos="fade-up" class="text-4xl font-bold mb-7 font-display">Sumatra Starter Theme</div>
				<div data-aos="fade-up" class="mb-8 leading-relaxed space-y-6">
					<p>
						Sumatra Starter Theme is a WordPress starter theme created by balapa. This theme uses
						<a class="text-white underline" href="https://tailwindcss.com/">TailwindCSS</a> to build UI easily and 
						<a class="text-white underline" href="https://browsersync.io/">Browsersync</a> to reload the pages when you make changes.
						 
					</p>
				</div>
				<div data-aos="fade-up" class="button-wrapper">
					<a href="#" class="button bg-[transparent] border border-white hover:bg-white hover:text-primary">Button</a>
				</div>
			</div>
			<div class="md:w-1/2">
				<img data-aos="fade-up" src="<?php bloginfo('template_url') ?>/dist/img/illustration-home.png" alt="Home Illustration">
			</div>
		</div>
	</div>
</section>

<section class="py-12 bg-gray-200 md:py-24">
	<div class="container">
		<div data-aos="fade-up" class="mb-8 text-3xl font-semibold font-display">Article</div>
		<?php
			render_posts(array(
				'post_type' => 'post',
				'posts_length' => '3'
			));
		?>
	</div>
</section>

<?php get_footer(); ?>
