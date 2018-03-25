<?php
/**
 * Theme Footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BR
 */

?>
	</main>
	<footer id="footer" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer-items">
						<?php get_template_part( 'templates/social', 'icons' ); ?>
					</div>
				</div>
	    	</div>
		</div>
	</footer><!-- #colophon -->
	<?php do_action('load_br_tracking_code_piwik'); ?>
	<?php wp_footer(); ?>
	</body>
</html>
