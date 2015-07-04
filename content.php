<span>
	<?php if( !is_single() ) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark">
	<?php } ?>
			<h2><?php the_title(); ?></h2>
	<?php if( !is_single() ) { ?>
		</a>
	<?php } ?>

<div class="mildendo_gravatar">

<?php

$author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
$author_name = get_the_author_meta( 'display_name' );

echo "<a href='{$author_link}'>";

echo get_avatar( get_the_author_meta( 'email' ), '64', null, get_the_author() );
echo "<span>By: {$author_name}</span></a>";

?>

</div>

</span>

<?php

the_content( 'Read more...' );
get_template_part( 'meta' );

/* EOF */
