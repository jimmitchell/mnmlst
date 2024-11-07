<?php get_header(); ?>

<main>
    <div class="wrap">
        <article style="margin-bottom: 0;">

            <?php if (have_posts()) : ?>

                <h1 class="page-title">Search Results</h1>

                <div class="article-content">
                    <?php get_search_form(); ?>
                </div>

                <div class="article-content">
                    <p style="margin-bottom:30px;">Your search for &ldquo;<strong><em><?php echo esc_html(get_search_query(false)); ?></em></strong>&rdquo; found this&hellip;</p>
                    <ul class="styled-list">
                        <?php while (have_posts()) : the_post();
                            $title = get_the_title();
                            if ($title == NULL || $title == '') {
                                $title = '<b>Musing:</b> ' . get_the_date('l, F jS, Y g:ia');
                            } else {
                                $title = get_the_title();
                            }
                            $categories = get_the_category(); ?>
                            <li><a href="<?php the_permalink() ?>" rel="bookmark" class="<?php echo esc_html($categories[0]->slug); ?>"><?php echo $title; ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>

            <?php else : ?>

                <h1 class="page-title">Well, that sucks&hellip;</h1>


                <div class="article-content">
                    <p>It looks like &ldquo;<strong><?php echo esc_html(get_search_query(false)); ?></strong>&rdquo; wasn't found in a post. Want to try that search again?</p>

                    <?php get_search_form(); ?>

                </div>

            <?php endif; ?>

        </article>

        <?php the_posts_pagination(array(
            'mid_size' => 1,
            'prev_text' => __('&larr;', 'mnmlst'),
            'next_text' => __('&rarr;', 'mnmlst'),
        )); ?>

    </div>
</main>

<?php get_footer(); ?>