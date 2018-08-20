<?php
/**
 * Projekte Archive Page
 */

get_header(); ?>
<div class="container mb-4">
	<section class="teaser-other content-section cs-style-4 teaser-wrapper humba">
		<div class="row">
			<div class="col-8 offset-2 mb-3 mt-3">
				<h1>Projekte</h1>
				<p class="wp-block-subhead">An diesen Projekten war ich mal mehr, mal weniger mit meiner Kernkompetenz als Frontend-Entwickler und PHP-Entwickler beteiligt.
					Alle Projekte sind in unserem Sonderprojekte Team entstanden.</p>
			</div>
		</div>
		<div class="row">
			<?php
				    $i = 1;
				    if(have_posts()) :
						while ( have_posts() ) : the_post();
							if ($i==1) {
								get_template_part( 'templates/teaser', 'project-first' );
							} else {
								get_template_part( 'templates/teaser', 'project' );
							}
							$i++;
					    endwhile;
					    wp_reset_postdata();
					else : ?>
						<div class="col-12">
							<p>Keine Projekte gefunden</p>
						</div>
					<?php endif; ?>
			</div>
	</section>
	<?php \BR\WordPress\helper\br_pagination(); ?>
</div>
<?php get_footer(); ?>
