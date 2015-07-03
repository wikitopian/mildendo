<h2>
	<?php if( !is_single() ) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark">
	<?php } ?>
			<?php the_title(); ?>
	<?php if( !is_single() ) { ?>
		</a>
	<?php } ?>
</h2>
<?php the_content( 'Read more' ) ;?>
<?php //get_template_part( 'meta' ); ?>
