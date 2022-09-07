<!DOCTYPE>
<html lang="en">
	<head>
		<?php
			$sumatraGlobal = $GLOBALS['sumatra_global'];
			$baseURL = get_bloginfo('template_url');
			include( __DIR__ . '/inc/utils.php' );
			wp_head();
		?>

		<title><?php echo $post->post_title ?></title>
		<link rel="icon" href="<?php echo $baseURL ?>/dist/img/favicon.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	</head>

	<body class="antialiased font-body">
		<div id="overlay" class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-primary">
			<div class="logo text-white text-[50px]">SUMATRA</div>
		</div>
		<header id="header" class="sticky top-0 z-30 bg-white transition-shadow duration-300 backdrop-blur-md md:bg-white/90"
			<?php
				if(is_page_template('templates/home.php')) {
					echo ' data-type="home" ';
				}
			?>
			>
			<div class="container">
				<div class="flex flex-wrap items-center h-[80px] md:h-[100px]">
					<a class="block w-[140px]" href="<?php echo home_url() ?>">
						<?php get_template_part('parts/header', 'logo') ?>
					</a>

					<?php
						wp_nav_menu( array(
							'menu' => 'Primary',
							'container' => 'ul',
							'menu_class' => 'header-nav top-[80px] md:top-0'
						));
					?>

					<div class="block w-[26px] md:hidden ml-auto burger-menu cursor-pointer">
						<svg viewBox="0 0 26 20" xmlns="http://www.w3.org/2000/svg">
							<g fill="#000" fill-rule="nonzero">
								<g id="on">
									<path d="m5.222 19.192 16.97-16.97A1 1 0 1 0 20.778.808l-16.97 16.97a1 1 0 1 0 1.414 1.414Z"/>
									<path d="M20.778 19.192 3.808 2.222A1 1 0 1 1 5.222.808l16.97 16.97a1 1 0 1 1-1.414 1.414Z"/>
								</g>
								<g id="off">
									<path d="M25 4H1a1 1 0 1 1 0-2h24a1 1 0 0 1 0 2ZM25 11H1a1 1 0 1 1 0-2h24a1 1 0 0 1 0 2ZM25 18H1a1 1 0 0 1 0-2h24a1 1 0 0 1 0 2Z"/>
								</g>
							</g>
						</svg>
					</div>
        </div>
			</div>
		</header>
