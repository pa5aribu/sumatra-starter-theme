		<!-- footer -->
		<footer class="py-20">
			<div class="container">
				<div class="flex flex-wrap justify-between">
					<div class="w-full mb-8 md:w-4/12 md:mb-0">
						<a class="inline-block mb-6" href="<?php echo home_url() ?>">
							<?php get_template_part('template-parts/header', 'logo') ?>
						</a>
						<p class="mb-8">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
						when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<?php get_template_part('template-parts/footer', 'socials') ?>
					</div>
					<div class="w-full md:w-1/2">
						<?php echo do_shortcode("[gravityforms id=1 title=false description=false]") ?>
					</div>
				</div>
			</div>
		</footer>

		<section class="footer-copyright">
			<div class="container">
				<div class="py-6 border-t border-gray-200">
					<div class="flex flex-wrap items-center justify-between">
						<div class="copyright">&copy; Sumatra Studio</div>
						<ul class="flex space-x-6">
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

