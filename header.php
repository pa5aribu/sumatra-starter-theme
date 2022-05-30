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

	<body class="antialiased">

		<div id="overlay" class="hidden">
			<?php get_template_part('template-parts/overlay') ?>
		</div>

		<!-- header -->
		<header id="header" class="sticky z-30 bg-white"
			<?php
				if(is_page_template('templates/home.php')) {
					echo ' data-type="home" ';
				}
			?>
			>
			<div class="container">

				<div class="flex flex-wrap items-center header-inner">
					<a class="block header-logo" href="<?php echo home_url() ?>">
						<?php get_template_part('template-parts/header', 'logo') ?>
					</a>

					<?php
						wp_nav_menu( array(
							'menu' => 'Primary',
							'container' => 'ul',
							'menu_class' => 'header-nav'
						));
					?>

					<div class="flex flex-wrap items-center ml-auto md:ml-0">
						<a class="header-button" data-type="solid-primary" href="<?php echo home_url() ?>/">Button</a>
						<div class="block ml-5 burger-menu md:hidden">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div>
         </div>

			</div>
		</header>
