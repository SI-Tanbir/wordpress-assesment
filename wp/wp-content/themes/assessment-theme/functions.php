<?php
// Theme setup
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'gallery', 'caption']);
});

// Enqueue styles/scripts
add_action('wp_enqueue_scripts', function () {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('assessment-style', get_stylesheet_uri(), [], $theme_version);
	// Swiper (for hero slider)
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11');
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);
	// Theme main JS
	wp_enqueue_script('assessment-main', get_template_directory_uri() . '/assets/js/main.js', ['swiper'], $theme_version, true);
});

// Register navigation menus
add_action('init', function () {
	register_nav_menus([
		'primary' => __('Primary Menu', 'assessment'),
		'footer' => __('Footer Menu', 'assessment'),
	]);
});

// Register Property custom post type
add_action('init', function () {
	$labels = [
		'name' => __('Properties', 'assessment'),
		'singular_name' => __('Property', 'assessment'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'properties'],
		'show_in_rest' => true,
	];
	register_post_type('property', $args);
});

// Register ACF fields programmatically if ACF is active
add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;
	acf_add_local_field_group([
		'key' => 'group_property_fields',
		'title' => 'Property Details',
		'fields' => [
			[
				'key' => 'field_property_price',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'number',
				'required' => 1,
				'min' => 0,
			],
			[
				'key' => 'field_property_location',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'required' => 1,
			],
			[
				'key' => 'field_property_gallery',
				'label' => 'Gallery',
				'name' => 'gallery',
				'type' => 'gallery',
				'required' => 0,
			],
		],
		'location' => [[[
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'property',
		]]],
	]);
});


