<?php get_header(); ?>

<main>

    <div class="wrap">
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post();
                $link = esc_url(get_post_meta(get_the_ID(), 'musings', true)); ?>

                <article <?php post_class(); ?>>

                    <div class="article-content">
						<p class="meta" style="margin-bottom:-5px;"><a href="<?php the_permalink() ?>"><?php echo get_the_date('l, F jS, Y'); ?> &rarr;</a>
                        <?php the_content(); ?>                        
                    </div>

                </article>

                <hr class="post-separator" />

            <?php endwhile; ?>

            <?php the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('&larr;', 'nominal'),
                'next_text' => __('&rarr;', 'nominal'),
            )); ?>

        <?php else : ?>

            <article>
                <div class="article-content">
                    <h1 class="page-title">Musings</h1>
                    <div class="article-content">
                        <p>If you're seeing this, then I haven't published any witty musings yet. Check back soon.</p>
                    </div>
                </div>
            </article>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>