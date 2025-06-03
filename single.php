<?php get_header(); ?>

<section class="container py-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="mb-3"><?php the_title(); ?></h1>
            <p class="text-muted"><?php echo get_the_date(); ?></p>
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid mb-4" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div class="content">
                <?php the_content(); ?>
            </div>
    <?php endwhile;
    endif; ?>
</section>

<?php get_footer(); ?>