<?php if( !is_home() ) { ?>

	<div id="mildendo-header">
		<a href="<?php echo home_url(); ?>">
			<img
				src="<?php header_image(); ?>"
				alt="Site Logo" />
		</a>
	</div>

<?php } ?>

<?php dynamic_sidebar( 'opened' ); ?>

<?php dynamic_sidebar( 'closed' ); ?>
