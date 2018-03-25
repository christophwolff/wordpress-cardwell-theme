<div <?php post_class("col-12 col-lg-8 fade-in one teaser-item-first mb-3"); ?>>
	<figure>
		<div>
			<?php if ( has_post_thumbnail() ) : ?>
					<a class="more" href="<?php the_permalink(); ?>"><img class="img-fluid post-image" src="<?php the_post_thumbnail_url('full'); ?>"/></a>
			<?php endif; ?>
		</div>
		<figcaption>
			<?php
				the_post_thumbnail_caption(get_the_ID());
			?>
		</figcaption>
	</figure>
</div>
<div <?php post_class("col-12 col-lg-4 fade-in one teaser-item-first-sidebar fist mb-3 mt-5"); ?>>
	<figure>
		<figcaption>
			<h2 class="title"><a class="more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="description">
				<?php the_excerpt(); ?>
			</div>
			<div class="specialties-wrapper">
				<div class="specialties">
					<?php
					$terms = get_the_terms($post->ID, 'keyword');
					foreach ($terms as $term) { ?>
						<a class="badge-primary" href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name ?></a>
					<?php }
					?>
				</div>
			</div>
		</figcaption>
	</figure>
</div>
