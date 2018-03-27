<?php
/**
 * Single Template Blog
 *
 *
 * @package BR
 */

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="container single-article mt-5">
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<?php \BR\WordPress\helper\br_posted_on(); ?>
			<h1 class="heading"><?php the_title(); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="alignwide post-image">
	        		<img class="img-fluid" src="<?php the_post_thumbnail_url('16-9-md'); ?>" />
	        	</div>
	        <?php endif; ?>
			<?php
				the_content();
			?>
		</div>
	</div>
</article>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, nichts gefunden.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
