<?php
/**
 * The template for displaying archive pages
 *
 */
get_header();
?>
<div class="container archive">
 <?php 	if ( have_posts() ) : ?>
		<div class="row">
			<div class="col-12 col-md-8">
				<h2><?php the_archive_title(); ?><br>
					<small><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></small>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'templates/teaser', 'blog' );
				endwhile; ?>
				<?php \BR\WordPress\helper\br_pagination(); ?>
			</div>
			<div class="col-md-3 col-md-offset-1">
			<?php get_sidebar(); ?>
		</div>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
