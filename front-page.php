<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero text-white text-center py-5" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero.jpg') center/cover no-repeat; min-height: 400px;">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di Gereja Kami</h1>
        <p class="lead">Menjadi Terang di Dunia, Menyebarkan Kasih</p>
        <a href="/jadwal-pelayanan" class="btn btn-outline-light btn-lg mt-3">Lihat Jadwal Ibadah</a>
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