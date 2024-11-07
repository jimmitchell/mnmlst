<?php get_header(); ?>

<main>

    <div class="wrap">
        <?php if (have_posts()) : ?>

            <article <?php post_class(); ?>>

                <div class="article-content">

                    <ul class="bookmark-list">

                        <?php
                        while (have_posts()) : the_post();
                            $link = esc_url(get_post_meta(get_the_ID(), 'bookmark_link', true));
                        ?>

                            <li>

                                <h2 class="linked-post"><a href="<?php echo $link; ?>" title="Link to remote site."><?php the_title(); ?></a>&nbsp;<a href="<?php the_permalink() ?>" class="linked-list" title="Local permalink."><i class="fa-solid fa-star"></i></a></h2>

                                <?php
                                if ($post->post_excerpt != '') {
                                    echo '<blockquote>';
                                    the_excerpt();
                                    echo '</blockquote>';
                                }
                                ?>

                                <?php the_content(); ?>

                            </li>

                            <hr class="post-separator" />

                        <?php endwhile; ?>

                    </ul>
                </div>

            </article>

            <?php the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('&larr;', 'mnmlst'),
                'next_text' => __('&rarr;', 'mnmlst'),
            )); ?>

        <?php else : ?>

            <article>
                <h1 class="page-title">Links</h1>
                <div class="article-content">
                    <p>If you're seeing this, then I haven't published any link posts yet.</p>
                    <p>Check back soon.</p>
                </div>
            </article>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>