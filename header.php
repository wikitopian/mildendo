<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
</head>
<body <?php body_class(); ?>>
	<div data-role="page">

		<div data-role="header">
			<h1><?php wp_title(); ?></h1>
			<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-left">
				<a name="home" href="<?php echo home_url(); ?>" data-icon="home" data-role="button" >Home</a>
			</div>
			<div data-role="controlgroup" data-type="horizontal" data-mini="true" class="ui-btn-right">
				
				<a href="" data-icon="gear" data-role="button" >Dashboard</a>
				<?php if( is_user_logged_in() ) { ?>
					<a
						href="<?php echo wp_logout_url( get_permalink() ); ?>"
						data-icon="delete"
						data-role="button" >
						Log Out
					</a>
				<?php } ?>
				<a href="<?php echo home_url(); ?>/search" data-icon="search" data-role="button" >Search</a>

			</div>
		</div>
