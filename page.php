<?php get_header(); ?>
<div class="container py-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="mb-4"><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
    else: ?>
        <p>Maaf, halaman tidak ditemukan.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>