<?php
/**
 * Theme Author File
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BR
 */
?>

<?php get_header(); ?>

<section id="single-author">
	<div class="container">

		<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		?>

		<div class="row">
			<div class="col-12 col-md-9 col-lg-8">
				<h2><?php echo $curauth->user_firstname; echo ' '; echo $curauth->user_lastname; ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4 col-lg-3 col-md-push-8 col-lg-push-8">
				<div class="author-picture">
					<?php $profile_picture = get_field('profile_picture', 'user_' . $curauth->ID); ?>
					<picture>
					   <source srcset="<?php echo $profile_picture['sizes']['1-1-xl']; ?>" media="(min-width: 1200px)">
					   <source srcset="<?php echo $profile_picture['sizes']['1-1-lg']; ?>" media="(min-width: 768px)">
					   <img class="img-fluid" srcset="<?php echo $profile_picture['sizes']['1-1-xs']; ?>" alt="<?php echo $profile_picture['alt']; ?>" title="<?php echo $profile_picture['title']; ?>">
					</picture>
				</div>
				<div class="author-posts hidden-sm-down">
					<div class="profile-legend">Artikel</div>
					<ul class="posts">
					<?php $count=0; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
							<span class="post-title"><?php the_title(); ?></span></a><br>
							<?php the_time('d.m.Y'); ?>
						</li>
					<?php $count++;
					if( $count > 4 ) break; ?>
					<?php endwhile; else: ?>
						<p><?php _e('Keine Artikel des Nutzers vorhanden.'); ?></p>
					<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-8 col-lg-7 col-md-pull-4 col-lg-pull-3 profile">
				<ul>
					<li>
						<div class="profile-legend">Kurzprofil</div>
						<div class="profile-text"><p><?php echo $curauth->user_description; ?></p></div>
					</li>
					<li>
						<div class="profile-legend">Langbeschreibung</div>
						<?php $profile_description = get_field('profile_longdescription', 'user_' . $curauth->ID); ?>
						<div class="profile-text"><?php echo $profile_description; ?></div>
					</li>
				</ul>
			</div>
		</div>

		<section class="teaser-other content-section cs-style-4">
			<div class="row">
				<?php $wp_query = new WP_Query(array(
						'post_type' => 'project',
						'ignore_sticky_posts' => 1,
						'author' => $curauth->ID
						));
						$i = 1;
						if ($wp_query->have_posts()) : ?>
							  <div class="col-12 col-md-7">
								<h2>Projekte von <?php echo $curauth->user_firstname; echo ' '; echo $curauth->user_lastname; ?></h2>
							</div>
					   <?php endif; ?>

					   <?php while ($wp_query->have_posts()) : $wp_query->the_post();
						  get_template_part( 'templates/teaser', 'project' );
							if ( $i % 2 === 0 ) { echo '</div><div class="row">'; };
							$i++;
						endwhile;
						wp_reset_postdata();
						?>

			</div>
		</section>
	</div>
</section>
<?php get_footer(); ?>
