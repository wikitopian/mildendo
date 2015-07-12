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
	<div data-role="page" 
		<section>

			<header>
				<?php get_header(); ?>
			</header>

			<div data-role="content" id="top">

				<div class="content-secondary">
					<aside>
						<?php get_sidebar(); ?>
					</aside>
				</div>

				<div class="content-primary">

					<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php get_template_part( 'content', get_post_format() ); ?>
						</article>

					<?php comments_template(); ?>

					<?php endwhile; else: ?>

						<h2>Not Found</h2>
						<p>Sorry, you seem to be looking for something that simply is not here.</p>

					<?php endif; ?>

					<div id="mildendo_nav">

						<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
						<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

					</div>

				</div> <!-- div class="content-primary" -->

				<div class="content-side-image">

					<?php do_action( 'mildendo_side_image' ); ?>

				</div>

			</div>

			<footer>
				<?php get_footer(); ?>
			</footer>

		</section>
	</div> <!-- data-role="page" -->
	<?php wp_footer(); ?>
</body>
</html>
