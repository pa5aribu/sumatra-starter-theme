<!DOCTYPE>
<html lang="en">
	<!-- head-->
	<head>
		<?php
			$sumatraGlobal = $GLOBALS['sumatra_global'];
			$baseURL = get_bloginfo('template_url');

			include( __DIR__ . '/includes/utils.php' );
			wp_head();
		?>

		<title><?php echo $post->post_title ?></title>

		<link rel="icon" href="<?php echo $baseURL ?>/img/favicon.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
	</head>

	<body>

		<!-- header -->
		<header class="bg-red">
			<div class="container">

					<a class="logo block h-10 block" href="<?php echo home_url() ?>">
						<img class="h-full" src="<?php echo $baseURL ?>/img/logo.svg"
							alt="<?php bloginfo('name') ?>">
					</a>

					<ul class="header-nav flex items-center space-x-8">
						<?php
							$menu = wp_get_nav_menu_items('Primary', array());
							foreach( $menu as $item ) :
								$url = esc_url( get_permalink( get_page_by_title( $item->title ) ) );
								echo '<li><a href="'. $url .'">'. $item->title .'</a></li>';
							endforeach;
						?>
						<li>
							<a class="button" href="">Login</a>
						</li>
					</ul>

					<div class="burger-menu">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>

				</div>
			</div>
		</header>
