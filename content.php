<?php

if( !is_page() ) {

	echo '<div class="mildendo_gravatar">';

	$author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$author_name = get_the_author_meta( 'display_name' );

	echo "<a href='{$author_link}'>";

	echo get_avatar( get_the_author_meta( 'email' ), '64', null, get_the_author() );
	echo "</a>";

	echo '</div>';

}

?>


<span>
	<?php if( !is_single() && !is_page() ) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark">
	<?php } ?>
			<h2><?php the_title(); ?></h2>
	<?php if( !is_single() && !is_page() ) { ?>
		</a>
	<?php } ?>
</span>

<?php

if( !is_page() ) {

	echo "<span><a href='{$author_link}'>";

	echo "By: {$author_name}</a> (";

	echo comments_number( 'No responses, yet.', 'One response.', '% responses.' );

	echo ")</span>";

}

?>
<hr />
<?php
the_content( 'Read more...' );
get_template_part( 'meta' );
?>
