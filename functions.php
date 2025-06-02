<?php
function gereja_theme_enqueue_assets()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
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

function gereja_customize_hero($wp_customize)
{
    // Section Hero
    $wp_customize->add_section('hero_section', [
        'title' => __('Hero Section', 'gereja-tema'),
        'priority' => 30,
    ]);

    // Hero Title
    $wp_customize->add_setting('hero_title', [
        'default' => 'Selamat Datang di Gereja Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_title', [
        'label' => __('Judul Utama', 'gereja-tema'),
        'section' => 'hero_section',
        'type' => 'text',
    ]);

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', [
        'default' => 'Menjadi Terang di Dunia, Menyebarkan Kasih',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_subtitle', [
        'label' => __('Subjudul / Kutipan', 'gereja-tema'),
        'section' => 'hero_section',
        'type' => 'text',
    ]);

    // Hero Button Link
    $wp_customize->add_setting('hero_button_link', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('hero_button_link', [
        'label' => __('Halaman Tujuan Tombol', 'gereja-tema'),
        'section' => 'hero_section',
        'type' => 'dropdown-pages',
    ]);

    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', [
        'default' => 'Lihat Jadwal Ibadah',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_button_text', [
        'label' => __('Teks Tombol Hero', 'gereja-tema'),
        'section' => 'hero_section',
        'type' => 'text',
    ]);

    // Hero Background Image
    $wp_customize->add_setting('hero_bg_image', [
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image', [
        'label' => __('Gambar Latar Hero', 'gereja-tema'),
        'section' => 'hero_section',
        'settings' => 'hero_bg_image',
    ]));
    // Opsi tampilan logo atau judul
    $wp_customize->add_setting('navbar_brand_type', [
        'default' => 'title',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('navbar_brand_type', [
        'label' => __('Tipe Brand Navbar', 'gereja-tema'),
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => [
            'title' => 'Tampilkan Judul Situs',
            'logo'  => 'Tampilkan Logo Gambar',
        ],
    ]);

    // Upload logo custom
    $wp_customize->add_setting('navbar_logo_image', [
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'navbar_logo_image', [
        'label' => __('Logo Gambar Navbar', 'gereja-tema'),
        'section' => 'title_tagline',
        'settings' => 'navbar_logo_image',
    ]));
}
add_action('customize_register', 'gereja_customize_hero');
