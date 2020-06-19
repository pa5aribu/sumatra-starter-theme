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
		echo '<div class="card-list flex flex-wrap -mx-4">';
			foreach( $items as $index=>$item ) :

				$ID = $item->ID;
				$url = get_permalink( $item->ID );

				/** insights & news **/
				if( $args['post_type'] == 'post' ) :
					$post_type = $item->post_type;
				?>

				<div class="md:w-1/2 lg:w-1/3 px-4 mb-10">
					<div class="card">
						<a href="<?php echo $url ?>">
							<?php
								echo get_the_post_thumbnail( $item, 'post-thumbnail', array(
									'class' => 'w-full h-64 object-cover'
								));
							?>
						</a>
						<a href="<?php echo $url ?>" class="block mt-5">
							<div class="card-date text-gray-600 text-sm"><?php echo get_the_date() ?></div>
							<div class="card-title"><?php echo $item->post_title ?></div>
						</a>
					</div>
				</div>

				<?php endif;
				/** insights & news ends **/

			endforeach;
		echo '</div>';
		// list wrapper ends

	}
