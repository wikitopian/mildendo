<?php get_header(); ?>

<div data-role="content" id="top">

	<div class="content-secondary">
		<section id="sidebar">
			<div id="mildendo-header">
				<img
					src="<?php header_image(); ?>"
					alt="Site Logo" />
			</div>
			<?php get_sidebar(); ?>
		</section>
	</div>

	<div class="content-primary">
		<section id="content">

			<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
					$mildendo_full = wp_get_attachment_image_src(
						get_post_thumbnail_id( $post->ID ),
						'full'
					);
				?>
				<div
					id="featured"
					full="<?php echo $mildendo_full[0]; ?>"
					>
					<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
				</div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2>
						<?php if( is_single() ) { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark">
						<?php } ?>
								<?php the_title(); ?>
						<?php if( is_single() ) { ?>
							</a>
						<?php } ?>
					</h2>
					<?php the_content( 'Read more' ) ;?>
					<?php //get_template_part( 'meta' ); ?>
				</article>
				
			<?php //comments_template(); ?>

			<?php endwhile; else: ?>
				<h2>Not Found</h2>
				<p>Sorry, you seem to be looking for something that simply is not here.</p>
			<?php endif; ?>

			<?php //get_template_part( 'nav' ); ?>

		</section>
	</div> <!-- div class="content-primary" -->
</div>

<?php get_footer(); ?>
