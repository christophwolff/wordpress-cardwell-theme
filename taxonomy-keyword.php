<?php
/**
 * The template for displaying Tag Taxonomie
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medienexperten
 */

get_header(); ?>
<section class="teaser-other cs-style-4">
	<div class="container">
		<?php
		if ( have_posts() ) : ?>
			<div class="row">
				<div class="col-12 col-md-8 offset-md-2 mt-3">
					<h1><?php echo get_the_archive_title(''); ?><br>
					</h1>
					<?php the_archive_description( '<div class="wp-block-subhead mb-5">', '</div>' ); ?>
				</div>
			</div>
			<div class="row">
			<?php
			/* Start the Loop */
			$i = 1;
			while ( have_posts() ) : the_post();
				if ($i==1) {
					get_template_part( 'templates/teaser', 'project-first' );
				} else {
					get_template_part( 'templates/teaser', 'project' );
				}
				$i++;
			endwhile;
			wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col-12">
			<?php \BR\WordPress\helper\br_pagination(); ?>
		</div>
	</div>
</div>
<?php
get_footer();
?>
