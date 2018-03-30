<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="turbolinks-cache-control" content="no-cache">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
	<script defer>
		WebFont.load({
			google: {
			families: ['Yantramanav:400,700', 'Lora:400,400i,700,700i']
			}
		});
	</script>
	<title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if(defined("WP_DEBUG") AND WP_DEBUG){ ?>
	<div id="breakpoints"></div>
<?php } ?>

<header>
	<div id="site-title-container">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div id="site-title">
						<div id="titles">
							<a href="<?php echo home_url(); ?>">
								<img class="avatar" src="<?php echo BR\WordPress\helper\get_admin_avatar_url(); ?>">
							</a>
							<span class="sep"></span>
							<?php get_template_part( 'templates/social', 'icons' ); ?>
						</div>
						<div id="mobile-toggle">
							<div class="burger">
								<span></span>
							</div>
						</div>
						<div id="main-nav" class="">
							<?php wp_nav_menu(array(
								    'theme_location' => 'main_nav'
								) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<main>

