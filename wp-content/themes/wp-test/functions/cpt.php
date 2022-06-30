<?php
/**
 * Creating a function to create our CPT
 * Custom post type / example gallery, plz change for your projects
 * If you not use CPT, commented this function
 */
function custom_post_type()
{
    // Projects (Gallery)
    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Courses', 'Post Type General Name', 'my-theme'),
        'singular_name' => _x('Course', 'Post Type Singular Name', 'my-theme'),
        'menu_name' => __('Courses', 'my-theme'),
        'parent_item_colon' => __('Course', 'my-theme'),
        'all_items' => __('All Courses', 'my-theme'),
        'view_item' => __('View Course', 'my-theme'),
        'add_new_item' => __('Add New Course', 'my-theme'),
        'add_new' => __('Add New', 'my-theme'),
        'edit_item' => __('Edit Course', 'my-theme'),
        'update_item' => __('Update Course', 'my-theme'),
        'search_items' => __('Search Course', 'my-theme'),
        'not_found' => __('Not Found', 'my-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'my-theme'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('Courses', 'my-theme'),
        'description' => __('Courses', 'my-theme'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-images-alt2',
        // Features this CPT supports in Post Editor
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type('courses', $args);

    register_taxonomy('course_type', array('courses'), array(
            'hierarchical' => true,
            'label' => 'Types',
            'singular_label' => 'Type',
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'course', 'with_front' => false)
        )
    );
    register_taxonomy_for_object_type('course_type', 'courses');

	register_taxonomy('course_campus', array('courses'), array(
			'hierarchical' => true,
			'label' => 'Campuses',
			'singular_label' => 'Campus',
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'course', 'with_front' => false)
		)
	);
	register_taxonomy_for_object_type('course_campus', 'courses');
};
add_action('init', 'custom_post_type', 0);