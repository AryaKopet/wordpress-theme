<?php get_header(); ?>

<!-- Hero Section -->
<?php
$hero_bg = get_theme_mod('hero_bg_image');
$hero_title = get_theme_mod('hero_title', 'Selamat Datang di Gereja Kami');
$hero_sub = get_theme_mod('hero_subtitle', 'Menjadi Terang di Dunia, Menyebarkan Kasih');
$hero_button_text = get_theme_mod('hero_button_text', 'Lihat Jadwal Ibadah');

// Didefinisikan dulu SEBELUM dipakai
$hero_page_id = get_theme_mod('hero_button_link');
$hero_link = $hero_page_id ? get_permalink($hero_page_id) : '#';
?>


<section class="hero text-white text-center py-5"
    style="background: url('<?php echo esc_url($hero_bg); ?>') center/cover no-repeat; min-height: 400px;">
    <div class="container">
        <h1 class="display-4 fw-bold"><?php echo esc_html($hero_title); ?></h1>
        <p class="lead"><?php echo esc_html($hero_sub); ?></p>
        <a href="<?php echo esc_url($hero_link); ?>" class="btn btn-outline-light btn-lg mt-3">
            <?php echo esc_html($hero_button_text); ?>
        </a>
    </div>
</section>


<!-- Berita Terbaru -->
<section class="container py-5">
    <h2 class="text-center mb-4">Berita Gereja</h2>
    <div class="row">
        <?php
        $recent_posts = new WP_Query(['posts_per_page' => 3]);
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>

<!-- Info 3 Kolom -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="bi bi-calendar-check fs-1 text-primary mb-3"></i>
                <h5>Jadwal Ibadah</h5>
                <p>Lihat waktu ibadah mingguan dan acara gereja lainnya.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-book fs-1 text-success mb-3"></i>
                <h5>Renungan</h5>
                <p>Temukan inspirasi rohani melalui artikel dan renungan.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-chat-heart fs-1 text-danger mb-3"></i>
                <h5>Konseling</h5>
                <p>Dapatkan dukungan doa dan konseling dari tim gereja kami.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h2 class="mb-3">Mari Bergabung dalam Keluarga Gereja Kami</h2>
        <p>Kami membuka tangan untuk semua umat. Anda diterima di sini.</p>
        <a href="/hubungi-kami" class="btn btn-light btn-lg mt-2">Hubungi Kami</a>
    </div>
</section>

<?php get_footer(); ?>