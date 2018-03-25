<div <?php post_class("col-12 col-md-6 fade-in one teaser-item mb-5"); ?>>
	<figure>
		<div>
			<?php if ( has_post_thumbnail() ) : ?>
					<a class="more" href="<?php the_permalink(); ?>">
						<img class="img-fluid post-image" src="<?php the_post_thumbnail_url('project-xl'); ?>"/>
					</a>
			<?php endif; ?>
		</div>
		<figcaption class="ml-5">
			<h2 class="title"><a class="more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="description">
				<?php the_excerpt(); ?>
			</div>
		</figcaption>
	</figure>
</div>
