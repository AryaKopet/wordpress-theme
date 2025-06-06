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
add_action('after_setup_theme', function () {
    register_nav_menus([
        'primary' => __('Menu Utama', 'gereja-tema')
    ]);
});

// Fungsi untuk modifikasi tampilan hero
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

// Fungsi untuk konfigurasi theme
function gereja_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails'); // << tambahkan ini
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'gereja_theme_setup');

// Fungsi untuk modifikasi tampilan footer
function gereja_customize_footer($wp_customize)
{
    // Section Footer Sosmed
    $wp_customize->add_section('footer_social_section', [
        'title' => __('Footer Sosial Media', 'gereja-tema'),
        'priority' => 40,
    ]);

    // Facebook URL
    $wp_customize->add_setting('footer_facebook_link', [
        'default' => 'https://facebook.com/gerejakami',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('footer_facebook_link', [
        'label' => __('Link Facebook', 'gereja-tema'),
        'section' => 'footer_social_section',
        'type' => 'url',
    ]);

    // Instagram URL
    $wp_customize->add_setting('footer_instagram_link', [
        'default' => 'https://instagram.com/gerejakami',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('footer_instagram_link', [
        'label' => __('Link Instagram', 'gereja-tema'),
        'section' => 'footer_social_section',
        'type' => 'url',
    ]);

    // Email
    $wp_customize->add_setting('footer_email', [
        'default' => 'info@gerejakami.org',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('footer_email', [
        'label' => __('Alamat Email', 'gereja-tema'),
        'section' => 'footer_social_section',
        'type' => 'email',
    ]);
}
add_action('customize_register', 'gereja_customize_footer');

function add_home_link_to_menu($items, $args)
{
    if ($args->theme_location == 'primary') {
        $home_link = '<li class="menu-item"><a href="' . esc_url(home_url()) . '">Home</a></li>';
        $items = $home_link . $items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_home_link_to_menu', 10, 2);

//fungsi untuk modifikasi tampilan cta
function gereja_customize_cta($wp_customize)
{
    $wp_customize->add_section('cta_section', [
        'title'    => __('CTA Section (Front Page)', 'gereja-tema'),
        'priority' => 50,
    ]);

    // Judul
    $wp_customize->add_setting('cta_title', [
        'default' => 'Mari Bergabung dalam Keluarga Gereja Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_title', [
        'label'   => __('Judul CTA', 'gereja-tema'),
        'section' => 'cta_section',
        'type'    => 'text',
    ]);

    // Subjudul
    $wp_customize->add_setting('cta_subtitle', [
        'default' => 'Kami menyambut Anda dengan tangan terbuka dalam kasih Tuhan.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_subtitle', [
        'label'   => __('Subjudul CTA', 'gereja-tema'),
        'section' => 'cta_section',
        'type'    => 'text',
    ]);

    // Teks tombol
    $wp_customize->add_setting('cta_button_text', [
        'default' => 'Hubungi Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_button_text', [
        'label'   => __('Teks Tombol CTA', 'gereja-tema'),
        'section' => 'cta_section',
        'type'    => 'text',
    ]);

    // Link Tombol (dropdown halaman)
    $wp_customize->add_setting('cta_button_link', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('cta_button_link', [
        'label'   => __('Pilih Halaman untuk Tombol CTA', 'gereja-tema'),
        'section' => 'cta_section',
        'type'    => 'dropdown-pages',
    ]);
}
add_action('customize_register', 'gereja_customize_cta');

// fungsi untuk modifikasi tampilan jadwal
function gereja_customizer_jadwal($wp_customize)
{
    $wp_customize->add_section('jadwal_section', [
        'title' => __('Halaman Jadwal Ibadah', 'gereja-tema'),
        'priority' => 60,
    ]);

    // Gambar Hero
    $wp_customize->add_setting('jadwal_hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'jadwal_hero_image', [
        'label' => __('Gambar Hero (Gereja)', 'gereja-tema'),
        'section' => 'jadwal_section',
        'settings' => 'jadwal_hero_image',
    ]));

    // Alamat Gereja
    $wp_customize->add_setting('jadwal_alamat', ['default' => 'Jl. Damai No. 1, Kota Bahagia']);
    $wp_customize->add_control('jadwal_alamat', [
        'label' => __('Alamat Gereja', 'gereja-tema'),
        'section' => 'jadwal_section',
        'type' => 'text',
    ]);

    // Jadwal Ibadah (format JSON manual)
    $wp_customize->add_setting('jadwal_ibadah');
    $wp_customize->add_control('jadwal_ibadah', [
        'label'       => __('Jadwal Ibadah (format JSON)', 'gereja-tema'),
        'section'     => 'jadwal_section',
        'type'        => 'textarea',
        'description' => 'Contoh: [{"hari":"Minggu","waktu":"07.00","tempat":"Gereja Induk","keterangan":"Ibadah Umum"}]',
    ]);
}
add_action('customize_register', 'gereja_customizer_jadwal');
