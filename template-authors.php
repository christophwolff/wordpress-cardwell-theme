<?php
/**
* Template Name: Author Archives
*/
get_header(); ?>
<div class="container" id="author-archive">
	<div class="row">
		<div class="col-12">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
	<section class="author-archive teaser-other">
	<div class="row">
	<?php  // Arguments to pass to get_users
		//Exclude the Admin User in listing
		$args = array( 'orderby' => 'display_name', 'order' => 'ASC', 'role' => 'editor');
		$authors = get_users( $args );
		foreach ( $authors as $author ) { ?>
			<div class="col-xs-6 col-md-4 col-lg-3 fade-in one teaser-item cs-style-4">
				<figure>
					<div>
						<?php $profile_picture = get_field('profile_picture', 'user_' . $author->ID); ?>
						<?php
							if(empty($profile_picture)):
								$profile_picture['sizes']['1-1-lg'] = get_template_directory_uri() . '/img/fallbackavatar.jpg';
								$profile_picture['title'] = 'Avatar Placeholder';
								$profile_picture['alt'] = 'Avatar Placeholder';
							endif;
						?>
						<img class="img-fluid" src="<?php echo $profile_picture['sizes']['1-1-lg']; ?>"  alt="<?php echo $profile_picture['alt']; ?>" title="<?php echo $profile_picture['title']; ?>"/>
					</div>
					<figcaption>
						<a class="more" href="<?php echo home_url(); ?>/autor/<?php echo $author->user_nicename;?>"><?php echo $author->user_firstname; ?> <?php echo $author->user_lastname; ?></a>
					</figcaption>
				</figure>
			</div>
		<?php }; ?>
		</div>
	</section>
</div>
<?php
	get_footer();
?>
