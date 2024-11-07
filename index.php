<?php get_header(); ?>

<main>
    <div class="wrap">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                    <div class="article-content">

                        <p class="meta byline">
                            <?php the_date('l, F jS, Y'); ?>
                        </p>

                        <?php if (has_post_thumbnail()) the_post_thumbnail('post-image'); ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages(array(
                            'before'      => '<p>' . __('Pages:', 'nominal'),
                            'after'       => '</p>',
                            'pagelink'    => '%',
                            'separator'   => ', ',
                        )); ?>
                    </div>
                </article>

            <?php endwhile; ?>

            <?php the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('&larr;', 'nominal'),
                'next_text' => __('&rarr;', 'nominal'),
            )); ?>

        <?php else : ?>

            <article>
                <h2 class="page-title">Um, Yeah&hellip;</h2>
                <p>That didn't quite work out the way I hoped it would. If you're looking for something special, try clicking the "Archives" link above.</p>
            </article>

        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>