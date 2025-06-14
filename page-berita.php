<?php /* Template Name: Daftar Berita */ ?>
<?php get_header(); ?>

<section class="container py-5">
    <h1 class="mb-4 text-center">Berita Gereja Terkini</h1>
    <!-- Filter dan Pencarian -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-md-0">
            <form method="get" action="<?php echo home_url('/'); ?>">
                <!-- <div class="input-group">
                    <input type="text" name="s" class="form-control" placeholder="Cari berita..." value="<?php the_search_query(); ?>">
                    <input type="hidden" name="post_type" value="post">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div> -->
            </form>
        </div>

        <div class="col-md-6">
            <form method="get" action="<?php echo home_url('/'); ?>">
                <div class="input-group">
                    <select name="cat" class="form-select filter-kategori" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $cat) :
                        ?>
                            <option value="<?php echo $cat->term_id; ?>" <?php selected(get_query_var('cat'), $cat->term_id); ?>>
                                <?php echo $cat->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <br>
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
                            <p class="text-muted small mb-1"><?php echo get_the_date(); ?></p>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <p class="text-primary small mb-1">
                                    <?php foreach ($categories as $cat) :
                                        echo '<span class="badge-kategori me-1">' . esc_html($cat->name) . '</span>';
                                    endforeach; ?>
                                </p>
                            <?php endif; ?>
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
    <div class="text-center mt-4">
        <?php
        echo paginate_links([
            'total'   => $news_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'type'    => 'list',
        ]);
        ?>
    </div>
</section>

<?php get_footer(); ?>