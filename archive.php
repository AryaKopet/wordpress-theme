<?php get_header(); ?>

<div class="container py-5">
    <h1 class="mb-4">
        Arsip: <?php the_archive_title(); ?>
    </h1>

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