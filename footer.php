		<!-- footer -->
		<footer id="footer" class="py-12 md:py-20">
			<div class="container">
				<div class="flex flex-wrap justify-between">
					<div class="w-full mb-8 md:w-4/12 md:mb-0">
						<a class="inline-block w-[120px] mb-6" href="<?php echo home_url() ?>">
							<?php get_template_part('parts/header', 'logo') ?>
						</a>
						<p class="mb-8">Some description for this footer whatever man. I guess I need another line just to make this look better.</p>
						<?php get_template_part('parts/footer', 'socials') ?>
					</div>
					<div class="w-full md:w-1/2">
						<?php echo do_shortcode("[gravityforms id=1 title=false description=false ajax=true]") ?>
					</div>
				</div>
			</div>
		</footer>

		<section class="text-sm footer-copyright">
			<div class="container">
				<div class="py-6 border-t border-gray-200">
					<div class="flex-wrap items-center justify-between md:flex">
						<div class="mb-2 copyright md:mb-0">&copy; Sumatra Studio</div>
						<ul class="flex space-x-4 md:space-x-6">
							<li><a href="">Terms & Conditions</a></li>
							<li><a href="">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<?php wp_footer () ?>

	</body>
</html>

