<?php
/**
 * Standard Index Template to show Posts
 *
 *
 * @package BR
 */
get_header(); ?>

<div class="container" id="blog">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="teaser-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/teaser', 'blog' ); ?>
					<hr class="wp-block-separator">
				<?php endwhile;
				wp_reset_query(); ?>
			</div>
			<?php \BR\WordPress\helper\br_pagination(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
