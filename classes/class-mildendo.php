<?php

class Mildendo {
	private $dir;

	public function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
	}

	public function init() {
		$this->dir = get_template_directory_uri();

		add_filter('show_admin_bar', '__return_false');

		add_action(
			'wp_enqueue_scripts',
			array( &$this, 'wp_enqueue_scripts' )
		);

		// [Nacin said so](http://tinyurl.com/a3gwl6r)
		add_action(
			'wp_enqueue_scripts',
			array( &$this, 'wp_print_styles' )
		);

		add_filter( 'wp_title', array( &$this, 'wp_title' ) );

	}

	public function wp_enqueue_scripts() {

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script(
			'jquerymobile',
			'http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js',
			array( 'jquery' )
		);

		wp_enqueue_script(
			'mildendo',
			"{$this->dir}/js/mildendo.js",
			array( 'jquery' )
		);
	}

	public function wp_print_styles() {

		wp_register_style(
			'jquerymobile',
			'http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css'
		);
		wp_enqueue_style( 'jquerymobile' );
	}

	public function wp_title( $title, $sep = null, $seplocation = null ) {
		// account for $seplocation
		$left_sep = ( $seplocation != 'right' ? ' ' . $sep . ' ' : '' );
		$right_sep = ( $seplocation != 'right' ? '' : ' ' . $sep . ' ' );

		// get special page type (if any)
		if( is_category() ) $page_type = $left_sep . 'Category' . $right_sep;
		elseif( is_tag() ) $page_type = $left_sep . 'Tag' . $right_sep;
		elseif( is_author() ) $page_type = $left_sep . 'Author' . $right_sep;
		elseif( is_archive() || is_date() ) $page_type = $left_sep . 'Archives'. $right_sep;
		else $page_type = '';

		// get the page number
		if( get_query_var( 'paged' ) ) $page_num = $left_sep. get_query_var( 'paged' ) . $right_sep; // on index
		elseif( get_query_var( 'page' ) ) $page_num = $left_sep . get_query_var( 'page' ) . $right_sep; // on single
		else $page_num = '';

		// concoct and return title
		if( !is_feed() ) return get_bloginfo( 'name' ) . $page_type . $title . $page_num;
		else return $old_title;
	}
}
