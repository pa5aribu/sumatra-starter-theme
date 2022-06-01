<?php

	get_header();

	/** ARTICLES **/
	if( have_posts() ) :
		while( have_posts() ) : the_post(); ?>

<!-- post content-->
<section id="post">

	<div id="post-header" class="py-12 from-blue-500 to-purple-500 bg-gradient-to-r md:py-20 text-white">
		<div class="container">
			<div class="mx-auto md:w-8/12">
				<div class="mb-4 font-semibold lg:w-10/12 text-3xl md:text-5xl"><?php the_title() ?></div>
				<div class="text-14px"><?php the_date() ?></div>
			</div>
		</div>
	</div>

	<div id="post-content" class="py-16 md:py-20">
		<div class="container">
			<div class="mx-auto lg:w-8/12">
				<article class="space-y-6">
					<?php the_content(); ?>
				</article>
			</div>
		</div>
	</div>

</section>

		<?php endwhile;
	endif;
	/** ARTICLES ENDS **/

	get_footer();

?>
