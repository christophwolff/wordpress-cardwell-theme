<?php
/**
 * Page Template
 *
 *
 * @package CW
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 offset-2 mt-3">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2">
	        	<img class="img-fluid" src="<?php the_post_thumbnail_url('16-9-md'); ?>" />
		    </div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2">
				<?php
					the_content();
				?>
			</div>
		</div>
	</div>
<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>
