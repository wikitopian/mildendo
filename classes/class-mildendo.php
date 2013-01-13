<?php

class Mildendo {
	private $dir;

	public function __construct() {
		add_action( 'init', array( &$this, 'init' ) );
	}

	public function init() {
		$this->dir = get_template_directory_uri();

		add_filter('show_admin_bar', '__return_false');
		add_theme_support( 'post-thumbnails' );

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

		$custom_header_image = "{$this->dir}/images/mildendo-default.png";
		$custom_header = array(
			'default-image'          => $custom_header_image,
			'random-default'         => false,
			'width'                  => 600,
			'height'                 => 600,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '#000',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $custom_header );

		register_sidebar( array(
			'id'            => 'main',
			'name'          => 'Main Sidebar',
			'description'   => 'Main sidebar',
			'before_widget' => '<div class="mildendo-widget" data-role="collapsible-set"><div data-role="collapsible">',
			'after_widget'  => '</li></ul></div></div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2><ul data-role="listview"><li>'
		) );

		register_widget( 'Mildendo_Widget_Search' );

		register_nav_menus(
			array( 'footer-menu' => 'Footer Menu' )
		);

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
