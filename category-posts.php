<?php get_header(); ?>

<main>
    <div class="wrap">
        <?php
        //if (is_home()) {

            $args = array(
                'post_type' => 'post',
                'post_status' => 'published',
                'category_name' => 'posts',
                'paged' => get_query_var('paged'),
            );

            $query = new WP_Query($args);
        //}

        if (have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <article class="home-article">
                    <?php if (has_category('posts')) {
                        get_template_part('partials/post', 'home');
                    } else if (has_category('musings')) {
                        get_template_part('partials/post', 'home-status');
                    } ?>
                </article>
                <hr class="post-separator" />

            <?php endwhile; ?>

            <?php the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('&larr;', 'mnmlst'),
                'next_text' => __('&rarr;', 'mnmlst'),
                'total' => $query->max_num_pages,
            )); ?>

        <?php else : ?>

            <article>
                <h2 class="page-title">Um, yeah&hellip;</h2>
                <p>That didn't quite work out the way I thought it would&hellip;</p>
                <?php get_search_form(); ?>
            </article>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</main>

<?php get_footer(); ?>