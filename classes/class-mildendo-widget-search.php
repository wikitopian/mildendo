<?php

class Mildendo_Widget_Search extends WP_Widget {

	public function widget( $args, $instance ) {
		echo <<<HTML
<form id="searchform" class="searchform" method="get" action="/">
	<input type="search" name="s" id="search-mini" value="Search..." defaultValue="Search..." data-mini="true" />
</form>
HTML;
	}
}

?>
