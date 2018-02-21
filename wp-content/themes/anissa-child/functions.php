<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
function create_custom_case_studies(){
	$labels = array(
		'name' => 'Case Studies',
		'singular_name' => 'Study',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Case Study',
		'edit_item' => 'Edit Case Study',
		'new_item' => 'New Case Study',
		'view_item' => 'View Case Study',
		'search_items' => 'Search Case Study',
		'not_found' => 'No case studies found',
		'not_found_in_trash' => 'No case studies found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
		'label' => __('Case Studies'),
		'labels' => $studies, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-analytics', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "case_studies" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'case_studies', 'post_tag') // own categories
	);
		register_post_type("case_studies", $args); // used as internal identifier
}

add_action('init','create_custom_case_studies'); 