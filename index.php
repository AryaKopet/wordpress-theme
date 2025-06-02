<?php get_header(); ?>
<div class="container py-5">
    <h1 class="mb-4">Berita Gereja</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title"><?php the_title(); ?></h2>
                    <p class="card-text"><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endwhile;
    else: ?>
        <p>Belum ada berita.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>