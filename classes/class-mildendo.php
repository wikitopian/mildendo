<?php

define( 'JQMVERSION', '1.4.5' );

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

		add_filter( 'mildendo_side_image_filter', array( &$this, 'do_side_image_filter' ) );

		add_action( 'mildendo_side_image', array( &$this, 'do_side_image' ) );

		add_filter( 'mildendo_dashboard_url', array( &$this, 'do_dashboard_url' ) );

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
			'id'            => 'opened',
			'name'          => 'Open Sidebar',
			'description'   => 'Expanded by default',
			'before_widget' => '<div class="mildendo-widget" id="mildendo-widget-opened" data-collapsed="false" data-role="collapsible">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		) );

		register_sidebar( array(
			'id'            => 'closed',
			'name'          => 'Closed Sidebar',
			'description'   => 'Collapsed by default',
			'before_widget' => '<div class="mildendo-widget" id="mildendo-widget-closed" data-collapsed="true" data-role="collapsible">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		) );

	}

	public function wp_enqueue_scripts() {

		wp_enqueue_script(
			'jquerymobile',
			'https://ajax.googleapis.com/ajax/libs/jquerymobile/'.JQMVERSION.'/jquery.mobile.min.js',
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
			'https://ajax.googleapis.com/ajax/libs/jquerymobile/'.JQMVERSION.'/jquery.mobile.min.css'
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
		else return $title;
	}

	public function do_side_image() {
		global $post;

		$image = get_header_image();

		//error_log( print_r( $post ) );

		if( !empty( $post ) && has_post_thumbnail() && ( is_single() || is_page() ) ) {
			$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		}

		$side_image = '<img src="' . $image .  '" />';

		echo apply_filters( 'mildendo_side_image_filter', $side_image );
	}

	public function do_side_image_filter( $side_image ) {

		return $side_image;
	}

	public function do_dashboard_url( $dashboard_url ) {

		return $dashboard_url;
	}

}
