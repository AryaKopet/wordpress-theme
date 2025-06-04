<?php get_header(); ?>

<div class="container py-5">
    <h1 class="mb-4">
        Arsip: <?php the_archive_title(); ?>
    </h1>
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
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="card mb-4 shadow-sm border-0">
                <!-- <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                <?php endif; ?> -->
                <div class="card-body">
                    <h2 class="card-title"><?php the_title(); ?></h2>
                    <p class="text-muted small mb-2"><?php echo get_the_date(); ?></p>
                    <p class="card-text"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endwhile;
    else : ?>
        <p>Tidak ada postingan untuk kategori ini.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>