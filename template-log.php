<?php
/**
 * Template Name: Log
 *
 *
 * @package BR
 */
get_header(); ?>
<div class="container mb-4">
	<section class="teaser-other content-section cs-style-4 teaser-wrapper humba">
		<div class="row">
			<div class="col-8 offset-2 mb-3 mt-3">
				<h1>Netzlog</h1>
				<p class="wp-block-subhead">
					Wenn ich an den Tagen Zeit finde, dokumentiere ich alles, was ich im Netz an Podcasts, Artikeln und anderen Medien konsumiere.
				</p>
			</div>
		</div>
		<div class="row">
			<?php
				$q = new WP_Query( array('post_type' => array( 'logs' ),'posts_per_page' => 15, 'paged'=>$paged, 'order' => 'DESC' ));

				if( $q->have_posts() ) {
				    while( $q->have_posts() ) {
				        $q->the_post();
				        $current_month = get_the_date('F');
				        if( $q->current_post === 0 ) {
				        	?>
				           		<div class="col-8 offset-2 mb-3 mt-3">
				           			<?php the_date( 'F Y' ); ?>
				           		</div>
				           <?php
				        } else {
				            $f = $q->current_post - 1;
				            $old_date = mysql2date( 'F', $q->posts[$f]->post_date );
				            if($current_month != $old_date) {
				                ?>
				           			<div class="col-8 offset-2 mb-3 mt-3">
				           				<?php the_date( 'F Y' ); ?>
				           			</div>
				           		<?php
				            }
				        }
				        get_template_part( 'templates/teaser', 'logs' );
				    }
				}
				wp_reset_query(); ?>

			</div>
	</section>
	<?php \BR\WordPress\helper\br_pagination(); ?>
</div>
<div class="container" id="blog">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="teaser-wrapper">

			</div>
			<?php \BR\WordPress\helper\br_pagination(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
