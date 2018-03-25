<?php
/**
 * Single Template CPT Projekte
 *
 *
 * @package BR
 */

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
	 $terms = get_the_terms( get_the_id(), 'keyword' );
?>
<div class="container single-projekt">
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2 mt-3 mb-1">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<?php
				the_content();
			?>
			<div class="section-footer"><span class="icon-more_vert"></span></div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2 mb-4">
			<div class="specialties-wrapper">
				<div class="specialties">
					<?php foreach($terms as $term) : ?>
						<span class="badge-primary"><?php echo $term->name?></span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
