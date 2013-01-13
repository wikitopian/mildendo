<?php

class Mildendo_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth ) {
		$output .= '';
	}

	function end_lvl( &$output, $depth ) {
		$output .= '';
	}

	function start_el( &$output, $item, $depth ) {
		$output  .= " <a href='{$item->url}' ";
		if( $item->attr_title ) {
			$output .= " data-icon='{$item->attr_title}' ";
		}
		$output .= " data-role='button' > ";
	}

	function end_el( &$output, $item, $depth ) {
		$output .= "{$item->title}</a>";
	}
}

