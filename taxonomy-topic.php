<?php
/**
 * The template for displaying Thema Taxonomie
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
				<div class="col-12 col-md-8">
					<h2><?php the_archive_title(); ?><br>
						<small><?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?></small>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="tag-container">
						<a class="topic-tag" href="<?php echo get_site_url(); ?>/projekte">Alle Projekte</a>
						<?php 
						$terms = get_terms( array(
						    'taxonomy' => 'topic',
						    'hide_empty' => true,
						) );
						foreach ($terms as $term) {
							$is_current_cat = get_queried_object()->term_id == $term->term_id;
							?>
							<a class="topic-tag <?php if ($is_current_cat) echo 'current_tag' ?>" href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name ?></a>
						<?php }
		 				?>
					</div>	
				</div>
			</div>
			<div class="row">
			<?php
			/* Start the Loop */
			$i = 1;
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/teaser', 'project' );
				if ( $i % 2 === 0 ) { echo '</div><div class="row">'; };
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
