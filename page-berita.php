<?php /* Template Name: Daftar Berita */ ?>
<?php get_header(); ?>

<section class="container py-5">
    <h1 class="mb-4 text-center">Berita Gereja Terkini</h1>
    <div class="row">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => $paged
        ];
        $news_query = new WP_Query($args);

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm post-card transition">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div class="mt-auto">
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        else : ?>
            <p>Tidak ada berita ditemukan.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="text-center">
        <?php
        echo paginate_links([
            'total' => $news_query->max_num_pages
        ]);
        ?>
    </div>
</section>

<?php get_footer(); ?>