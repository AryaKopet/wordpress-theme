<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- NAVBAR MODERN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <?php
            $navbar_type = get_theme_mod('navbar_brand_type', 'title');
            $navbar_logo = get_theme_mod('navbar_logo_image');
            ?>

            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="<?php echo home_url(); ?>">
                <?php if ($navbar_type === 'logo' && $navbar_logo) : ?>
                    <img src="<?php echo esc_url($navbar_logo); ?>" alt="Logo" style="height: 60px; max-height: 60px;">
                <?php else : ?>
                    <?php bloginfo('name'); ?>
                <?php endif; ?>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                <ul class="navbar-nav d-flex align-items-center gap-2">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        'container'      => false,
                        'depth'          => 2,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </ul>
            </div>
        </div>
    </nav>