<?php
/**
 * Index Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BR
 */
get_header(); ?>

<div class="container" id="blog">
	<div class="row">
		<div class="col-md-7 ">
			<div id="searchresults">
				<h2>Suchergebnisse für <span class="searchterm"><?php echo esc_html( get_search_query( false ) ); ?></span><h2>
				<?php if (have_posts()) {
				while ( have_posts() ) : the_post();
					switch (get_post_type()) {
				    		case 'post': ?>
				    			<div class="search-result typepost">
				    				<div class="indicator">Artikel</div>
				    				<a href="<?php the_permalink(); ?>">
				    					<h3><?php the_title(); ?></h3>
				    				</a>
				    				<a href="<?php the_permalink(); ?>" class="read-more">Mehr lesen</a>
				    			</div>
				    			<?php break;
			    			case 'page': ?>
				    			<div class="search-result typepage">
				    				<div class="indicator">Seite</div>
				    				<a href="<?php the_permalink(); ?>">
				    					<h3><?php the_title(); ?></h3>
				    				</a>
				    				<a href="<?php the_permalink(); ?>" class="read-more">Mehr lesen</a>
				    			</div>
				    			<?php break;
							case 'project': ?>
				    			<div class="search-result typeproject">
				    				<div class="indicator">Projekt</div>
				    				<a href="<?php the_permalink(); ?>">
				    					<h3><?php the_title(); ?></h3>
				    				</a>
				    				<a href="<?php the_permalink(); ?>" class="read-more">Mehr lesen</a>
				    			</div>
				    			<?php break;
				    		case 'author': ?>
				    			<div class="search-result typepost">Author</div>
				    			<?php break;
				    		default:
				    			# code...
				    			break;
				    	}
				endwhile;
				wp_reset_query();
			} else { ?>
				<section class="single-text">
					<p >Für diesen Begriff konnten wir leider keine Ergebnisse finden.</p>
				</section>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-4 offset-md-1">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
