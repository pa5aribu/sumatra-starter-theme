<!DOCTYPE>
<html lang="en">
	<!-- head-->
	<head>
		<?php
			$sumatraGlobal = $GLOBALS['sumatra_global'];
			$baseURL = get_bloginfo('template_url');

			include( __DIR__ . '/inc/utils.php' );
			wp_head();
		?>

		<title><?php echo $post->post_title ?></title>

		<link rel="icon" href="<?php echo $baseURL ?>/assets/img/favicon.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
	</head>

	<body>

		<!-- header -->
		<header class="sticky top-0 py-6 bg-white border-b border-gray-300">
			<div class="container">

				<div class="flex flex-wrap items-center justify-between">
					<a class="block h-10 logo" href="<?php echo home_url() ?>">
						<img class="h-full" src="<?php echo $baseURL ?>/assets/img/logo.svg"
							alt="<?php bloginfo('name') ?>">
					</a>

					<div class="flex items-center right-side">
						<ul class="flex items-center header-nav space-x-8">
							<?php
								$menu = wp_get_nav_menu_items('Primary', array());
								if($menu) {
									foreach( $menu as $item ) :
										$url = esc_url( get_permalink( get_page_by_title( $item->title ) ) );
										echo '<li><a href="'. $url .'">'. $item->title .'</a></li>';
									endforeach;
								}
							?>
							<li>
								<a class="button" href="">Login</a>
							</li>
						</ul>

						<div class="block burger-menu md:hidden">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div>
				</div>

				</div>
			</div>
		</header>
