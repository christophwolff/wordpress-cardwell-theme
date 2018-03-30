<?php
/**
 * Template Name: Homepage
 *
 *
 * @package BR
 */
get_header(); ?>

	<div class="container" id="blog">
		<div class="row">
			<div class="col-md-8 offset-md-2 mt-3">
				<div class="content">
					<!-- TITLE -->
					<h1 class="main-title">
						Ich bin Christoph,
						<br>
						<span id="typed"></span>
						<br>aus Bielefeld.
					</h1>
					<script type="text/javascript">
						var typed = new Typed('#typed', {
							strings: ['Entwickler', 'Designer', 'Kreativer', 'Vater', 'Blogger'],
							typeSpeed: 60,
							fadeOut: true,
							loop: true
						});

					</script>

					<!-- DESCRIPTION -->
					<p class="mb-4">Front-End Entwickler beim Bayerischen Rundfunk 🤘 </p>

					<div class="specialties-wrapper mt-4">
						<div class="specialties">
							<?php
						$terms = get_terms( array(
							'taxonomy' => 'keyword',
							'hide_empty' => true,
						) );
						foreach ($terms as $term) { ?>
							<a class="badge-primary" href="<?php echo get_category_link($term->term_id); ?>">
								<?php echo $term->name ?>
							</a>
						<?php }	?>
						<?php wp_reset_query(); ?>
						</div>
					</div>
					<?php 
						// the query
						$the_query = new WP_Query( array(
							'posts_per_page' => 2,
						)); 
					?>
					<?php if ( $the_query->have_posts() ) : ?>
					<div class="latest-posts-container">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="lastest-posts-item">
							<?php \BR\WordPress\helper\br_posted_on(); ?>
							<h4 class="heading">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php get_footer(); ?>
