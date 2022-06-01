<?php

	// render posts
	function render_posts( $args ) {

		$items = get_posts(array(
			'post_type' => $args['post_type'],
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => $args['posts_length']
		));

		// list wrapper
		echo '<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">';
			foreach( $items as $index=>$item ) :

				$ID = $item->ID;
				$url = get_permalink( $item->ID );

				// post
				if( $args['post_type'] == 'post' ) :
					$post_type = $item->post_type;
				?>

					<div data-aos="fade-up" class="card shadow-md bg-white">
						<a href="<?php echo $url ?>">
							<?php
								echo get_the_post_thumbnail( $item, 'medium' , array(
									'class' => 'w-full aspect-[4/2.5] object-cover'
								));
							?>
						</a>
						<a href="<?php echo $url ?>" class="block p-8">
							<div class="text-gray-500 mb-2 text-sm"><?php echo get_the_date() ?></div>
							<div class="text-lg"><?php echo $item->post_title ?></div>
						</a>
					</div>

				<?php endif;

			endforeach;
		echo '</div>';

	}
