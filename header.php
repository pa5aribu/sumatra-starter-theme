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

		<link rel="icon" href="<?php echo $baseURL ?>/dist/img/favicon.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
	</head>

	<body class="antialiased font-body">

		<div id="overlay" class="hidden">
			<?php get_template_part('template-parts/overlay') ?>
		</div>

		<!-- header -->
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
						<?php get_template_part('template-parts/header', 'logo') ?>
					</a>

					<?php
						wp_nav_menu( array(
							'menu' => 'Primary',
							'container' => 'ul',
							'menu_class' => 'header-nav top-[80px] md:top-0'
						));
					?>

					<div class="block w-[26px] md:hidden ml-auto burger-menu cursor-pointer">
						
<svg viewBox="0 0 26 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="burger-menu" transform="translate(0.000000, 0.100505)" fill="#000000" fill-rule="nonzero">
            <g id="on" transform="translate(3.100505, -0.000000)">
                <path d="M21.8994949,10.8994949 L-2.10050506,10.8994949 C-2.65278981,10.8994949 -3.10050506,10.4517797 -3.10050506,9.89949494 C-3.10050506,9.34721019 -2.65278981,8.89949494 -2.10050506,8.89949494 L21.8994949,8.89949494 C22.4517797,8.89949494 22.8994949,9.34721019 22.8994949,9.89949494 C22.8994949,10.4517797 22.4517797,10.8994949 21.8994949,10.8994949 Z" id="right" transform="translate(9.899495, 9.899495) scale(-1, 1) rotate(45.000000) translate(-9.899495, -9.899495) "></path>
                <path d="M21.8994949,10.8994949 L-2.10050506,10.8994949 C-2.65278981,10.8994949 -3.10050506,10.4517797 -3.10050506,9.89949494 C-3.10050506,9.34721019 -2.65278981,8.89949494 -2.10050506,8.89949494 L21.8994949,8.89949494 C22.4517797,8.89949494 22.8994949,9.34721019 22.8994949,9.89949494 C22.8994949,10.4517797 22.4517797,10.8994949 21.8994949,10.8994949 Z" id="left" transform="translate(9.899495, 9.899495) rotate(45.000000) translate(-9.899495, -9.899495) "></path>
            </g>
            <g id="off" transform="translate(0.000000, 1.899495)">
                <path d="M25,2 L1,2 C0.44771525,2 0,1.55228475 0,1 C0,0.44771525 0.44771525,0 1,0 L25,0 C25.5522847,0 26,0.44771525 26,1 C26,1.55228475 25.5522847,2 25,2 Z" id="top"></path>
                <path d="M25,9 L1,9 C0.44771525,9 0,8.55228475 0,8 C0,7.44771525 0.44771525,7 1,7 L25,7 C25.5522847,7 26,7.44771525 26,8 C26,8.55228475 25.5522847,9 25,9 Z" id="center"></path>
                <path d="M25,16 L1,16 C0.44771525,16 0,15.5522847 0,15 C0,14.4477153 0.44771525,14 1,14 L25,14 C25.5522847,14 26,14.4477153 26,15 C26,15.5522847 25.5522847,16 25,16 Z" id="bottom"></path>
            </g>
        </g>
    </g>
</svg>

					</div>
         		</div>
			</div>
		</header>
