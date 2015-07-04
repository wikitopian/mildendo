<h2>
	<?php if( !is_single() ) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark">
	<?php } ?>
			<?php the_title(); ?>
	<?php if( !is_single() ) { ?>
		</a>
	<?php } ?>
</h2>

<div class="mildendo_gravatar">

<?php

$author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
$author_name = get_the_author();

echo "<a href='{$author_link}'>";

echo get_avatar( get_the_author_meta( 'email' ), '64', null, get_the_author() );
echo "<span>By: {$author_name}</span></a>";

?>

</div>

<?php

the_content( 'Read more...' );
get_template_part( 'meta' );

/* EOF */
