<div id="mildendo-header">
    <a href="<?php echo home_url(); ?>">
    <img
        src="<?php header_image(); ?>"
        alt="Site Logo" />
    </a>
</div>


<?php dynamic_sidebar( 'main' ); ?>

<?php the_widget( 'Mildendo_Widget_Search' ); ?>
