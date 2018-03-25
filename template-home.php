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
                <br><span id="typed"></span>
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
							<a class="badge-primary" href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name ?></a>
						<?php }	?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
