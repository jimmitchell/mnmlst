<?php get_header(); ?>

<main>

    <div class="wrap">

        <?php if (have_posts()) : ?>
            <article <?php post_class(); ?>>

                <ul class="article-content photo-grid">
                    <?php while (have_posts()) : the_post(); ?>
                    <li class="thumbnail"><a href="<?php the_permalink() ?>"><img src="<?php echo mnmlst_image_display(); ?>" loading="lazy" /></a></li>
                    <?php endwhile; ?>
                    <li></li>
                </ul>

            </article>

            <?php the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('&larr;', 'mnmlst'),
                'next_text' => __('&rarr;', 'mnmlst'),
            )); ?>

        <?php else : ?>

            <article>
                <h2 class="page-title">Photos</h2>
                <p>If you're seeing this, I haven't posted any photos yet. Check back soon.</p>
            </article>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>