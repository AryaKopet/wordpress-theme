<?php
function gereja_theme_enqueue_assets()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'gereja_theme_enqueue_assets');

// Register menu navigasi
function gereja_register_menu()
{
    register_nav_menus([
        'primary' => __('Menu Utama', 'gereja-tema')
    ]);
}
add_action('after_setup_theme', 'gereja_register_menu');
